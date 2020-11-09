<?php


namespace App\DTOs;

use JsonException;

class HttpResponseDTO
{
    private string $body;

    private int $status_code;


    /**
     * HttpResponseDTO constructor.
     * @param string $body
     * @param int $status_code
     */
    public function __construct(string $body, int $status_code)
    {
        $this->body = $body;
        $this->status_code = $status_code;
    }


    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }


    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }


    /**
     * @param bool $assoc
     * @return array
     * @throws JsonException
     */
    public function getBodyAsArray(bool $assoc = true): array
    {
        return json_decode($this->body, $assoc, 512, JSON_THROW_ON_ERROR);
    }
}
