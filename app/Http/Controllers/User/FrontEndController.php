<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * shop
     *
     * @param  mixed $request
     * @return shop view
     */
    public function shop(Request $request)
    {
        return view('user.shop');
    }

    /**
     * blog
     *
     * @param  mixed $request
     * @return void
     */
    public function blog(Request $request)
    {
        return view('user.blog');
    }

    /**
     * about
     *
     * @param  mixed $request
     * @return void
     */
    public function about(Request $request)
    {
        return view('user.about');
    }

    public function contact(Request $request)
    {
        
        return view('user.contact');
    }
}
