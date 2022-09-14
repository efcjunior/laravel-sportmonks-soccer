<?php
namespace Sportmonks\SoccerAPI\Tests\Requests;

use Sportmonks\SoccerAPI\Facades\SoccerAPI;
use Sportmonks\SoccerAPI\Tests\TestCase;

class VideoTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_all_videos()
    {
        $response = SoccerAPI::videos()
            ->all();

        $this->assertIsArray($response->data);
    }

    /**
     * A basic test.
     *
     * @return void
     */
    public function test_retrieves_videos_by_match_id()
    {
        $response = SoccerAPI::videos()
            ->byMatchId($this->matchId);

        $this->assertIsArray($response->data);
    }
}
