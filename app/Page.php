<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model
{
	public function getRootAttribute() {
		$rootslug = explode("/", $this->slug);
		if(count($rootslug) > 1) {
			$root = Page::where('slug', $rootslug[0])->where('status', 1)->first();
			return $root;
		}
		return false;
	}

	public function formatSidebar($sidebar) {
		return preg_replace_callback('/(?<!@)@([a-zA-Z]*)(\(([^\n,.]*)\))?((.*?)(@end(\1))+)?/s', function ($matches) {
			$view = 'component.sidebar.' . $matches[1];
			return View::exists($view) ? view($view, [
				'title' => isset($matches[3]) ? $matches[3] : false,
				'content' => isset($matches[5]) ? $matches[5] : false,
				'page' => $this
				]) : '';
		}, $sidebar);
	}

  public function getFormattedSidebarAttribute() {
		$sidebar = $this->formatSidebar($this->sidebar);
		if($this->getRootAttribute()) {
			$sidebar = $sidebar . $this->getRootAttribute()->getFormattedSidebarAttribute();
		}
		return $sidebar;
	}
}
