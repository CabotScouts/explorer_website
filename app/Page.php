<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Page extends Model
{

	// Caching of deeper page attributes to reduce queries
	public $cached_segments = false;
	public $cached_crumbs   = false;
	public $cached_sidebar  = false;

	public $segments = false;
	public $crumbs   = false;
	public $isroot   = false;
	public $_depth   = 0;

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
			$this->_depth = $num;
			for($i = 0; $i < $num; $i++) {
				$partial .= $segments[$i];
				$this->segments[$i] = $partial;
				$partial .= "/";
			}
		}

		$this->isroot = ($num === 1);
		$this->cached_segments = true;
	}

	private function getCrumbs() {
		if($this->cached_crumbs) return;
		$this->crumbs = Page::whereIn('slug', $this->segments)->where('status', 1)->get();
		$this->cached_crumbs = true;
	}

	public function parseSidebar() {
		if($this->cached_sidebar) return;
		if(!$this->show_sidebar) return; // No point parsing if it won't get shown!

		$sidebar = "";
		for($i = ($this->_depth - 1); $i > -1; $i--) {
			$sidebar .= $this->formatSidebar($this->crumbs[$i]);
		}

		$this->sidebar_output = $sidebar;
		$this->valid_sidebar = (strlen($sidebar) > 0);
		$this->cached_sidebar = true;
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

	public function getRootAttribute() {
		$this->parseURLSegments();
		$this->getCrumbs();
		return ($this->isroot) ? false : $this->crumbs[0];
	}

	public function getBreadcrumbAttribute() {
		$this->parseURLSegments();
		$this->getCrumbs();

		$segments = [];

		if($this->_depth > 1) {
			foreach($this->crumbs as $page) {
				if($page) {
					$segments[] = [
						'name' => $page->title,
						'url'  => route('page', ['page' => $page->slug])
					];
				}
			}
			return $segments;
		}
		return false;
	}

	public function getDepthAttribute() {
		$this->parseURLSegments();
		return $this->_depth;
	}

	public function getSubclassAttribute() {
		$this->parseURLSegments();
		$rootdepth = (!$this->isroot) ? $this->root->getDepthAttribute() : 0;
		$subiness = ($this->_depth - $rootdepth - 1);
		return (str_repeat("sub", $subiness) . "page");
	}

	public function getHasSidebarAttribute() {
		$this->parseSidebar();
		return $this->valid_sidebar;
	}

  public function getFormattedSidebarAttribute() {
		$this->parseSidebar();
		return $this->sidebar_output;
	}
}
