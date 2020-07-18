<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Group;
use App\Day;
use App\Item;

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

    /**
     * A group can have one or more items.
     *
     * @test
     * @return void
     */
    public function a_group_can_have_one_or_more_items()
    {
        $group = factory(Group::class)->create();
        $itemOne = factory(Item::class)->create([
            'group_id' => $group->id,
        ]);
        $itemTwo = factory(Item::class)->create([
            'group_id' => $group->id,
        ]);

        $this->assertDatabaseHas('items', [
            'group_id' => $group->id,
            'id'       => $itemOne->id,
        ]);
        $this->assertDatabaseHas('items', [
            'group_id' => $group->id,
            'id'       => $itemTwo->id,
        ]);
    }
}
