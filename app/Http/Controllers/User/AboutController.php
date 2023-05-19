<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * about
     *
     * @return about view
     */
    public function about()
    {
        return view('user.about');
    }
}
