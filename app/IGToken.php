<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\InstagramController as IG;
use App\IGMedia;
use GuzzleHttp\Client;

class IGToken extends Model {

  protected $table = "IGTokens";
  protected $fillable = ['ig_id'];
  protected $hidden = ['token'];

  public function fetchUserProfile() {
    try {
      $client = new Client;
      $request = $client->request('GET', IG::getInstagramURI('me'), [
        'query' => [
          'access_token' => $this->token,
          'fields' => 'username'
        ]
      ]);

      $response = json_decode($request->getBody());
    }
    catch(Exception $e) {
      exit("Error - $e");
    }

    $this->ig_username = $response->username;
    $this->save();
  }

  public function fetchMedia() {
    try {
      $client = new Client;
      $request = $client->request('GET', IG::getInstagramURI('me/media'), [
        'query' => [
          'access_token' => $this->token,
          'fields' => 'id,caption,media_type,media_url,thumbnail_url,timestamp'
        ]
      ]);

      $response = json_decode($request->getBody());
    }
    catch(Exception $e) {
      exit("Error - $e");
    }

    foreach($response->data as $media) {
      print("$media->id\n");
      $m = IGMedia::firstOrCreate(['media_id', $media->id]);
      $m->fromResponse($media, $this->token);
    }

  }

  public function refreshToken() {

  }
}
