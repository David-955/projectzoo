<?php

namespace App\Controller;

use App\Repository\AnimalsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamiliesController extends AbstractController
{
    #[Route('/families', name: 'app_families')]
    public function index(AnimalsRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animals/index.html.twig', [
            '$animals' => $animals,
        ]);
    }
}
