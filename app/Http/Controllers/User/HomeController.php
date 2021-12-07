<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Worktime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    public function redirectUser()
    {
        if (Auth::user()->is_admin)
            return redirect()->route('admin');
        else {
            $user_id = Auth::id();
            $month = Jalalian::now()->getMonth();
            $year = Jalalian::now()->getYear();
            $worktimes = Worktime::all()->where('user_id', $user_id);
            $sumworktime = strtotime("00:00:00");
            foreach ($worktimes as $wt) {
                $date = explode(',', $wt->date)[1];
                $date = Jalalian::fromFormat('Y/n/j', $date);
                if ($date->getMonth() == $month && $date->getYear() == $year) {
                    $time2 = strtotime($wt->total);
                    $sumworktime += $time2;
                }
            }
            $sumworktime=new Carbon($sumworktime);
            $sumworktime=$sumworktime->format('H:i');
            $header='داشبورد کاربر';
            return view('user.index',compact('sumworktime','header'));
        }
    }
}
