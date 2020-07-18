<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Day;

class HomeTest extends TestCase
{
    use RefreshDatabase;


    /**
     * The home page displays the current date.
     *
     * @test
     * @return void
     */
    public function the_home_displays_the_current_date()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText(today()->toFormattedDateString());
    }
}
