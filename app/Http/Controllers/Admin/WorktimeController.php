<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Morilog\Jalali\Jalalian;

class WorktimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }


    public function index(User $user_id)
    {
        $worktimes=$user_id->worktimes()->get();
        $user=$user_id;
        return view('admin.worktimes.index',compact('worktimes','user'));
    }

    public function search(User $user_id){
        //convert Jalaly date to milady date
        $date1 = Jalalian::fromFormat('Y/m/d', request('tarikh1'))->toCarbon()->toDateTimeString();
        $date2 = Jalalian::fromFormat('Y/m/d', request('tarikh2'))->toCarbon()->toDateTimeString();

        $worktimes = $user_id->worktimes()->wheredate('created_at', '>=', $date1)->wheredate('created_at', '<=', $date2)->get();

        //get total time work in this date
        $total=$user_id->totaltime($worktimes);
        return view('admin.worktimes.search', compact('worktimes','total'));
    }
}
