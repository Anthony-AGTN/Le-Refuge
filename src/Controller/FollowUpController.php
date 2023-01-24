<?php

namespace App\Controller;

use App\Entity\FollowUp;
use App\Form\FollowUpType;
use App\Repository\FollowUpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/follow/up')]
class FollowUpController extends MainController
{
    #[Route('/', name: 'app_follow_up_index', methods: ['GET'])]
    public function index(FollowUpRepository $followUpRepository): Response
    {
        return $this->render('follow_up/index.html.twig', [
            'follow_ups' => $followUpRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_follow_up_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FollowUpRepository $followUpRepository): Response
    {
        $followUp = new FollowUp();
        $form = $this->createForm(FollowUpType::class, $followUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $followUpRepository->save($followUp, true);

            return $this->redirectToRoute('app_follow_up_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('follow_up/new.html.twig', [
            'follow_up' => $followUp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_follow_up_show', methods: ['GET'])]
    public function show(FollowUp $followUp): Response
    {
        return $this->render('follow_up/show.html.twig', [
            'follow_up' => $followUp,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_follow_up_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FollowUp $followUp, FollowUpRepository $followUpRepository): Response
    {
        $form = $this->createForm(FollowUpType::class, $followUp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $followUpRepository->save($followUp, true);

            return $this->redirectToRoute('app_follow_up_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('follow_up/edit.html.twig', [
            'follow_up' => $followUp,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_follow_up_delete', methods: ['POST'])]
    public function delete(Request $request, FollowUp $followUp, FollowUpRepository $followUpRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $followUp->getId(), $request->request->get('_token'))) {
            $followUpRepository->remove($followUp, true);
        }

        return $this->redirectToRoute('app_follow_up_index', [], Response::HTTP_SEE_OTHER);
    }
}
