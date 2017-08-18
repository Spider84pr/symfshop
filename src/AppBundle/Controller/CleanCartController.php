<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

class CleanCartController extends Controller
{
	/**
    * @Route("/cleancart", name="clean")
    */
    public function showAction(Request $request)
    {
    	$em = $this->get('doctrine')->getManager();
		$this->getUser()->resetCart();
		$em->persist($this->getUser());
       	$em->flush();
	    $this->addFlash('notice','Корзина очищена!');
		return $this->redirectToRoute('cart');
}
}

