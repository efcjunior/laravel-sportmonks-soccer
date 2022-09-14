<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class SeasonTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_seasons()
    {
        $response = SoccerAPI::seasons()
            ->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_season_by_id()
    {
        $response = SoccerAPI::seasons()
            ->byId($this->seasonId);

        $this->assertEquals($this->seasonId, $response->data->id);
    }
}
