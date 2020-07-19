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
        'day_id',
        'name',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'items'
    ];

    /**
     * Get the day that the group belongs to.
     */
    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    /**
     * Get the items that belong to the group.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
