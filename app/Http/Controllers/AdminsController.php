<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function adminDashboard()
    {
        return view('admins.index',[
            'users' => User::all(),
        ]);
    }

    public function index()
    {
      return $this->adminDashboard();
    }


    public function  allusers()
    {
        return view('admins.allusers',[
            'users' => User::all(),
        ]);
    }

}
