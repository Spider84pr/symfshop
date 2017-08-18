<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use AppBundle\Entity\Product;
use AppBundle\Form\StorageDecr;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class StorageDecrController extends Controller
{
   /**
     * @Route("/storagedecr/{id}", name="storagedecr")
     */
    public function newAction(Request $request, $id)
    {
    	$form = $this->createForm(StorageDecr::class);
		$form->handleRequest($request);
		$em = $this->get('doctrine')->getManager();
		$mat = $this->getDoctrine()->getRepository('AppBundle:Storage')->find($id);
		if ($form->isSubmitted() && $form->isValid()) {
			$dt = $form->getData();
	//var_dump($mat-$prod);
			if(($mat->getAmount()-$dt['amount'])>=0)
			{
				$mat->setAmount($mat->getAmount()-$dt['amount']);
			   	$em->persist($mat);
	        	$em->flush();
			    $this->addFlash('notice','Материал списан!');
			}
			else
			{
				$this->addFlash('notice','Не хватает материала! Заходите завтра.....');
	
			}
			return $this->redirectToRoute('welcome');
		}
		return $this->render('storage/storagedecr.html.twig', array('form' => $form->createView()));
    }
}