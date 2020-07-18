<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Day;
use App\Group;

class DayTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A day has a date.
     *
     * @test
     * @return void
     */
    public function a_day_has_a_date()
    {
        $day = factory(Day::class)->create();

        $this->assertDatabaseHas('days', [
            'id'   => $day->id,
            'date' => $day->date,
        ]);
    }

    /**
     * A day can have many groups.
     *
     * @test
     * @return void
     */
    public function a_day_can_have_many_groups()
    {
        $day = factory(Day::class)->create();
        $groupOne = factory(Group::class)->create();
        $groupTwo = factory(Group::class)->create();

        $day->groups()->save($groupOne);
        $day->groups()->save($groupTwo);

        $this->assertDatabaseHas('groups', [
            'id'     => $groupOne->id,
            'day_id' => $day->id,
        ]);
        $this->assertDatabaseHas('groups', [
            'id'     => $groupTwo->id,
            'day_id' => $day->id,
        ]);
    }
}
