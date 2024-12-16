<?php

namespace App\Controller;

use App\Repository\AnimalsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ZoosController extends AbstractController
{
    #[Route('/zoos', name: 'app_zoos')]
    public function index(AnimalsRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animals/index.html.twig', [
            '$animals' => $animals,
        ]);
    }
}
