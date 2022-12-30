<?php

namespace App\Controller;

use App\Entity\Refuge;
use App\Form\RefugeType;
use App\Repository\RefugeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refuge')]
class RefugeController extends MainController
{
    #[Route('/', name: 'app_refuge_index', methods: ['GET'])]
    public function index(RefugeRepository $refugeRepository): Response
    {
        return $this->render('refuge/index.html.twig', [
            'refuges' => $refugeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_refuge_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RefugeRepository $refugeRepository): Response
    {
        $refuge = new Refuge();
        $form = $this->createForm(RefugeType::class, $refuge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $refugeRepository->add($refuge, true);

            return $this->redirectToRoute('app_refuge_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('refuge/new.html.twig', [
            'refuge' => $refuge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_refuge_show', methods: ['GET'])]
    public function show(Refuge $refuge): Response
    {
        return $this->render('refuge/show.html.twig', [
            'refuge' => $refuge,
        ]);
    }

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
            $refugeRepository->add($refuge, true);
            $session = $requestStack->getSession();
            $session->set('refuge', $refuge);
        }

        return $this->renderForm('refuge/edit.html.twig', [
            'refuge' => $refuge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_refuge_delete', methods: ['POST'])]
    public function delete(Request $request, Refuge $refuge, RefugeRepository $refugeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $refuge->getId(), $request->request->get('_token'))) {
            $refugeRepository->remove($refuge, true);
        }

        return $this->redirectToRoute('app_refuge_index', [], Response::HTTP_SEE_OTHER);
    }
}
