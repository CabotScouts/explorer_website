<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Unit;

class PageController extends Controller
{
  public function showPage($name) {
    $page = Page::where('slug', $name)->where('status', 1)->firstOrFail();
		return view('page.generic', ['page' => $page]);
  }

	public function frontpage() {
		$masthead = Page::where('slug', '/')->where('status', 1)->firstOrFail();
    $page = Page::where('slug', '/front-page')->where('status', 1)->first();

		return view('page.root', ['masthead' => $masthead, 'page' => $page]);
	}

	public function searchPages(Request $request) {
		$search = $request->input('search');

		if(isset($search)) {
			// TODO: Make this return a list of matches rather than one
			$page = Page::where('title', 'like', "%".$search."%")->where('status', 1)->first();
			if($page) {
				return redirect($page->slug);
			} else {
				return view('errors.404');
			}
		} else {
			return view('errors.404');
		}
	}

  public function sitemap() {
    $pages = Page::where('status', 1)->orderBy('slug', 'asc')->get();
    $units = Unit::where('status', 1)->where('day', '>', '-1')->orderBy('shortname', 'asc')->get();
    return view('sitemap', ['pages' => $pages, 'units' => $units]);
  }
}
