<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'description',
    ];

    /**
     * Get the group that the item belongs to.
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
