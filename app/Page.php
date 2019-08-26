<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model
{

	// Caching of deeper page attributes to reduce queries
	public $cached_segments = false;
	public $cached_sidebar = false;

	public $segments = [];
	public $crumbs = [];
	public $isroot = false;
	public $depth = 0;

	public $valid_sidebar = false;

	public function header() {
		return $this->belongsTo('App\Header');
	}

	private function parseURLSegments() {
		if($this->cached_segments) return;

		$segments = explode("/", $this->slug);
		$num = count($segments);

		$partial = "";

		if($num > 0) {
			$this->depth = $num;
			for($i = 0; $i < $num; $i++) {
				$partial .= $segments[$i];
				$this->segments[$i] = $partial;
				$partial .= "/";
			}

			$this->crumbs = Page::whereIn('slug', $this->segments)->where('status', 1)->get();
		}

		if($num == 1) $this->isroot = true;
		$this->cached_segments = true;
	}

	public function parseSidebar() {
		if($this->cached_sidebar) return;
		if(!$this->show_sidebar) return; // No point parsing if it won't get shown!

		$sidebar = "";
		for($i = ($this->depth - 1); $i > -1; $i--) {
			$sidebar .= $this->formatSidebar($this->crumbs[$i]);
		}

		$this->sidebar_output = $sidebar;
		$this->valid_sidebar = true;

		$this->cached_sidebar = true;
	}

	public function getRootAttribute() {
		$this->parseURLSegments();
		return ($this->isroot) ? false : $this->crumbs[0];
	}

	public function getBreadcrumbAttribute() {
		$this->parseURLSegments();

		if($this->depth > 1) {
			$breadcrumb = "";

			foreach($this->crumbs as $page) {
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
			}

			return $breadcrumb;
		}

		return false;
	}

	public function getHasSidebarAttribute() {
		$this->parseSidebar();
		return $this->valid_sidebar;
	}

	public function formatSidebar($page) {
		$formatted = preg_replace_callback('/(?<!@)@([a-zA-Z]*)(\(([^\n,.]*)\))?((.*?)(@end(\1))+)?/s', function ($matches) use ($page) {
			$view = 'component.sidebar.' . $matches[1];
			return View::exists($view) ? view($view, [
				'title' => isset($matches[3]) ? $matches[3] : false,
				'content' => isset($matches[5]) ? $matches[5] : false,
				'page' => $page
				]) : "";
		}, $page->sidebar);

		return $formatted;
	}

  public function getFormattedSidebarAttribute() {
		$this->parseSidebar();
		return $this->sidebar_output;
	}
}
