<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  public function getFormattedSidebarAttribute() {
		return preg_replace_callback('/(?<!@)@block(\(([^\n,.]*)\))?(.*?)@endblock/s', function ($matches) {
			return view('component.sidebar.block', ['title' => $matches[2], 'block' => $matches[3]]);
		}, $this->sidebar);
	}
}
