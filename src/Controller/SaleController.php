<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaleController extends AbstractController
{
    /**
     * @Route("/vendre-des-articles", name="sale")
     */
    public function index(): Response
    {
        return $this->render('sale/index.html.twig');
    }
}
