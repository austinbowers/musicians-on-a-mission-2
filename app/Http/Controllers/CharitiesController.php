<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharitiesController extends Controller
{
     public function index()
    {
        return view('pages.charities.index');
    }
}