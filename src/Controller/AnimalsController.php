<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalsController extends AbstractController
{
    #[Route('/animals', name: 'project_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $animals = $em->getRepository(Animals::class)->findAll();
        return $this->render('animals/index.html.twig', [
            'animals' => $animals,
        ]);
    }
}
