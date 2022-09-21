<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class CountriesTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_countries()
    {
        $response = SoccerAPI::countries()
            ->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_country_by_id()
    {
        $response = SoccerAPI::countries()
            ->byId($this->countryId);

        $this->assertEquals($this->countryId, $response->data->id);
    }
}
