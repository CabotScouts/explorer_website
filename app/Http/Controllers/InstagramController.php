<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InstagramController extends Controller {

  /*
    * redirect to Instagram OAuth endpoint
    * retrieve short-term access code
    * exchange code for token
    * convert short-term token into long-term - store this (we can't access this yet?)
    * use token to retrieve Instagram posts (hourly?)
  */

  private $baseapiuri = "https://api.instagram.com/oauth/";
  private $instagramapi = "https://graph.instagram.com/";

  private function getBaseURI($module) {
    return $this->baseapiuri . $module;
  }

  private function getInstagramURI($module) {
    return $this->instagramapi . $module;
  }

  public function instagramRedirect() {
    $id = config('services.instagram.client_id');
    // $redirect = url(config('services.instagram.redirect'));
    $redirect = "https://127.0.0.1:8000/instagram/login/redirect";

    return redirect($this->getBaseURI('authorize') . "?app_id=$id&redirect_uri=$redirect&scope=user_profile,user_media&response_type=code");
  }

  public function instagramCallback(Request $request) {
    $code = $request->query('code');

    $client = new Client();
    $response = $client->request("POST", $this->getBaseURI('access_token'), [
      'form_params' => [
        'app_id' => config('services.instagram.client_id'),
        'app_secret' => config('services.instagram.client_secret'),
        'code' => $code,
        'grant_type' => 'authorization_code',
        // 'redirect_uri' => url(config('services.instagram.redirect')),
        'redirect_uri' => 'https://127.0.0.1:8000/instagram/login/redirect'
      ]
    ]);

    $response = json_decode($response->getBody());

    

    // Long-term tokens are currently in a closed beta?
    // $id = $response->user_id;
    // $token = $response->access_token;
    //
    // $response = $client->request("GET", $this->getInstagramURI('access_token'), [
    //   'grant_type' => 'ig_exchange_token',
    //   'client_secret' => config('services.instagram.client_secret'),
    //   'access_token' => $token
    // ]);
    //
    // $response = json_decode($response->getBody());
  }

  public function instagramDeauthorise() {

  }

  public function instagramDeleteData() {

  }
}
?>
