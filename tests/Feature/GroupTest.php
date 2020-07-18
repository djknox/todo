<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Group;

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
}
