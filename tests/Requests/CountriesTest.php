<?php

use Sportmonks\SoccerAPI\Facades\SoccerAPI;

class CountriesTest extends TestCase
{
    /**
     * @test
     */
    public function it_retrieves_all_countries()
    {
        $response = SoccerAPI::countries()->all();

        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function it_retrieves_a_country_by_id()
    {
        $response = SoccerAPI::countries()->byId($this->countryId);

        $this->assertEquals($this->countryId, $response->data->id);
    }
}
