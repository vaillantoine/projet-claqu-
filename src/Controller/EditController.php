<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/edit/new", name="app_edit_new")
     */
    public function index(): Response
    {
        return $this->render('edit/index.html.twig', [
            'controller_name' => 'EditController',
        ]);
    }

    /**
     * @Route("/edit/{id}", name="app_edit")
     */
    public function edit(int $id): Response
    {
        return $this->render('edit/index.html.twig');
    }
}
