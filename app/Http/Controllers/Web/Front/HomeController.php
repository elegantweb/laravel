<?php

namespace App\Http\Controllers\Web\Front;

class HomeController extends Controller
{
    public function show()
    {
        return view('front.home.show');
    }
}
