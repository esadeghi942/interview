<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $users=User::users()->get();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'time_weekly_working' => $request->time_weekly_working,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.user.index')->with('success', 'کاربر جدید با موفقیت ثبت گردید.');
    }

    public function destroy($user_id)
    {
        if ($user_id && ctype_digit($user_id)) {
            $userItem = User::findOrFail($user_id);
            $userItem->delete();
            return response('success');
        }
    }
}
