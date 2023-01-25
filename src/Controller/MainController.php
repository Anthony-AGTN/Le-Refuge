<?php

namespace App\Controller;

use App\Repository\RefugeRepository;
use App\Service\FormatDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MainController extends AbstractController
{
    private RefugeRepository $refugeRepository;
    private RequestStack $requestStack;
    protected TokenStorageInterface $tokenStorage;

    public function __construct(RefugeRepository $refugeRepository, RequestStack $requestStack, TokenStorageInterface $tokenStorage)
    {
        $this->refugeRepository = $refugeRepository;
        $this->requestStack = $requestStack;
        $this->tokenStorage = $tokenStorage;
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
        $refuge->setPhone(FormatDataService::formatPhone($refuge->getPhone()));
        $parameters['refuge'] = $refuge;

        $content = $this->renderView($view, $parameters);

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($content);

        return $response;
    }
}
