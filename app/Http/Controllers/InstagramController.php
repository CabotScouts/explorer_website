<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\IGUser;
use App\IGMedia;
use App\IGTag;

class InstagramController extends Controller {

  private static function getBaseURI($module) {
    return "https://api.instagram.com/oauth/" . $module;
  }

  public static function getInstagramURI($module) {
    return "https://graph.instagram.com/" . $module;
  }

  public function index() {
    $tags = IGTag::orderBy('tag', 'asc')->get();
    return view('instagram.index', [
      'tag' => false,
      'tags' => $tags,
      'media' => IGMedia::where('parent_id', null)->orderBy('timestamp', 'desc')->get()
    ]);
  }

  public function view($tag) {
    $tag = IGTag::where('tag', $tag)->firstOrFail();
    $tags = IGTag::orderBy('tag', 'asc')->get();
    return view('instagram.index', [
      'tag' => $tag,
      'tags' => $tags,
      'media' => $tag->media()->orderBy('timestamp', 'desc')->get()
    ]);
  }

  public function manage() {
    $users = IGUser::all();
    return view('instagram.manage', ['users' => $users]);
  }

  public function redirect() {
    $app_id = config('services.instagram.client_id');
    $redirect = url(config('services.instagram.redirect'));

    return redirect($this->getBaseURI('authorize') . "?app_id=$app_id&redirect_uri=$redirect&scope=user_profile,user_media&response_type=code");
  }

  public function callback(Request $request) {
    // ideally all the token-fetching would be within IGToken, but we can't get the account ID until we obtain
    // a short-term token using the authorisation code, and we can't find/create an IGToken without the ID,
    // so we have to get the short-term token here

    $code = $request->query('code');
    if(!$code) {
      session()->flash('alert', ['danger' => "Instagram OAuth Code is missing"]);
      return redirect()->route('instagram.manage');
    }

    try {
      // Short-term token - lasts 1 hour
      $client = new Client;
      $request = $client->request("POST", $this->getBaseURI('access_token'), [
        'form_params' => [
          'app_id' => config('services.instagram.client_id'),
          'app_secret' => config('services.instagram.client_secret'),
          'code' => $code,
          'grant_type' => 'authorization_code',
          'redirect_uri' => url(config('services.instagram.redirect')),
        ]
      ]);

      $response = json_decode($request->getBody());
      $id = $response->user_id;
    }
    catch(BadResponseException $e) {
      session()->flash('alert', ['danger' => "Failed to retrieve the short-term token - $e->getMessage()"]);
      return redirect()->route('instagram.manage');
    }

    $user = IGUser::firstOrCreate(['ig_id' => $id]);
    $user->token = $response->access_token;
    $user->exchangeToken();
    $user->fetchUserProfile();

    session()->flash('alert', ['success' => 'Instagram token successfully retrieved']);
    return redirect()->route('instagram.manage');
  }

  public function deauthorise() {
    // TODO - callback for instagram app compliance
  }

  public function deleteData() {
    // TODO - callback for instagram app compliance
  }

  public function forceUpdate() {
    $status = array_map(function (IGUser $user) {
      return $user->fetchMedia();
    }, IGUser::get()->all());

    if(!in_array(false, $status)) {
      session()->flash('alert', ['success' => 'Media updated']);
    }
    return redirect()->route('instagram.manage');
  }

  public function removeMedia() {
    foreach(IGTag::all() as $tag) {
      $tag->media()->sync([]);
    }

    IGTag::truncate();
    IGMedia::truncate();

    session()->flash('alert', ['warning' => 'All media removed']);
    return redirect()->route('instagram.manage');
  }

  public function refreshToken($id) {
    $user = IGUser::where('id', $id)->first();

    if(isset($user)) {
      $refresh = $user->refreshToken(true);
      if($refresh) {
        session()->flash('alert', ['success' => 'Token appears to have refreshed']);
        return redirect()->route('instagram.manage');
      }
      else {
        session()->flash('alert', ['warning' => 'Token failed to refresh?']);
        return redirect()->route('instagram.manage');
      }
    }
    else {
      session()->flash('alert', ['warning' => 'Invalid User ID']);
      return redirect()->route('instagram.manage');
    }
  }
}
?>
