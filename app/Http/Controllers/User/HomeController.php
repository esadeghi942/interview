<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirectUser()
    {
        if (Auth::user()->is_admin)
            return redirect()->route('admin');
        else {
            $user = Auth::user();
            return view('user.index',compact('user'));
        }
    }
}
