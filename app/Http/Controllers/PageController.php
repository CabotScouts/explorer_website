<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
    public function showPage($name)
    {
        $page = Page::where('url', $name)->firstOrFail();
    }
}
