<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the day that the group belongs to.
     */
    public function day()
    {
        return $this->belongsTo('App\Day');
    }
}
