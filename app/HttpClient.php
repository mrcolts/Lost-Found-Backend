<?php


namespace App;


use App\DTOs\HttpResponseDTO;
use GuzzleHttp\Client;

class HttpClient
{
    private ?string $base_url;

    private ?string $access_token = '';

    public function sendGetRequest(string $uri, array $options = [])
    {
        return $this->sendRequest('GET', $uri, $options);
    }

    private function sendRequest(string $method, string $uri, array $options = [])
    {
        $request = $this->getClient()->request($method, $uri, $options);

        return new HttpResponseDTO(
            $request->getBody()->getContents(),
            $request->getStatusCode()
        );
    }

    private function getClient()
    {
        return new Client([
            'headers' => [
                'Authorization' => "Bearer $this->access_token"
            ],
            'base_uri' => $this->base_url,
            'timeout' => 60000.0,
            'verify' => false,
            'http_errors' => false,
        ]);
    }

    public function sendPostRequest(string $uri, array $options = [])
    {
        return $this->sendRequest('POST', $uri, $options);
    }

    /**
     * @param string|null $base_url
     */
    public function setBaseUrl(?string $base_url): void
    {
        $this->base_url = $base_url;
    }
}
