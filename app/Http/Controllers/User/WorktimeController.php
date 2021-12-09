<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorktimeRequest;
use App\Models\Worktime;
use DateTime;
use Illuminate\Support\Facades\Auth;

class WorktimeController extends Controller
{
    public function index(){
        $user=Auth::user();
        $worktimes=$user->worktimes()->thisweek()->get();
        return view('user.worktimes.index',compact('worktimes'));
    }
    public function create(){
        return view('user.worktimes.create');
    }
    public function store(WorktimeRequest $request){

        $Start = new DateTime($request->time_start);
        $End   = new DateTime($request->time_finish);
        $total=$Start->diff($End)->format("%H:%I:%s");
        $worktime=new Worktime([
            'week_year' => date('W-o'),
            'time_start' => $request->time_start,
            'time_finish' => $request->time_finish,
            'total' => $total,
            'project'=>$request->project
        ]);
        $user=Auth::user();
        $user->worktimes()->save($worktime);
        return redirect()->route('user.worktimes.index')->with('success', 'ساعت کاری جدید با موفقیت ثبت گردید.');

    }

    public function destroy($worktime_id)
    {
        if ($worktime_id && ctype_digit($worktime_id)) {
            $worktimeItem = Auth::user()->worktimes()->findOrFail($worktime_id);
            $worktimeItem->delete();
            return response('success');
        }
    }
}
