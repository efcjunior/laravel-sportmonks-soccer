<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Illuminate\Support\Facades\Config;
use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class MarketsTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_markets()
    {
        $response = SoccerAPI::markets()
            ->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_markets_without_data()
    {
        Config::set('soccerapi.without_data', true);

        $response = SoccerAPI::markets()
            ->all();

        $this->assertArrayHasKey(0, $response);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_markets_by_id()
    {
        $response = SoccerAPI::markets()
            ->byId($this->marketsId);

        $this->assertEquals($this->marketsId, $response->data->id);
        $this->assertNotNull($response->data->name);
    }
}
