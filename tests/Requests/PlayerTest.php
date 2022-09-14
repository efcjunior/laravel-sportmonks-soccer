<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class PlayerTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_gets_a_player_by_id()
    {
        $response = SoccerAPI::players()
            ->byId($this->playerId);

        $this->assertEquals($this->playerId, $response->data->player_id);
    }
}
