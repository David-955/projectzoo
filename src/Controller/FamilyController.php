<?php

namespace App\Controller;
use App\Entity\Family;
use App\Form\FamilyType;
use App\Repository\FamilyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilyController extends AbstractController
{
    #[Route('/family', name: 'family_index')]
    public function index(FamilyRepository $repository): Response
    {
        $family = $repository->findAll();
        return $this->render('family/index.html.twig', [
            'family' => $family,
        ]);
    }
    #[Route('/family/new', name: 'family_new', methods:['GET','POST'])]
    public function new(Request $request, FamilyRepository $familyRepository): Response
    {
        $family = new Family();
        $form =  $this->createForm(FamilyType::class, $family);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $familyRepository->save($family, true);
            return $this->redirectToRoute('family_index');
        }
        return $this->render('animals/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
