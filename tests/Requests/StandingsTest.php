<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class StandingsTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_standings_by_season()
    {
        $response = SoccerAPI::standings()
            ->bySeasonId($this->seasonId);

        $this->assertIsArray($response->data);
    }
}
