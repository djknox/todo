<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Group;

class Day extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'groups'
    ];

    /**
     * Get the current day.
     */
    public static function today()
    {
        return Day::firstWhere('date', today());
    }

    /**
     * Get the current day or start a new day with fresh groups.
     */
    public static function todayOrNew()
    {
        $today = Day::today();

        if ($today) {
            return $today;
        }
        else {
            $today = Day::create([
                'date' => today(),
            ]);

            $todoList = Group::create([
                'day_id' => $today->id,
                'name'   => 'todo items',
            ]);
            $foodList = Group::create([
                'day_id' => $today->id,
                'name'   => 'food',
            ]);
            $smokeList = Group::create([
                'day_id' => $today->id,
                'name'   => 'rx',
            ]);

            return $today;
        }
    }

    /**
     * Get the groups for the day.
     */
    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
