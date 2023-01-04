<?php

namespace App\Controller;

use App\Entity\Refuge;
use App\Form\RefugeType;
use App\Repository\RefugeRepository;
use App\Service\FormatDataService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refuge')]
class RefugeController extends MainController
{
    #[Route('/{id}/edit', name: 'app_refuge_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Refuge $refuge,
        RefugeRepository $refugeRepository,
        RequestStack $requestStack
    ): Response {
        $form = $this->createForm(RefugeType::class, $refuge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $refuge = $form->getData();
            $refuge->setPhone(FormatDataService::formatPhoneDeleteSpace($refuge->getPhone()));
            $refugeRepository->add($refuge, true);
            $session = $requestStack->getSession();
            $session->set('refuge', $refuge);
        }

        return $this->renderForm('refuge/edit.html.twig', [
            'refuge' => $refuge,
            'form' => $form,
        ]);
    }
}
