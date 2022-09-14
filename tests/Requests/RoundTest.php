<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class RoundTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_round_by_id()
    {
        $response = SoccerAPI::rounds()
            ->byId($this->roundId);

        $this->assertNotEmpty($response->data);
    }
}
