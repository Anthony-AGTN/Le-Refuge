<?php

namespace App\Controller;

use App\Repository\RefugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    private RefugeRepository $refugeRepository;
    private RequestStack $requestStack;

    public function __construct(RefugeRepository $refugeRepository, RequestStack $requestStack)
    {
        $this->refugeRepository = $refugeRepository;
        $this->requestStack = $requestStack;
    }

    /**
     * Renders a view.
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {

        // Mise en session des informations du refuge
        $session = $this->requestStack->getSession();

        if (!$session->get('refuge')) {
            $refuge = $this->refugeRepository->findOneBy(['id' => 1]);
            $session->set('refuge', $refuge);
        }
        $refuge = $session->get('refuge');
        $parameters['refuge'] = $refuge;

        $content = $this->renderView($view, $parameters);

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($content);

        return $response;
    }
}
