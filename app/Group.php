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

    /**
     * Create a 'daily items' group with default items. 
     * 
     * @param  \App\Day  $today
     * @return \App\Group
     */
    public static function createDailyItems(Day $today)
    {
        $dailyItemsGroup = Group::create([
            'day_id' => $today->id,
            'name'   => 'daily items',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'wake up at 5am',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'brush teeth',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'wash face',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'run',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'stretch',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'meditate',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'read',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'skate',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'moisturize',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'make smoothies',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'make bed',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'floss',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'fill berkey',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'do dishes',
        ]);
        $dailyItemsGroup->items()->create([
            'description' => 'put out tomorrow\'s clothes',
        ]);

        return $dailyItemsGroup;
    }
}
