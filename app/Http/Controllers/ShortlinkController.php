<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Shortlink;

class ShortlinkController extends Controller {
    public function index() {
      $links = Shortlink::orderBy('created_at', 'desc')->get();
      return view('shortlink.index', ["links" => $link]);
    }

    public function view($code) {
      $link = Shortlink::where('code', $code)->firstOrFail();
      return view('shortlink.view', ["link" => $link]);
    }

    public function redirect($code) {
      $link = Shortlink::where('code', $code)->firstOrFail();
      return redirect()->away($to = $link->code, $status = 302);
    }

    public function add(Request $request) {
      $validator = Validator::make($request->all(),
      [
        'url' => 'required'
      ]);

      $link = new Shortlink;
      return redirect()->action('ShortlinkController@view', ["code" => $code]);
    }

    public function update(Request $request) {
      return redirect()->action('ShortlinkController@view', ["code" => $code]);
    }

    public function delete(Request $request) {
      return redirect()->action('ShortlinkController@index');
    }
}
