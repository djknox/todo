<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Item;

class ItemCompletedTest extends TestCase
{
    use RefreshDatabase;


    /**
     * An item can be completed.
     *
     * @test
     * @return void
     */
    public function an_item_can_be_completed()
    {
        $item = factory(Item::class)->create([
            'completed' => false,
        ]);

        $response = $this->patchJson('/items/' . $item->id, [
            'completed' => true,
        ]);

        $item = $item->fresh();

        $response
            ->assertStatus(200)
            ->assertJson([
                'group'   => $item->group->toArray(),
                'message' => 'Item completed!',
            ]);

        $this->assertDatabaseHas('items', [
            'id'        => $item->id,
            'completed' => true,
        ]);
    }
}
