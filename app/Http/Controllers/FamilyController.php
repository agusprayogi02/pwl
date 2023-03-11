<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Family',
            'families' => \App\Models\Family::all()
        ];
        return view('family.index', $data);
    }
}
