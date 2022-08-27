<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\InstagramController as IG;
use GuzzleHttp\Client;

use App\Models\IGTag;

class IGMedia extends Model {

  protected $table = "IGMedia";
  protected $fillable = ['media_id', 'parent_id', 'ig_id'];

  public function user() {
    return $this->hasOne('App\Models\IGUser', 'ig_id', 'ig_id')->first();
  }

  public function children() {
    return $this->hasMany('App\Models\IGMedia', 'parent_id');
  }

  public function tags() {
    return $this->belongsToMany('App\Models\IGTag', 'IGMedia_IGTags', 'media_id', 'tag_id');
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
      $timestamp = null;

      foreach($children as $media) {
        $request = $client->request('GET', IG::getInstagramURI("$media->id"), [
          'query' => [
            'access_token' => $token,
            'fields' => 'id,media_type,media_url,thumbnail_url,timestamp'
          ]
        ]);

        $response = json_decode($request->getBody());

        $m = IGMedia::firstOrCreate(['media_id' => $media->id], ['parent_id' => $this->id, 'ig_id' => $this->ig_id]);
        $m->fromResponse($response, $token);

        $timestamp = $m->timestamp;
      }

      $this->timestamp = $timestamp;
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
      $this->parseTags();
    }

    $this->save();
  }

  public function parseTags() {
    if($this->caption) {
      preg_match_all("/#(\w*)[\s]?/", $this->caption, $tags);

      $sync = [];
      foreach($tags[1] as $tag) {
        $t = IGTag::firstOrCreate(['tag' => strtolower($tag)], ['formatted' => "#$tag"]);
        $sync[] = $t->id;
      }
      $this->tags()->sync($sync);
    }
  }

  public function getDisplayCaptionAttribute() {
    return preg_replace_callback("/#(\w*)[\s]?/", function($matches) {
      $tag = IGTag::where('tag', strtolower($matches[1]))->first();
      return $tag->link;
    }, $this->caption);
  }

  public function getPostedAttribute() {
    if($this->media_type == "CAROUSEL_ALBUM") {
      $time = $this->children()->first()->timestamp;
    }
    else {
      $time = $this->timestamp;
    }
    return (new DateTime($time))->format("jS F Y");
  }
}
