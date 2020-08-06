<?php

namespace App\Http\Controllers\Front;

class HomeController extends Controller
{
    public function show()
    {
        return view('front.home.show');
    }
}
