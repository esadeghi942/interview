<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Morilog\Jalali\Jalalian;

class WorktimeController extends Controller
{
    public function index(User $user_id)
    {
        $worktimes=$user_id->worktimes()->get();
        $user=$user_id;
        return view('admin.worktimes.index',compact('worktimes','user'));
    }

    public function search($user_id){
        $date1 = Jalalian::fromFormat('Y/m/d', request('tarikh1'))->toCarbon()->toDateTimeString();
        $date2 = Jalalian::fromFormat('Y/m/d', request('tarikh2'))->toCarbon()->toDateTimeString();
        $user=User::find($user_id);
        $worktimes = $user->worktimes()->wheredate('created_at', '>=', $date1)->wheredate('created_at', '<=', $date2)->get();
       $total=$user->totaltime($worktimes);
        return view('admin.worktimes.search', compact('worktimes','total'));
    }
}
