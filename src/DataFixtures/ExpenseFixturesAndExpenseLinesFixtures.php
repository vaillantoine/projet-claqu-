<?php

namespace App\DataFixtures;

use App\Entity\Expense;
use App\Entity\ExpenseLine;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ExpenseFixturesAndExpenseLinesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users = $manager->getRepository(User::class)->findAll();

        foreach ($users as $user) {
            for ($i = 1; $i <= 2; $i++) {
                $expense = new Expense();
                $expense->setAuthor($user)
                    ->setTitle("Title$i")
                    ->setComment("C'est pour acheter $i que je fais une note de frais")
                    ->setCreatedOn(new \DateTime())
                    ->setTotal(0)
                    ->setYear(2100+$i);

                for ($i = 1; $i <= 3; $i++) {
                    $expenseline = new ExpenseLine();
                    $expenseline->setNature("nature$i")
                        ->setDescription("nature $i")
                        ->setInvoiceDate(new \DateTime())
                        ->setAmount($i / 10)
                        ->setInvoiceFile("fichier$i")
                        ->setExpense($expense);

                    $manager->persist($expenseline);
            }

                $manager->persist($expense);
            }
    }

        $manager->flush();
    }
}
