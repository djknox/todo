<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Group;
use App\Item;

class ItemStoreTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function an_item_can_be_added_to_a_group()
    {
        $group = factory(Group::class)->create();
        $item = factory(Item::class)->create();

        $response = $this->postJson('/groups/' . $group->id . '/items', [
            $item
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Item added!',
            ]);
    }
}
