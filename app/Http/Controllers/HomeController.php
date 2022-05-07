<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\PacksDetail;

class HomeController extends BaseController
{
    public function index()
    {
        $data1 = PacksDetail::where('price', '>', '0')->paginate(4);
        $data2 = PacksDetail::where('price', '=', '0')->paginate(4);
        return view('homepage', compact('data1', 'data2'));
    }

    public function showBlog() {
        return view('test1\blog');
    }

    public function showAbout() {
        return view('test1\about');
    }

    public function showContact() {
        return view('test1\contact');
    }

    public function showProduct() {
        return view('test1\product');
    }

    public function showSinglePost() {
        return view('test1\singlepost');
    }
}
