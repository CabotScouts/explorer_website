<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
		// getLinkAttribute -> formats the link data as an html link
		// $wrap   -> boolean -> whether to wrap the link in list tags
		// $active -> boolean -> whether to add an active class if the url matches the current request
		// @return -> string  -> the link in html form
    public function getLinkAttribute($wrap = false, $active = false) {
			$open  = ($wrap) ? "<li>" : "";
			$close = ($wrap) ? "</li>" : "";
			$url = ($this->local) ? $_ENV['APP_URL'] + $this->url : $this->url;
			$active = ($url == url()->current()) ? " class=\"active\"" : "";

			$new = ($this->external) ? " target=\"_blank\" rel=\"nofollow noopener noreferrer\"" : "";

			return $open + "<a href=\"" + $url + "\"" + $new + $active + ">{$this->name}</a>" + $close;
		}
}
