<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontEndTestController extends AbstractController
{
    #[Route('/front/end/test', name: 'front_end_test')]
    public function index(): Response
    {
        return $this->render('front_end_test/index.html.twig', [
            'controller_name' => 'FrontEndTestController',
        ]);
    }
}
