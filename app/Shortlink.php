<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;

class Shortlink extends Model {
    // Shortlink - a short 'code' which redirects to a saved link
    // Codes can either be specified, or randomly generated

    use Sortable;
    public $sortable = [ 'id', 'code', 'url', 'clicks', 'created_at', 'updated_at' ];

    public function generateCode() {
      $len = config('shortlinks.length');
      $generated = Str::random($len);
      $check = Shortlink::where('code', $generated)->count();
      return ($check === 0) ? $generated : $this->generateCode(); // risky...
    }

    public function registerClick() {
      $this->clicks += 1;
      $this->save();
    }

    public function getRedirectURLAttribute() {
      return route('shortlink.redirect', ['code' => $this->code ]);
    }
}
