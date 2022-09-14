<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class LiveScoreTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_livescores_for_today()
    {
        $response = SoccerAPI::livescores()
            ->today();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_livescores_for_now()
    {
        $response = SoccerAPI::livescores()
            ->now();

        $this->assertIsArray($response->data);
    }
}
