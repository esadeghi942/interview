<?php

namespace App\Models;

use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'time_weekly_working',
        'password',
    ];

    const admin=1;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeUsers($query)
    {
        return $query->where('is_admin', 0);
    }

    public function worktimes()
    {
        return $this->hasMany(Worktime::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function getTotalWeeklyTimeAttribute()
    {
        $worktimes=$this->worktimes()->thisweek()->get();
        $sumworktime = strtotime("00:00:00");
        foreach ($worktimes as $wt) {
            $time2 = strtotime($wt->total);
            $sumworktime += $time2;
        }
        return (new Carbon($sumworktime))->format('H:i');
    }

    public function getRestWeeklyTimeAttribute()
    {
        $execpted=$this->time_weekly_working;
        $sumworktime=self::getTotalWeeklyTimeAttribute();
        $rest=Helper::timeSubtaction($execpted,$sumworktime);
        return $rest;
    }

    public function totaltime($worktimes){
        $sumworktime = strtotime("00:00:00");
        foreach ($worktimes as $wt) {
            $time2 = strtotime($wt->total);
            $sumworktime += $time2;
        }
        return (new Carbon($sumworktime))->format('H:i');
    }
}
