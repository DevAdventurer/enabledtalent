<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $page = Page::where('slug', 'home')
            ->with(['pageItems' => function ($query) {
                $query->orderBy('ordering', 'asc');
            }])
            ->first();
        return view('web.home', compact('page'));
    }

    public function signin(){
        return view('web.signin');
    }

    public function page(Request $request, Page $page){
        return view('web.page.single', compact('page'));
    }
}
