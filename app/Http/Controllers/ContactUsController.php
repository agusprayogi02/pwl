<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        echo "https://www.educastudio.com/contact-us";
    }

    public function store(Request $request)
    {
        echo "Post https://www.educastudio.com/contact-us";
    }
}
