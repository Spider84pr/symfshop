<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class BuyProductController extends Controller
{
   /**
     * @Route("/buyproduct/{id}", name="buyproduct")
     */
    public function newAction($id)
    {
    	$em = $this->get('doctrine')->getManager();
        $prod = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
		$mat = $this->getDoctrine()->getRepository('AppBundle:Storage')->find($prod->getMaterial()->getId());
//var_dump($mat-$prod);
		if(($mat->getAmount()-$prod->getAmount())>0)
		{
			$mat->setAmount($mat->getAmount()-$prod->getAmount());
		   	$em->persist($mat);
        	$em->flush();
			$user = $this->getUser();
			$user->addToCart($id);
			$em->persist($user);
        	$em->flush();
		    $this->addFlash('notice','Товар добавлен в корзину!');
		}
		else
		{
			$this->addFlash('notice','Не хватает материала! Заходите завтра.....');

		}
		
		/*if()
		$mat->setAmount($mat->getAmount()+$dt['amount']);
		$em = $this->get('doctrine')->getManager();
        $em->persist($mat);
        $em->flush();-*/
         return $this->redirectToRoute('welcome');
    }
}