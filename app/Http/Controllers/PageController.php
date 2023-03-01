<?php

namespace App\Http\Controllers;

use SebastianBergmann\Type\VoidType;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function news($news = '')
    {
        return view('news', ['news' => $news]);
    }

    public function program()
    {
        return view('program');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function contactUs()
    {
        return view('contact-us');
    }
}
