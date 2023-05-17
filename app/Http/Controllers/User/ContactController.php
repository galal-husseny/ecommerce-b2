<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * contact
     *
     * @return contact view
     */
    public function contact()
    {
        return view('user.contact');
    }
}
