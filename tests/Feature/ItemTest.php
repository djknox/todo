<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Item;

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
}
