<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Shortlink;

class ShortlinkController extends Controller {

  public function redirect($code) {
    $link = Shortlink::where('code', $code)->firstOrFail();
    $link->registerClick();
    return redirect()->away($to = $link->url, $status = 302);
  }

  public function index(Request $request) {
    $links = Shortlink::sortable()->paginate(50);
    return view('shortlink.index', ["links" => $links]);
  }

  public function view($id) {
    $link = Shortlink::where('id', $id)->firstOrFail();
    return view('shortlink.view', ["link" => $link]);
  }

  public function createForm() {
    return view('shortlink.create');
  }

  public function createStore(Request $request) {
    $validator = Validator::make($request->all(),
    [ 'url' => 'required' ], [ 'url.required'  => 'A URL is required' ])->validate();

    $link = Shortlink::where('url', $request->url)->first();
    if(isset($link)) {
      session()->flash('alert', ['warning' => "A shortlink to this URL already exists - <code>$link->redirectURL</code> <a href=\"javascript:toClipboard('$link->redirectURL');\"><i class=\"far fa-clipboard\"></i></a>"]);
    }
    else {
        $link = new Shortlink;
        $link->url = $request->url;
        $link->code = $request->code ?? $link->generateCode();
        $link->save();
        session()->flash('alert', ['success' => "New shortlink made - <code>$link->redirectURL</code> <a href=\"javascript:toClipboard('$link->redirectURL');\"><i class=\"far fa-clipboard\"></i> </a>"]);
    }

    return redirect()->action('ShortlinkController@index');
  }

  public function editForm($id) {
    $link = Shortlink::where('id', $id)->firstOrFail();
    return view('shortlink.edit', ['link' => $link]);
  }

  public function editStore(Request $request) {
    return redirect()->action('ShortlinkController@index');
  }

  public function delete($id) {
    $link = Shortlink::where('id', $id)->delete();
    if($link) {
      session()->flash('alert', ['success' => "Shortlink deleted"]);
    }
    else {
      session()->flash('alert', ['danger' => "Shortlink couldn't be deleted"]);
    }

    return redirect()->action('ShortlinkController@index');
  }

}
