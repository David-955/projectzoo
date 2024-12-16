<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Form\AnimalType;
use App\Repository\AnimalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalsController extends AbstractController
{
    #[Route('/animals', name: 'animals_index')]
    public function index(AnimalsRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animals/index.html.twig', [
            '$animals' => $animals,
        ]);
    }

    #[Route('/new', name: 'animals_new', methods:['GET','POST'])]
    public function new(Request $request, AnimalsRepository $animalsRepository): Response
    {
        $animals = new Animals();
        $form =  $this->createForm(AnimalType::class, $animals);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $animalsRepository->save($animals, true);
            return $this->redirectToRoute('animals_index');
        }
        return $this->render('animals/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
