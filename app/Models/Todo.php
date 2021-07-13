<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;


    /**
     * Define attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'due_date',
        'reminder',
        'is_done',
        'completed_at'
    ];


    /**
     * Define attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'reminder'=> 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Assign relationship between todos and users
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Mutator converts due_date value from user's timezone to MySQL's timezone before storing it
     *
     * @param $value
     */
    public function setDueDateAttribute($value){
        if(!$value)
            $this->attributes['due_date'] = null;
        else{
            $date = Carbon::parse($value , auth()->user()->timezone);
            $this->attributes['due_date'] = $date->setTimezone('UTC')->format('Y-m-d H:i:s');
        }
    }


    /**
     * Accessor converts due_date value from DB's timezone to user's timezone before showing it
     *
     * @param $value
     * @return ?Carbon
     */
    public function getDueDateAttribute($value): ?Carbon
    {
        if(!$value)
            return null;
        return Carbon::parse($value)->setTimezone(auth()->user()->timezone);
    }


    /**
     * Mutator converts reminder value from user's timezone to DB's timezone before storing it
     *
     * @param $value
     */
    public function setReminderAttribute($value){
        if(!$value)
            $this->attributes['reminder'] = null;
        else{
            $date = Carbon::parse($value , auth()->user()->timezone);
            $this->attributes['reminder'] = $date->setTimezone('UTC')->format('Y-m-d H:i:s');
        }
    }

    /**
     * Accessor converts reminder value from DB's timezone to user's timezone before showing it
     *
     * @param $value
     * @return ?Carbon
     */
    public function getReminderAttribute($value): ?Carbon
    {
        if(!$value)
            return null;
        return Carbon::parse($value)->setTimezone(auth()->user()->timezone);
    }

    /**
     * Accessor converts completed_at value from DB's timezone to user's timezone before showing it
     *
     * @param $value
     * @return ?Carbon
     */
    public function getCompletedAtAttribute($value): ?Carbon
    {
        if(!$value)
            return null;
        return Carbon::parse($value)->setTimezone(auth()->user()->timezone);
    }

}

