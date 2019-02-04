<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
  public function showPage($name) {
    $page = Page::where('slug', $name)->firstOrFail();
		return view('page', ['page' => $page]);
  }

	public function searchPages(Request $request) {
		$search = $request->input('search');

		if(isset($search)) {
			// TODO: Make this return a list of matches rather than one
			$page = Page::where('title', 'like', $search)->first();
			return redirect($page->slug);
		}
		else {
			return view('errors.404');
		}
	}
}
