<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test get success analytics response.
     *
     * @return void
     */
    public function test_get_success_analytics_response()
    {
        $this->seed();

        $this->get('api/analytics')
            //Assert status
            ->assertStatus(200)
            //Assert json structure
            ->assertJsonStructure([
                "data" => [
                    [
                        "endpoint",
                        "method",
                        "count"
                    ],
                ]
            ]);
    }
}
