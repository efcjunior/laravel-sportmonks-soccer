<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Carbon\Carbon;
use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class FixtureTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_fixtures_for_a_specific_date_range_using_carbon()
    {
        $fromDate = Carbon::now()->subMonths(2);
        $toDate = Carbon::now();

        $response = SoccerAPI::fixtures()
            ->betweenDates($fromDate, $toDate);

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_fixtures_for_a_specific_date_range_using_string()
    {
        $fromDate = Carbon::now()->subMonths(2);
        $toDate = Carbon::now();

        $response = SoccerAPI::fixtures()
            ->betweenDates($fromDate, $toDate);

        $this->assertIsArray($response->data);
    }

    /**
     * @test
     */
    public function test_retrieves_fixtures_for_a_specific_date_using_carbon()
    {
        $date = Carbon::now()->subMonths(2);

        $response = SoccerAPI::fixtures()
            ->byDate($date);

        $this->assertIsArray($response->data);
    }

    /**
     * @test
     */
    public function test_retrieves_fixtures_for_a_specific_date_using_string()
    {
        $date = Carbon::now()->subMonths(2);

        $response = SoccerAPI::fixtures()
            ->byDate($date);

        $this->assertIsArray($response->data);
    }

    /**
     * @test
     */
    public function test_retrieves_fixture_by_match_id()
    {
        $response = SoccerAPI::fixtures()
            ->byMatchId($this->matchId);

        $this->assertEquals($this->matchId, $response->data->id);
    }

    /**
     * @test
     */
    public function test_retrieves_fixtures_between_teams()
    {
        $response = SoccerAPI::fixtures()
            ->headToHead($this->firstTeamId, $this->secondTeamId);

        $this->assertIsArray($response->data);
    }
}
