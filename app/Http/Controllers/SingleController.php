<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index() {
        return view('single'); // Trỏ tới resources/views/single.blade.php
    }
}
