<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * blog
     *
     * @return blog view
     */
    public function blog()
    {
        return view('user.blog');
    }

}
