<?php

return [

    'api_token' => env('SPORTMONKS_API_TOKEN'),
    'without_data' => env('SPORTMONKS_SKIP_DATA', false),
    'timezone' => config('app.timezone'),

];
