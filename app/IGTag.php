<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IGTag extends Model {

  public $table = "IGTags";
  public $timestamps = false;
  protected $fillable = ['tag', 'formatted'];

  public function media() {
    return $this->belongsToMany('App\IGMedia', 'IGMedia_IGTags', 'tag_id', 'media_id');
  }

  public function getLinkAttribute() {
    $link = route('instagram.view', ['tag' => $this->tag]);
    return "<a href=\"$link\">$this->formatted</a> ";
  }

}
