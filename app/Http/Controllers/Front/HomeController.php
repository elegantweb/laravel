<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show()
    {
        return view('front.home.show');
    }
}
