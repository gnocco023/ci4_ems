<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        return view('user/index');
    }


    public function enroll()
    {
        return view('user/enroll');
    }
}
