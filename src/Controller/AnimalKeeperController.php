<?php

namespace App\Controller;

use App\Entity\AnimalKeeper;
use App\Form\AnimalKeeperType;
use App\Repository\AnimalKeeperRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animal-keeper')]
class AnimalKeeperController extends AbstractController
{
    #[Route('/', name: 'app_animal_keeper_index', methods: ['GET'])]
    public function index(AnimalKeeperRepository $animalKeeperRepository): Response
    {
        return $this->render('animal_keeper/index.html.twig', [
            'website' => 'Le Refuge',
            'animal_keepers' => $animalKeeperRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animal_keeper_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AnimalKeeperRepository $animalKeeperRepository): Response
    {
        $animalKeeper = new AnimalKeeper();
        $form = $this->createForm(AnimalKeeperType::class, $animalKeeper);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animalKeeperRepository->add($animalKeeper, true);

            return $this->redirectToRoute('app_animal_keeper_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal_keeper/new.html.twig', [
            'website' => 'Le Refuge',
            'animal_keeper' => $animalKeeper,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_keeper_show', methods: ['GET'])]
    public function show(AnimalKeeper $animalKeeper): Response
    {
        return $this->render('animal_keeper/show.html.twig', [
            'website' => 'Le Refuge',
            'animal_keeper' => $animalKeeper,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_keeper_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        AnimalKeeper $animalKeeper,
        AnimalKeeperRepository $animalKeeperRepository
    ): Response {
        $form = $this->createForm(AnimalKeeperType::class, $animalKeeper);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animalKeeperRepository->add($animalKeeper, true);

            return $this->redirectToRoute('app_animal_keeper_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal_keeper/edit.html.twig', [
            'website' => 'Le Refuge',
            'animal_keeper' => $animalKeeper,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_keeper_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        AnimalKeeper $animalKeeper,
        AnimalKeeperRepository $animalKeeperRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $animalKeeper->getId(), $request->request->get('_token'))) {
            $animalKeeperRepository->remove($animalKeeper, true);
        }

        return $this->redirectToRoute('app_animal_keeper_index', [], Response::HTTP_SEE_OTHER);
    }
}
