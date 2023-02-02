<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RefugeRepository;
use App\Service\FormatDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;

class MainController extends AbstractController
{
    private RefugeRepository $refugeRepository;
    private RequestStack $requestStack;
    private Security $security;

    public function __construct(RefugeRepository $refugeRepository, RequestStack $requestStack, Security $security)
    {
        $this->refugeRepository = $refugeRepository;
        $this->requestStack = $requestStack;
        $this->security = $security;
    }

    // Récupération de l'utilisateur connecté
    protected function getCurrentUser(): ?User
    {
        $currentUser = $this->security->getUser();
        if ($currentUser instanceof User) {
            return $currentUser;
        }
        return null;
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
