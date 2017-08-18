<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Form\CreateProduct;

class CreateProductController extends Controller
{
	/** 
    * @Route("/createproduct", name="createproduct")
    */
    public function newAction(Request $request)
    {
    
     $form = $this->createForm(CreateProduct::class);
$form->handleRequest($request);

   if ($form->isSubmitted() && $form->isValid()) {
        $dt = $form->getData();
	   
	   
	   $product = new Product();
        $product->setName($dt['name']);
        $product->setAmount($dt['amount']);
    	$product->setPrice($dt['price']);
		$mat = $this->getDoctrine()->getRepository('AppBundle:Storage')->find($dt['material']->getId());
		$product->setMaterial($mat);
		$cat = $this->getDoctrine()->getRepository('AppBundle:Category')->find($dt['cat']->getId());
		$product->setCategory($cat);
		$em = $this->get('doctrine')->getManager();
        $em->persist($product);
        $em->flush();
		$this->addFlash('notice','Новый товар создан');
         return $this->redirectToRoute('welcome');
    }

        return $this->render('product/create.html.twig',  array(
        'form' => $form->createView(),
    ));
    }
}