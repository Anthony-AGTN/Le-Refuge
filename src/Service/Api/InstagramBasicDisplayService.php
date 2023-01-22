<?php

namespace App\Service\Api;

use Symfony\Component\HttpClient\HttpClient;

class InstagramBasicDisplayService
{
    public function getInstagramFeeds(string $apiKey = null): array
    {
        $baseFeedUrl = $_ENV['BASE_FEED_URL'];
        $apiToken = $_ENV['API_TOKEN_INSTAGRAM'];
        $limitOfFeeds = $_ENV['LIMIT_DISPLAY_FEED_INSTAGRAM'];
        $limit = $limitOfFeeds ? '&limit=' . $limitOfFeeds : '';

        $urlRequest = $baseFeedUrl . $limit . '&access_token=' . $apiToken . ($apiKey ? '&after=' . $apiKey : '');

        $client = HttpClient::create();
        $response = $client->request('GET', $urlRequest);
        return $response->toArray();
    }
}
