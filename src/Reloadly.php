<?php

namespace Towoju5\Reloadly;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Reloadly
{
    const auth_url = "https://auth.reloadly.com/oauth/token";

    public function __construct(){
        if(getenv('RELOADLY_MODE') == 'sandbox'){
            $this->base_url      = getenv("RELOADLY_TEST_URL");
        } else {
            $this->base_url      = getenv("RELOADLY_LIVE_URL");
        }
    }

    public static function getToken()
    {
        $data = [
            "client_id"     => getenv("RELOADLY_CLIENT_ID"),
            "client_secret" => getenv("RELOADLY_CLIENT_SECRET"),
            "grant_type"    => "client_credentials",
            "audience"      => "https://topups-sandbox.reloadly.com"
        ];
        $res = self::send_request(self::auth_url, "POST", $data, NULL);
        $result = json_decode($res);
        return $result->access_token;
    }

    public static function send_request(string $url, string $method, array $data = [], string $token=NULL)
    {
        $client = new Client();
        $headers["Content-Type"] = "application/json";

        if (NULL != $token) {
            $headers["Authorization"] = "Bearer ${token}";
        }
        
        $body = json_encode($data);
        $request = new Request($method, $url, $headers, $body);
        $res = $client->sendAsync($request)->wait();
        $result = $res->getBody();
        return $result;
    }
}