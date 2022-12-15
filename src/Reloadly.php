<?php

namespace Towoju5\Reloadly;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Reloadly
{
    protected $auth_url = "https://auth.reloadly.com/oauth/token";

    public function __construct(){
        if(getenv('RELOADLY_MODE') == 'sandbox'){
            $this->base_url      = getenv("RELOADLY_TEST_URL");
        } else {
            $this->base_url      = getenv("RELOADLY_LIVE_URL");
        }
        $this->client_id      = getenv("RELOADLY_CLIENT_ID");
        $this->client_secret  = getenv("RELOADLY_CLIENT_SECRET");
    }

    public function getToken()
    {
        $data = [
            "client_id"     => $this->client_id,
            "client_secret" => $this->client_secret,
            "grant_type"    => "client_credentials",
            "audience"      => "https://topups-sandbox.reloadly.com"
        ];
        $res = self::send_request($this->auth_url, "POST", $data, NULL);
        $result = json_decode($res);
        return $result->access_token;
    }

    public function send_request(string $url, string $method, array $data = [], string $token=NULL)
    {
        $client = new Client();
        $headers["Content-Type"] = "application/json";

        if (NULL != $token) {
            $headers["Authorization"] = "Bearer ${token}";
        }
        
        $body = json_encode($data);
        $request = new Request($method, $url, $headers, $body);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();
    }
}
