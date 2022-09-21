# Laravel Sportmonks Soccer API

This package is a wrapper for Sportmonks Soccer API for Laravel 7/8/9.

This is a fork of [kirill-latish/laravel-sportmonks-soccer](https://github.com/kirill-latish/laravel-sportmonks-soccer) with added support for Larvel 7+.

## Installation

Install the package via Composer:

```bash
composer require kfoobar/laravel-sportmonks-soccer
```

Add your API token to your `.env` file:

```
SPORTMONKS_API_TOKEN=
```

For more settings, you can publish the config file:

```bash
$ php artisan vendor:publish --provider="Sportmonks\SoccerAPI\SoccerAPIServiceProvider"
```

## Usage

Example when using the facade:

```php
use SoccerAPI;

...

$response = SoccerAPI::leagues()->all();
$response = SoccerAPI::fixtures()->byId($id);
```

### Relations

If you need to include other relations (check the official documentation for which relations can be included):

```php
$response = SoccerAPI::seasons()->setInclude(['league', 'fixtures'])->all();
```
### Response
The default behaviour is to return an object containing a `data` array:

```php
$response = SoccerAPI::fixtures()->byId($id);

var_dump($response->data);
```

```json
{
    "data": [
        {
            "id": null,
            "league_id": null,
            "scores": {
                "localteam_score": 0,
                "visitorteam_score": 0
            }
        }
    ]
}
```

If you want to directly retrieve the properties inside `data`, set `skip_data` to `true` in your config file.

```php
$response = SoccerAPI::fixtures()->byId($id);

var_dump($response);
```

```json
{
    "id": null,
    "league_id": null,
    "scores": {
        "localteam_score": 0,
        "visitorteam_score": 0
    }
}
```

## Documentation

Please refer to the official [documentation](https://www.sportmonks.com/sports/soccer) as to which API calls can be made.


## Contributing

Thank you for considering contributing!
