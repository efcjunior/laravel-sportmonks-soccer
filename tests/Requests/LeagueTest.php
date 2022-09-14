<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Illuminate\Support\Facades\Config;
use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class LeagueTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_leagues()
    {
        $response = SoccerAPI::leagues()->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_leagues_without_data()
    {
        Config::set('soccerapi.without_data', true);

        $response = SoccerAPI::leagues()
            ->all();

        $this->assertArrayHasKey(0, $response);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_league_by_id()
    {
        $response = SoccerAPI::leagues()
            ->byId($this->leagueId);

        $this->assertEquals($this->leagueId, $response->data->id);
        $this->assertNotNull($response->data->name);
    }
}
