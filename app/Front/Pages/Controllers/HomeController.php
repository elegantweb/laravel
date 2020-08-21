<?php

namespace App\Front\Pages\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show()
    {
        return view('front.pages.home');
    }
}
