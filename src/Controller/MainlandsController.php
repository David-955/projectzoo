<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainlandsController extends AbstractController
{
    #[Route('/mainlands', name: 'app_mainlands')]
    public function index(): Response
    {
        return $this->render('mainlands/index.html.twig', [
            'controller_name' => 'MainlandsController',
        ]);
    }
}
