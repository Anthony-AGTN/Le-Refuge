<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animal')]
class AnimalController extends AbstractController
{
    #[Route('/', name: 'app_animal_index', methods: ['GET'])]
    public function index(AnimalRepository $animalRepository): Response
    {
        return $this->render('animal/index.html.twig', [
            'website' => 'Le Refuge',
            'animals' => $animalRepository->findAll(),
        ]);
    }

    #[Route('/admin', name: 'app_animal_admin_index', methods: ['GET'])]
    public function adminIndex(AnimalRepository $animalRepository): Response
    {
        return $this->render('animal/admin_index.html.twig', [
            'website' => 'Le Refuge',
            'animals' => $animalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AnimalRepository $animalRepository): Response
    {
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animalRepository->add($animal, true);

            return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal/new.html.twig', [
            'website' => 'Le Refuge',
            'animal' => $animal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_show', methods: ['GET'])]
    public function show(Animal $animal): Response
    {
        return $this->render('animal/show.html.twig', [
            'website' => 'Le Refuge',
            'animal' => $animal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Animal $animal, AnimalRepository $animalRepository): Response
    {
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animalRepository->add($animal, true);

            return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal/edit.html.twig', [
            'website' => 'Le Refuge',
            'animal' => $animal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_delete', methods: ['POST'])]
    public function delete(Request $request, Animal $animal, AnimalRepository $animalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $animal->getId(), $request->request->get('_token'))) {
            $animalRepository->remove($animal, true);
        }

        return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
    }
}
