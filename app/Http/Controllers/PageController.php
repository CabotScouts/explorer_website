<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
  public function showPage($name) {
    $page = Page::where('slug', $name)->where('status', 1)->firstOrFail();
		return view('page', ['page' => $page]);
  }

	public function searchPages(Request $request) {
		$search = $request->input('search');

		if(isset($search)) {
			// TODO: Make this return a list of matches rather than one
			$page = Page::where('title', 'like', $search)->where('status', 1)->first();
			if($page) {
				return redirect($page->slug);
			} else {
				return view('errors.404');
			}
		} else {
			return view('errors.404');
		}
	}
}
