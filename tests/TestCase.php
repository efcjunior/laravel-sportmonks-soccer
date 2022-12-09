<?php
namespace Sportmonks\SoccerAPI\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Config;
use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\SoccerAPIServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected $matchId;
    protected $tvStationMatchId;
    protected $leagueId;
    protected $continentId;
    protected $countryId;
    protected $fixtureId;
    protected $teamId;
    protected $firstTeamId;
    protected $secondTeamId;
    protected $seasonId;
    protected $playerId;
    protected $bookmakerId;
    protected $venueId;
    protected $roundId;
    protected $team1Id;
    protected $team2Id;

    /**
     * This method is called before each test.
     */
    public function setUp(): void
    {
        parent::setup();

        $this->matchId = 18469093;
        $this->tvStationMatchId = 7611;
        $this->leagueId = 573;
        $this->continentId = 1;
        $this->venueId = 206;
        $this->roundId = 267056;
        $this->countryId = 462;
        $this->teamId = 2535;
        $this->team1Id = 2535;
        $this->team2Id = 2353;
        $this->firstTeamId = 2535;
        $this->secondTeamId = 2353;
        $this->seasonId = 19376;
        $this->playerId = 580;
        $this->bookmakerId = 1;
        $this->marketsId = 10;
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return ['SoccerAPI' => SoccerAPI::class];
    }

    /**
     * Boots the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        $app->register(SoccerAPIServiceProvider::class);

        return $app;
    }
}
