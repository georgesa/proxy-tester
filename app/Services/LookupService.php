<?php

namespace App\Services;

use App\Models\Lookup;
use GuzzleHttp\Client;

class LookupService implements LookupInterface
{
    protected $client;
    protected $params;
    protected $response;
    protected $responseCode;
    protected $responseTime;
    protected $error;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }

    public function test()
    {
        try {
            $timeStart = microtime(true);
            $this->response = $this->client->get($this->params['url'], [
                'proxy' => $this->createProxyUrl(),
            ]);
            $timeStop = microtime(true);

            $this->responseTime = $timeStop - $timeStart;
            $this->responseCode = $this->response->getStatusCode();
        } catch (\Exception $e) {
            $this->error = $e;
        }
    }

    public function save()
    {
        Lookup::create([
            'url' => $this->params['url'],
            'proxy_ip' => $this->params['proxy_ip'],
            'proxy_port' => $this->params['proxy_port'],
            'response_code' => $this->responseCode,
            'response_time' => $this->responseTime,
        ]);
    }

    public function getResponseTime()
    {
        return $this->responseTime;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function getErrorMessage()
    {
        return $this->error ? $this->error->getMessage() : '';
    }

    protected function createProxyUrl(): string
    {
        //ugly but fast to write :))
        $login = !empty($this->params['username']) && !empty($this->params['password']) ?
            "{$this->params['username']}:{$this->params['password']}@" : "";

        $proxy = "http://{$login}{$this->params['proxy_ip']}:{$this->params['proxy_port']}";

        return $proxy;
    }

}