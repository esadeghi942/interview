<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $count=User::users()->count();
        return view('admin.index',compact('count'));
    }


}
