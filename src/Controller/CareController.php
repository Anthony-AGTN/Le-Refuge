<?php

namespace App\Controller;

use App\Entity\Care;
use App\Form\CareType;
use App\Repository\CareRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/care')]
class CareController extends MainController
{
    #[Route('/', name: 'app_care_index', methods: ['GET'])]
    public function index(CareRepository $careRepository): Response
    {
        return $this->render('care/index.html.twig', [
            'cares' => $careRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_care_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CareRepository $careRepository): Response
    {
        $care = new Care();
        $user = $this->tokenStorage->getToken()->getUser();
        $care->setUser($user);
        $care->setDate(new DateTime('now'));

        $form = $this->createForm(CareType::class, $care);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $typeOfCares = $form->getData()->getTypeOfCares();
            foreach ($typeOfCares as $typeOfCare) {
                $typeOfCare->addCare($care);
            }

            $careRepository->save($care, true);

            return $this->redirectToRoute('app_care_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('care/new.html.twig', [
            'care' => $care,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_care_show', methods: ['GET'])]
    public function show(Care $care): Response
    {
        return $this->render('care/show.html.twig', [
            'care' => $care,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_care_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Care $care, CareRepository $careRepository, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(CareType::class, $care);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newTypeOfCares = $form->getData()->getTypeOfCares();

            foreach ($newTypeOfCares as $newTypeOfCare) {
                $newTypeOfCare->addCare($care);
            }

            /* $em = $doctrine->getManager(); */
            /* $oldTypeOfCares = $care->getTypeOfCares(); */
            /* foreach ($oldTypeOfCares as $oldTypeOfCare) {
                $care->removeTypeOfCare($oldTypeOfCare);
            } */

            $careRepository->save($care, true);

            return $this->redirectToRoute('app_care_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('care/edit.html.twig', [
            'care' => $care,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_care_delete', methods: ['POST'])]
    public function delete(Request $request, Care $care, CareRepository $careRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $care->getId(), $request->request->get('_token'))) {
            $careRepository->remove($care, true);
        }

        return $this->redirectToRoute('app_care_index', [], Response::HTTP_SEE_OTHER);
    }
}
