<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Group;
use App\Day;

class GroupTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A group has a name.
     *
     * @test
     * @return void
     */
    public function a_group_has_a_name()
    {
        $group = factory(Group::class)->create();

        $this->assertDatabaseHas('groups', [
            'id'   => $group->id,
            'name' => $group->name,
        ]);
    }

    /**
     * A group belongs to a single day.
     *
     * @test
     * @return void
     */
    public function a_group_belongs_to_a_single_day()
    {
        $day = factory(Day::class)->create();
        $group = factory(Group::class)->create([
            'day_id' => $day->id,
        ]);

        $this->assertDatabaseHas('groups', [
            'id'     => $group->id,
            'day_id' => $day->id,
        ]);
    }
}
