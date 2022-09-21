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
        $this->client = new Client([
            'base_uri'  => config('sportmonks.api_url'),
            'verify'    => app('env') !== 'production' ? false : true,
        ]);

        $this->apiToken = config('sportmonks.api_token');

        if (empty($this->apiToken)) {
            throw new \InvalidArgumentException('No API token set');
        }

        $this->timezone = !empty(config('sportmonks.timezone'))
            ? config('sportmonks.timezone')
            : config('app.timezone');

        $this->withoutData = !empty(config('sportmonks.skip_data'))
            ? config('sportmonks.skip_data')
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

        if ($this->withoutData) {
            return $body->data ?? null;
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
