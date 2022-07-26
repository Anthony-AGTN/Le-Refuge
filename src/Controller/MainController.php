<?php

namespace App\Controller;

use App\Repository\RefugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    private RefugeRepository $refugeRepository;

    public function __construct(RefugeRepository $refugeRepository)
    {
        $this->refugeRepository = $refugeRepository;
    }

    /**
     * Renders a view.
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {

        $parameters['refuge'] = $this->refugeRepository->findOneBy(['id' => 1]);
        $content = $this->renderView($view, $parameters);

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($content);

        return $response;
    }
}
