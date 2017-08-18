<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Form\StorageAdd;

class StorageController extends Controller
{
	/**
    * @Route("/storage", name="storage")
    */
    public function newAction(Request $request)
    {
    
     $form = $this->createForm(StorageAdd::class);

$form->handleRequest($request);

   if ($form->isSubmitted() && $form->isValid()) {
        $dt = $form->getData();
		$mat = $this->getDoctrine()->getRepository('AppBundle:Storage')->find($dt['material']->getId());
		$mat->setAmount($mat->getAmount()+$dt['amount']);
		$em = $this->get('doctrine')->getManager();
        $em->persist($mat);
        $em->flush();
    }

        return $this->render('storage/storageadd.html.twig',  array(
        'form' => $form->createView(),
    ));
    }
}