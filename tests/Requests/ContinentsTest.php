<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class ContinentsTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_continents()
    {
        $response = SoccerAPI::continents()
            ->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_continent_by_id()
    {
        $response = SoccerAPI::continents()
            ->byId($this->continentId);

        $this->assertEquals($this->continentId, $response->data->id);
    }
}
