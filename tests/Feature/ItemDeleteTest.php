<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Item;

class ItemDeleteTest extends TestCase
{
    use RefreshDatabase;


    /**
     * An item can be deleted.
     *
     * @test
     * @return void
     */
    public function an_item_can_be_deleted()
    {
        $item = factory(Item::class)->create();

        $response = $this->deleteJson('/items/' . $item->id, [
            $item
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'group'   => $item->group->toArray(),
                'message' => 'Item deleted!',
            ]);
    }
}
