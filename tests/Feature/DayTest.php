<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Day;

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
}
