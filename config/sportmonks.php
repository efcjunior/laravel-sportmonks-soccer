<?php

return [

    'api_url'   => env('SPORTMONKS_API_URL', 'https://soccer.sportmonks.com/api/v2.0/'),
    'api_token' => env('SPORTMONKS_API_TOKEN'),
    'skip_data' => env('SPORTMONKS_SKIP_DATA', false),
    'timezone'  => env('SPORTMONKS_TIMEZONE'),

];
