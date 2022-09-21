<?php
namespace Sportmonks\SoccerAPI\Tests;

use Illuminate\Support\Facades\Config;
use Sportmonks\SoccerAPI\SoccerAPIClient;
use Sportmonks\SoccerAPI\Tests\TestCase;

class SetupTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_throws_an_exception_if_no_api_token_set()
    {
        $this->expectException(\InvalidArgumentException::class);

        Config::set('soccerapi.api_token', '');

        $soccerAPI = new SoccerAPIClient();
    }
}
