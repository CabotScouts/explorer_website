<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\IGToken;
use App\IGMedia;

class InstagramController extends Controller {

  /*
    * redirect to Instagram OAuth endpoint
    * retrieve short-term access code
    * exchange code for token
    * convert short-term token into long-term - store this (we can't access this yet?)
    * use token to retrieve Instagram posts (hourly?)
  */

  private static function getBaseURI($module) {
    return "https://api.instagram.com/oauth/" . $module;
  }

  public static function getInstagramURI($module) {
    return "https://graph.instagram.com/" . $module;
  }

  public function instagramRedirect() {
    $app_id = config('services.instagram.client_id');
    // $redirect = url(config('services.instagram.redirect'));
    $redirect = "https://127.0.0.1:8000/instagram/login/redirect";

    return redirect($this->getBaseURI('authorize') . "?app_id=$app_id&redirect_uri=$redirect&scope=user_profile,user_media&response_type=code");
  }

  public function instagramCallback(Request $request) {
    $code = $request->query('code');
    $app_secret = config('services.instagram.client_secret');

    $client = new Client;

    try {
      // Short-term token - lasts 1 hour
      $request = $client->request("POST", $this->getBaseURI('access_token'), [
        'form_params' => [
          'app_id' => config('services.instagram.client_id'),
          'app_secret' => $app_secret,
          'code' => $code,
          'grant_type' => 'authorization_code',
          // 'redirect_uri' => url(config('services.instagram.redirect')),
          'redirect_uri' => 'https://127.0.0.1:8000/instagram/login/redirect'
        ]
      ]);

      $response = json_decode($request->getBody());
      $id = $response->user_id;
    }
    catch(Exception $e) {
      exit("Error - $e");
    }

    try {
      // Long-term token - lasts 60 days
      $request = $client->request("GET", $this->getInstagramURI('access_token'), [
        'query' => [
          'grant_type' => 'ig_exchange_token',
          'client_secret' => $app_secret,
          'access_token' => $response->access_token
        ]
      ]);

      $response = json_decode($request->getBody());
    }
    catch(Exception $e) {
      exit("Error - $e");
    }

    $IGToken = IGToken::firstOrCreate(['ig_id' => $id]);
    $IGToken->token = $response->access_token;
    $IGToken->expires = $response->expires_in; // gives seconds until expiration - TODO: calculate expiry time - a few hours
    $IGToken->fetchUserProfile();
    // $IGToken->fetchMedia();

    return "success";

    // redirect();
  }

  public function instagramDeauthorise() {

  }

  public function instagramDeleteData() {

  }
}
?>
