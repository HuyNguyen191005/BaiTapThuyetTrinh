<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BicyclesController extends Controller
{
    public function bicycles() {
        return view('bicycles'); // Trỏ tới resources/views/bicycles.blade.php
    }
}
