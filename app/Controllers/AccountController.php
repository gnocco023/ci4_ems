<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AccountController extends BaseController
{
    public function login()
    {
        return view('account/login');
    }

    public function register()
    {
        return view('account/register');
    }
}