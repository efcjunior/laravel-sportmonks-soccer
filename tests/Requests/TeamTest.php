<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class TeamTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_gets_all_teams_by_season_id()
    {
        $response = SoccerAPI::teams()
            ->allBySeasonId($this->seasonId);

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_gets_a_team_by_id()
    {
        $response = SoccerAPI::teams()
            ->byId($this->teamId);

        $this->assertEquals($this->teamId, $response->data->id);
    }
}
