<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model
{
	public function header() {
		return $this->belongsTo('App\Header');
	}

	public function getRootAttribute() {
		$rootslug = explode("/", $this->slug);
		if(count($rootslug) > 1) {
			$root = Page::where('slug', $rootslug[0])->where('status', 1)->first();
			return $root;
		}
		return false;
	}

	public function getBreadcrumbAttribute() {
		$parts = explode("/", $this->slug);
		$num = count($parts);

		if($num > 1) {
			$breadcrumb = "";
			$slug = "";

			for($i = 0; $i < count($parts); $i++) {
				$slug = $slug . $parts[$i];
				$page = Page::where('slug', $slug)->where('status', 1)->first();

				if($page) {
					if($page->id == $this->id) {
						$breadcrumb = $breadcrumb . $page->title;
					}
					else {
						$breadcrumb = $breadcrumb . sprintf(
							"<a href=%s>%s</a> <span class=\"separator\">/</span> ",
							route('page', ['page' => $page->slug]),
							$page->title
						);
					}
				}
				$slug = $slug . "/";
			}

			return $breadcrumb;
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
