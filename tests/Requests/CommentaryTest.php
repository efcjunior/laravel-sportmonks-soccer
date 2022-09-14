<?php

use Sportmonks\SoccerAPI\Facades\SoccerAPI;

class CommentaryTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_commentaries_by_match_id()
    {
        $response = SoccerAPI::commentaries()->byMatchId($this->matchId);

        $this->assertNotEmpty($response->data);
    }
}
