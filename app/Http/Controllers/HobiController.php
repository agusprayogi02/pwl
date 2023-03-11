<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Hobi',
            'hobbies' => Hobi::all()
        ];
        return view('hobi.index', $data);
    }
}
