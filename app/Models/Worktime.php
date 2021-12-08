<?php

namespace App\Models;

use App\Scope\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;

    protected $fillable = ['week_year', 'time_start', 'time_finish', 'project', 'total'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OrderScope('created_at'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeThisweek($query)
    {
        return $query->where('week_year', date('W-o'));
    }
}
