<?php

namespace App\Controller;

use App\Repository\AnimalsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainlandsController extends AbstractController
{
    #[Route('/mainlands', name: 'app_mainlands')]
    public function index(AnimalsRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animals/index.html.twig', [
            '$animals' => $animals,
        ]);
    }
}
