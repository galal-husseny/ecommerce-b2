<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BlogPageController extends Controller
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
