<?php

namespace App\Controller;

use App\Repository\RefugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(RefugeRepository $refugeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'refuge' => $refugeRepository->findOneBy(['id' => 1]),
            'website' => 'niotna',
         ]);
    }
}
