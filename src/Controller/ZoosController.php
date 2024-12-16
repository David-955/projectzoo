<?php

namespace App\Controller;

use App\Entity\Zoos;
use App\Form\ZoosType;
use App\Repository\ZoosRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ZoosController extends AbstractController
{
    #[Route('/zoos', name: 'zoos_index')]
    public function index(ZoosRepository $repository): Response
    {
        $zoos = $repository->findAll();
        return $this->render('zoos/index.html.twig', [
            '$zoos' => $zoos,
        ]);
    }

    #[Route('/new', name: 'zoos_new', methods:['GET','POST'])]
    public function new(Request $request, ZoosRepository $zoosRepository): Response
    {
        $zoos = new Zoos();
        $form =  $this->createForm(ZoosType::class, $zoos);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $zoosRepository->save($zoos, true);
            return $this->redirectToRoute('zoos_index');
        }
        return $this->render('zoos/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
