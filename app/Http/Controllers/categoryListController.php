<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;

class categoryListController extends Controller
{
    public function index()
    {
        $urlpath = $_SERVER['PATH_INFO'];
        $category = substr($urlpath, 10);

        $titles = Resources::select('title','image','author','resource_type')
                 ->where('category_name','=',$category)
                 ->get();

        return view('categoryList',
        [
            'titles' => $titles,
            'category' => $category
        ]);
    }
}
