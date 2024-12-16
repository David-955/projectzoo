<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ZoosController extends AbstractController
{
    #[Route('/zoos', name: 'app_zoos')]
    public function index(): Response
    {
        return $this->render('zoos/index.html.twig', [
            'controller_name' => 'ZoosController',
        ]);
    }
}
