<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Symfony\Component\Form;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\CartAmount;

class CartController extends Controller
{
	/**
    * @Route("/cart", name="cart")
    */
    public function showAction(Request $request)
    {
    	$arr = array();
    	$em = $this->get('doctrine')->getManager();
		$repository = $em->getRepository('AppBundle:Product');
		$sum=0;
     $form = $this->createForm(CartAmount::class);

$form->handleRequest($request);

   if ($form->isSubmitted() && $form->isValid()) {
   	   $dt=$form->getData();
	   $prod = $this->getDoctrine()->getRepository('AppBundle:Product')->find($dt['id']);
	   $mat = $this->getDoctrine()->getRepository('AppBundle:Storage')->find($prod->getMaterial()->getId());
	  
	   $arr=$this->getUser()->getCart();
	   $am=$arr[$id]*$prod->getAmount();
	   
	   $needam=$prod->getAmount()*$dt['amount'];
	   if($needam<=($mat->getAmount()+$am))
	   {
	   	$mat->setAmount($mat->getAmount()+$am-$needam);
		$this->getUser()->setToCart($dt['id'], $dt['amount']);
		$em->persist($mat);
        $em->flush();
		$em->persist($this->getUser());
        $em->flush();	
		return $this->redirect('/cart');
	   }
	   else {
		   $this->addFlash('notice','Не хватает материала! Заходите завтра.....');
		return $this->redirectToRoute('cart');
	   }
   }
		foreach ($this->getUser()->getCart() as $key => $value) {
			$prod = $repository->find($key);
		    $arr[$prod->getId()]['id']=$prod->getId();
			$arr[$prod->getId()]['name']=$prod->getName();
			$arr[$prod->getId()]['price']=$em->getRepository('AppBundle:Product')->find($key)->getPrice()*$value;
			$sum+=$em->getRepository('AppBundle:Product')->find($key)->getPrice()*$value;
			$arr[$prod->getId()]['form']= $this->createForm(CartAmount::class, array('amount' => $value, 'id' => $prod->getId()))->createView();
		}
		 
		  return $this->render('cart/cart.html.twig', array('prod' => $arr,'cartamount' => $this->getUser()->getAmount(), 'cartsum' =>  $sum));
	}
    	
    	
}