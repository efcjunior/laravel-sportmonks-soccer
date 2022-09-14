<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class VenueTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_a_venue_by_id()
    {
        $response = SoccerAPI::venues()
            ->byId($this->venueId);

        $this->assertEquals($this->venueId, $response->data->id);
    }
}
