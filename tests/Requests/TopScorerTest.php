<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class TopScorerTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_top_scorer_by_season()
    {
        $response = SoccerAPI::topscorers()
            ->bySeasonId($this->seasonId);

        $this->assertNotEmpty($response->data);
    }
}
