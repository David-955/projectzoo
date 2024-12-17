<?php

namespace App\Controller;
use App\Entity\Mainlands;
use App\Form\MainlandsType;
use App\Repository\MainlandsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainlandsController extends AbstractController
{
    #[Route('/mainlands', name: 'mainlands_index')]
    public function index(MainlandsRepository $repository): Response
    {
        $mainlands = $repository->findAll();
        return $this->render('mainlands/index.html.twig', [
            'mainlands' => $mainlands,
        ]);
    }

    #[Route('/mainland/new', name: 'mainlands_new', methods:['GET','POST'])]
    public function new(Request $request, MainlandsRepository $mainlandsRepository): Response
    {
        $mainlands = new Mainlands();
        $form =  $this->createForm(MainlandsType::class, $mainlands);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $mainlandsRepository->save($mainlands, true);
            return $this->redirectToRoute('mainlands_index');
        }
        return $this->render('animals/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
