<?php

namespace App\Controller;

use App\Entity\Expense;
use App\Repository\ExpenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashBoardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="app_dash_board")
     */
    public function index(ExpenseRepository $expenseRepository): Response
    {
        $id_author = 31;
        $expenses = $expenseRepository->findBy(['author' => $id_author]);

        return $this->render('dash_board/index.html.twig', [
            'controller_name' => 'DashBoardController',
            'expenses' => $expenses,
        ]);
    }

    /**
     * @Route("/", name="default")
     */
    public function default(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->redirectToRoute("app_dash_board");
    }

    /**
     * @Route ("/view/{id}", name="app_view")
     */
    public function view(int $id, ExpenseRepository $expenseRepository): Response
    {
        $expense = $expenseRepository->find($id);

        return $this->render('dash_board/view.html.twig', [
            'controller_name' => 'DashBoardController',
            'expense' => $expense,
        ]);
    }
}
