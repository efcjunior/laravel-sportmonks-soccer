<?php

namespace Sportmonks\SoccerAPI;

use GuzzleHttp\Client;
use Sportmonks\SoccerAPI\Exceptions\ApiRequestException;

class SoccerAPIClient
{
    protected $client;
    protected $apiToken;
    protected $withoutData;
    protected $include = [];
    protected $leagues = [];
    protected $perPage = 50;
    protected $page = 1;
    protected $timezone;
    
    /**
     * Constructs a new instance.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $options = [
            'base_uri'  => 'https://soccer.sportmonks.com/api/v2.0/',
            'verify'    => app('env') === 'testing' ? false : true,
        ];

        $this->client = new Client($options);

        $this->apiToken = config('soccerapi.api_token');

        if (empty($this->apiToken)) {
            throw new \InvalidArgumentException('No API token set');
        }

        $this->timezone = empty(config('soccerapi.timezone'))
            ? config('app.timezone')
            : config('soccerapi.timezone');

        $this->withoutData = !empty(config('soccerapi.without_data'))
            ? config('soccerapi.without_data')
            : false;
    }

    /**
     * Builds the query and parses the response.
     *
     * @param  string $url
     * @param  bool   $hasData
     *
     * @throws \Sportmonks\SoccerAPI\Exceptions\ApiRequestException
     *
     * @return mixed
     */
    protected function call(string $url, bool $hasData = false)
    {
        $query = [
            'api_token' => $this->apiToken,
            'per_page'  => $this->perPage,
            'page'      => $this->page
        ];

        if (!empty($this->include)) {
            $query['include'] = $this->include;
        }

        if ($this->timezone) {
            $query['tz'] = $this->timezone;
        }

        if (!empty($this->leagues)) {
            $query['leagues'] = $this->leagues;
        }

        $response = $this->client->get($url, ['query' => $query]);

        $body = json_decode($response->getBody()->getContents());

        if (property_exists($body, 'error')) {
            if (is_object($body->error)) {
                throw new ApiRequestException($body->error->message, $body->error->code);
            } else {
                throw new ApiRequestException($body->error, 500);
            }

            return $response;
        }

        if ($hasData && $this->withoutData) {
            return $body->data;
        }

        return $body;
    }

    /**
     * Sends the request to the API.
     *
     * @param string $url
     *
     * @return mixed
     */
    protected function callData(string $url)
    {
        return $this->call($url, true);
    }

    /**
     * Sets the include.
     *
     * @param string|array $include
     *
     * @return self
     */
    public function setInclude($include)
    {
        if (is_array($include) && !empty($include)) {
            $include = implode(',', $include);
        }

        $this->include = $include;

        return $this;
    }

    /**
     * Sets the leagues.
     *
     * @param string|array $leagues
     *
     * @return self
     */
    public function setLeagues($leagues)
    {
        if (is_array($leagues) && !empty($leagues)) {
            $leagues = implode(',', $leagues);
        }

        $this->leagues = $leagues;

        return $this;
    }

    /**
     * Sets the per page (limit).
     *
     * @param int $perPage
     *
     * @return self
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * Sets the page.
     *
     * @param int $page
     *
     * @return self
     */
    public function setPage(int $page)
    {
        $this->page = $page;

        return $this;
    }
}
