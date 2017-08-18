<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Form\StorageNew;

class StorageNewController extends Controller
{
	/**
    * @Route("/storagenew", name="storagenew")
    */
    public function newAction(Request $request)
    {
    
     $form = $this->createForm(StorageNew::class);
$form->handleRequest($request);

   if ($form->isSubmitted() && $form->isValid()) {
        $dt = $form->getData();
	   
		$mat = new Storage();
		$mat->setName($dt['material']);
				
		$mat->setAmount($dt['amount']);
		$em = $this->get('doctrine')->getManager();
        $em->persist($mat);
        $em->flush();
    }

        return $this->render('storage/storageadd.html.twig',  array(
        'form' => $form->createView(),
    ));
    }
}