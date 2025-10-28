<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('customer.landing_page.index');
    }
}