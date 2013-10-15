<?php

namespace Front\ExpenseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Front\ExpenseBundle\Entity\Expense;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/expenses/hello")
     * @Template()
     */
    public function indexAction($name)
    {
        return $this->render('ExpenseBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * @Route("/expenses/new")
     * @Template()
     */
    public function createAction()
    {
        $expense = new Expense();
        $expense->setAmount(100);
        $expense->setDescription("1ere dépense");
        $em = $this->getDoctrine()->getManager();
        $em->persist($expense);
        $em->flush();

        return new Response('Id du produit créé : '.$expense->getId());
    }
}
