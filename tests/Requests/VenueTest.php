<?php

use Sportmonks\SoccerAPI\Facades\SoccerAPI;

class VenueTest extends TestCase
{
    /**
     * @test
     */
    public function it_retrieves_a_venue_by_id()
    {
        $response = SoccerAPI::venues()->byId($this->venueId);

        $this->assertEquals($this->venueId, $response->data->id);
    }
}
