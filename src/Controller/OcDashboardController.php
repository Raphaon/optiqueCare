<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OcDashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="app_oc_dashboard")
     */
    public function index(): Response
    {
        return $this->render('oc_dashboard/index.html.twig', [
            'controller_name' => 'OcDashboardController',
        ]);
    }
}
