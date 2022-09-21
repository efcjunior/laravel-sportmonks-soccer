<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class TVStationTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_tvstations_by_match_id()
    {
        $response = SoccerAPI::tvstations()
            ->byMatchId($this->tvStationMatchId);

        $this->assertIsArray($response->data);
    }
}
