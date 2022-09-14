<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class OddsTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_odds_by_match_id()
    {
        $response = SoccerAPI::odds()
            ->byMatchId($this->matchId);

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_odds_by_match_and_bookmaker_id()
    {
        $response = SoccerAPI::odds()
            ->byMatchAndBookmakerId($this->matchId, $this->bookmakerId);

        $this->assertIsArray($response->data);
    }
}
