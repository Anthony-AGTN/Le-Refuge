<?php

namespace App\Controller;

use App\Entity\TypeOfCare;
use App\Form\TypeOfCareType;
use App\Repository\TypeOfCareRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/of/care')]
class TypeOfCareController extends MainController
{
    #[Route('/', name: 'app_type_of_care_index', methods: ['GET'])]
    public function index(TypeOfCareRepository $typeOfCareRepository): Response
    {
        return $this->render('type_of_care/index.html.twig', [
            'type_of_cares' => $typeOfCareRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_of_care_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeOfCareRepository $typeOfCareRepository): Response
    {
        $typeOfCare = new TypeOfCare();
        $form = $this->createForm(TypeOfCareType::class, $typeOfCare);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfCareRepository->save($typeOfCare, true);

            return $this->redirectToRoute('app_type_of_care_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_of_care/new.html.twig', [
            'type_of_care' => $typeOfCare,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_of_care_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeOfCare $typeOfCare, TypeOfCareRepository $typeOfCareRepository): Response
    {
        $form = $this->createForm(TypeOfCareType::class, $typeOfCare);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfCareRepository->save($typeOfCare, true);

            return $this->redirectToRoute('app_type_of_care_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_of_care/edit.html.twig', [
            'type_of_care' => $typeOfCare,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_of_care_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        TypeOfCare $typeOfCare,
        TypeOfCareRepository $typeOfCareRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $typeOfCare->getId(), $request->request->get('_token'))) {
            $typeOfCareRepository->remove($typeOfCare, true);
        }

        return $this->redirectToRoute('app_type_of_care_index', [], Response::HTTP_SEE_OTHER);
    }
}
