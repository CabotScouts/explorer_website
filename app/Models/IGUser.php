<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\InstagramController as IG;
use App\IGMedia;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class IGUser extends Model {

  protected $table = "IGUsers";
  protected $fillable = ['ig_id', 'token'];
  protected $hidden = ['token'];

  public function media() {
    return $this->hasMany('App\Models\IGMedia', 'ig_id', 'ig_id');
  }

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

      $this->ig_username = $response->username;
      $this->save();
      return $this;
    }
    catch(BadResponseException $e) {
      $r = Psr7\str($e->getResponse());
      session()->flash('alert', ['danger' => "Failed to retrieve user profile - $r"]);
      return redirect()->route('instagram.manage');
    }
  }

  public function fetchMedia($after = false) {
    $query = [
      'access_token' => $this->token,
      'fields' => 'id,caption,media_type,media_url,thumbnail_url,timestamp'
    ];
    if($after) $query['after'] = $after;

    try {
      $client = new Client;
      $request = $client->request('GET', IG::getInstagramURI('me/media'), [
        'query' => $query
      ]);

      $response = json_decode($request->getBody());

      foreach($response->data as $media) {
        $m = IGMedia::firstOrCreate(['media_id' => $media->id], ['ig_id' => $this->ig_id]);
        $m->fromResponse($media, $this->token);
      }

      if(count($response->data) > 0) {
        $this->fetchMedia($response->paging->cursors->after);
      }

      return true;
    }
    catch(BadResponseException $e) {
      $r = Psr7\str($e->getResponse());
      session()->flash('alert', ['danger' => "Failed to fetch user media - $r"]);
      return false;
    }
  }

  public function exchangeToken() {
    // Exchange a short-term token for a long-term token
    // Long-term tokens last 60 days before needing to be refreshed
    try {
      $client = new Client();
      $request = $client->request("GET", IG::getInstagramURI('access_token'), [
        'query' => [
          'grant_type' => 'ig_exchange_token',
          'client_secret' => config('services.instagram.client_secret'),
          'access_token' => $this->token
        ]
      ]);

      $response = json_decode($request->getBody());
      $this->token = $response->access_token;
      $this->expires = (new DateTime)->getTimestamp() + $response->expires_in;
      $this->save();

      return $this;
    }
    catch(BadResponseException $e) {
      $r = Psr7\str($e->getResponse());
      session()->flash('alert', ['danger' => "Failed to exchange for a long-term token - $r"]);
      return redirect()->route('instagram.manage');
    }
  }

  public function refreshToken($force = false) {
    if($this->tokenNeedsRefresh() || $force) {
      try {
        $client = new Client();
        $request = $client->request("GET", IG::getInstagramURI('refresh_access_token'), [
          'query' => [
            'grant_type' => 'ig_refresh_token',
            'client_secret' => config('services.instagram.client_secret'),
            'access_token' => $this->token
          ]
        ]);

        $response = json_decode($request->getBody());
        $this->token = $response->access_token;
        $this->expires = (new DateTime)->getTimestamp() + $response->expires_in;
        $this->save();
        return true;
      }
      catch(Exception $e) {
        exit("Error - $e");
      }
    }
    return false;
  }

  public function tokenIsExpired() {
    return ((new DateTime)->getTimestamp() > $this->expires);
  }

  public function tokenNeedsRefresh() {
    // token will expire in the next 24hrs
    return ((new DateTime)->getTimestamp() + 86400) > $this->expires;
  }

  public function getTokenExpiresAttribute() {
    return (new Datetime("@" . $this->expires))->format("d-m-Y (H:i)");
  }
}
