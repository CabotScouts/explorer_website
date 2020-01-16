<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\InstagramController as IG;
use GuzzleHttp\Client;

class IGMedia extends Model {

  protected $table = "IGMedia";
  protected $fillable = ['media_id', 'parent_id'];

  public function children() {
    return $this->hasMany('App\IGMedia', 'parent_id');
  }

  public function fromResponse($data, $token) {
    // parse response and save data
    // if IMAGE/VIDEO - extract media data
    // if CAROUSEL_ALBUM - extract album data, fetch children

    $this->media_type = $data->media_type;

    if($data->media_type == "CAROUSEL_ALBUM") {
      $client = new Client;
      $request = $client->request('GET', IG::getInstagramURI("$data->id/children"), [
        'query' => [
          'access_token' => $token
        ]
      ]);

      $response = json_decode($request->getBody());
      $children = $response->data;

      foreach($children as $media) {
        $request = $client->request('GET', IG::getInstagramURI("$media->id"), [
          'query' => [
            'access_token' => $token,
            'fields' => 'id,media_type,media_url,timestamp'
          ]
        ]);

        $response = json_decode($request->getBody());

        $m = IGMedia::firstOrCreate(['media_id' => $media->id], ['parent_id' => $this->id]);
        $m->fromResponse($response, $token);
      }
    }
    else { // IMAGE/VIDEO media types
      if($data->media_type == "VIDEO") {
        $this->media_thumbnail = $data->thumbnail_url;
      }

      $this->media_url = $data->media_url;
      $this->timestamp = $data->timestamp;
    }

    if(isset($data->caption)) {
      $this->caption = $data->caption;
    }

    $this->save();
  }
}
