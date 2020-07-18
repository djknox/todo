<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Item;
use App\Group;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * An item has a description.
     *
     * @test
     * @return void
     */
    public function an_item_has_a_description()
    {
        $item = factory(Item::class)->create();

        $this->assertDatabaseHas('items', [
            'id'          => $item->id,
            'description' => $item->description,
        ]);
    }

    /**
     * An item belongs to a single group.
     *
     * @test
     * @return void
     */
    public function an_item_belongs_to_a_single_group()
    {
        $group = factory(Group::class)->create();
        $item = factory(Item::class)->create([
            'group_id' => $group->id,
        ]);

        $this->assertDatabaseHas('items', [
            'id'     => $item->id,
            'group_id' => $group->id,
        ]);
    }
}
