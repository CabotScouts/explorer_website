<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model
{
  public function getFormattedSidebarAttribute() {
		return preg_replace_callback('/(?<!@)@([a-zA-Z]*)(\(([^\n,.]*)\))?(.*?)@end(\1)/s', function ($matches) {
			$view = 'component.sidebar.' . $matches[1];
			return View::exists($view) ? view($view, ['title' => $matches[3], 'content' => $matches[4]]) : '';
		}, $this->sidebar);
	}
}
