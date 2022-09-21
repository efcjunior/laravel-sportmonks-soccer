<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class CommentaryTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_it_gets_commentaries_by_match_id()
    {
        $response = SoccerAPI::commentaries()
            ->byMatchId($this->matchId);

        $this->assertIsArray($response->data);
    }
}
