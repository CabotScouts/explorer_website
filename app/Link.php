<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function getLinkAttribute($wrap = false) {
			$open  = ($wrap) ? "<li>" : "";
			$close = ($wrap) ? "</li>" : "";
			$url = ($this->local) ? $_ENV['APP_URL'] + $this->url : $this->url;

			$new = ($this->external) ? " target=\"_blank\" rel=\"nofollow noopener noreferrer\"" : "";

			return $open + "<a href=\"" + $url + "\"" + $new + ">{$this->name}</a>" + $close;
		}
}
