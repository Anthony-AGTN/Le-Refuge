<?php

namespace App\Controller;

use App\Service\Api\InstagramBasicDisplayService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/instagram-feeds')]
class InstagramBasicDisplayController extends MainController
{
    #[Route('/{apiKey}', name: 'instagram_feeds', methods: ['GET'])]
    public function getInstagramFeeds(string $apiKey = null): JsonResponse
    {
        $instaBasicDisplay = new InstagramBasicDisplayService();
        $instagramFeeds = $instaBasicDisplay->getInstagramFeeds($apiKey);

        return new JsonResponse(['instagramFeeds' => $instagramFeeds]);
    }
}
