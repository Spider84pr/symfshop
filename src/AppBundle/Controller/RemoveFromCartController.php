<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class RemoveFromCartController extends Controller
{
   /**
     * @Route("/removefromcart/{id}", name="removefromcart")
     */
    public function newAction($id)
    {
    	    	$em = $this->get('doctrine')->getManager();
		$this->getUser()->removeFromCart($id);
		
		$em->persist($this->getUser());
       	$em->flush();
	    $this->addFlash('notice','Товар Удален из корзины!');
		return $this->redirectToRoute('cart');
    	
	}
	
}
    	