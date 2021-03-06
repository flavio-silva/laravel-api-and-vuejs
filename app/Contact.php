<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $dates = [
        'birthday'
    ];

    public function setBirthDayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeBirthdays(Builder $query)
    {
        $query->whereRaw("birthday like '%-" . now()->format('m') . "-%'");
    }

    public function path()
    {
        return '/contacts/' . $this->id;
    }
}
