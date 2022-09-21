<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class Head2HeadTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_gets_head_to_head_statistics_between_teams_by_ids()
    {
        $response = SoccerAPI::head2head()
            ->betweenTeams($this->team1Id, $this->team2Id);

        $this->assertIsArray($response->data);
    }
}
