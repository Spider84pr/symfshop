<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Storage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use AppBundle\Form\Filter;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;

class ListController extends Controller
{
	/**
    * @Route("/", name="welcome")
    */
    public function showAction(Request $request)
    {
		$em = $this->get('doctrine')->getManager();
		$repository = $em->getRepository('AppBundle:Product');
		$prod = $repository->findAll();
		//var_dump($prod);
		$arr=array();
		$price=array();
		$amount=array();
		
		foreach ($prod as $value) {
 			//   var_dump($value->getId());
			$arr[$value->getId()]['id']=$value->getId();
			$arr[$value->getId()]['name']=$value->getName();
			$arr[$value->getId()]['amount']=floor($value->getMaterial()->getAmount()/$value->getAmount());
			$arr[$value->getId()]['price']=$value->getPrice();
			$amount[]=floor($value->getMaterial()->getAmount()/$value->getAmount());
			$price[]=$value->getPrice();
		}
     $filter = $this->createForm(Filter::class, array('amountfrom' => 0, 'pricefrom' => 0, 'priceto'=> max($price), 'amountto'=> max($amount)));
	 $filter->handleRequest($request);
	 
   if ($filter->isSubmitted() && $filter->isValid()) {
       $dt=$filter->getData();
	   $cat=array();
	   foreach ($dt['cat'] as $key => $value) {
		   $cat[]=$value->getId();
	   }
	    $cat=implode('_',$cat);
		if(count($dt['cat'])==0)
		{
			$cat=0;
		}

		$a=$this->generateUrl(
            'filter',
            array('cat' => $cat,'amfrom' => $dt['amountfrom'],'amto' => $dt['amountto'], 'pfrom' => $dt['pricefrom'], 'pto' => $dt['priceto'])
        );
		return $this->redirect($a);
   }
	 $sum=0;
	$cartamount=0;
	$securityContext = $this->container->get('security.authorization_checker');
	if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		if ($this->getUser()->getRole()=="ROLE_ADMIN") {
			$repository = $em->getRepository('AppBundle:Storage');
			$stor = $repository->findAll();
			$starr=array();
			foreach ($stor as $value) {
				$starr[$value->getId()]['id']=$value->getId();
				$starr[$value->getId()]['name']=$value->getName();
				$starr[$value->getId()]['amount']=$value->getAmount();
			}
		}
		$cartamount=$this->getUser()->getAmount();
		foreach ($this->getUser()->getCart() as $key => $value) {
				$sum+=$em->getRepository('AppBundle:Product')->find($key)->getPrice()*$value;
		//	$sum+=
		}
		$cartamount=$this->getUser()->getAmount();
		}
  return $this->render('default/index.html.twig', array('prod' => $arr,'cartamount' => $cartamount, 'cartsum' =>  $sum, 'starr' =>  $starr, 'filter' => $filter->createView()));
    }

	/**
    * @Route("/filter/{cat}/{amfrom}/{amto}/{pfrom}/{pto}", name="filter")
    */
    public function filterAction(Request $request, $cat, $amfrom, $amto, $pfrom, $pto)
    {
    	
		$em = $this->get('doctrine')->getManager();
		$repository = $em->getRepository('AppBundle:Product');
		$queryBuilder = $repository->createQueryBuilder('product');
		$queryBuilder->andWhere("product.price > (:pfrom)");
		$queryBuilder->setParameter("pfrom", $pfrom);
		$queryBuilder->andWhere("product.price < (:pto)");
		$queryBuilder->setParameter("pto", $pto); 
        if($cat!=0)
		{
        	$categ=explode('_',$cat);
	        $queryBuilder->andWhere("product.category in (:categories)");
	        $queryBuilder->setParameter("categories", $categ);
		}
		$prod=$queryBuilder->getQuery();
		$p=$prod->getResult();
		$arr=array();
		$price=array();
		$amount=array();
		$mprice=0;
		$mamount=0;
		$tamount=0;
		foreach ($p as $value) {
			$tamount=floor($value->getMaterial()->getAmount()/$value->getAmount());
			if (($amfrom <= $tamount)&&($amto >= $tamount))
			{
				
				$arr[$value->getId()]['id']=$value->getId();
				$arr[$value->getId()]['name']=$value->getName();
				$arr[$value->getId()]['amount']=$tamount;
				$arr[$value->getId()]['price']=$value->getPrice();
				$amount[]=$tamount;
				$price[]=$value->getPrice();
			}
		}
		if (count($prod)>0)
		{
			$mprice=max($price);
			$mamount=max($amount);
		}
		else
		{
			$mprice=0;
			$mamount=0;
		}
		$filter = $this->createForm(Filter::class, array('amountfrom' => 0, 'pricefrom' => 0, 'priceto'=> intval($mprice), 'amountto'=> intval($mamount)));
	 $filter->handleRequest($request);
	 
   if ($filter->isSubmitted() && $filter->isValid()) {
       $dt=$filter->getData();
	   $cat=array();
	   foreach ($dt['cat'] as $key => $value) {
		   $cat[]=$value->getId();
	   }
	    $cat=implode('_',$cat);
		if(count($dt['cat'])==0)
		{
			$cat=0;
		}

		$a=$this->generateUrl(
            'filter',
            array('cat' => $cat,'amfrom' => $dt['amountfrom'],'amto' => $dt['amountto'], 'pfrom' => $dt['pricefrom'], 'pto' => $dt['priceto'])
        );
		return $this->redirect($a);
	
   }
	$cartamount=0;
	$securityContext = $this->container->get('security.authorization_checker');
	if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		$cartamount=$this->getUser()->getAmount();
		foreach ($this->getUser()->getCart() as $key => $value) {
				$sum+=$em->getRepository('AppBundle:Product')->find($key)->getPrice()*$value;
		//	$sum+=
		}
		$cartamount=$this->getUser()->getAmount();
		}

  return $this->render('default/index.html.twig', array('prod' => $arr,'cartamount' => $cartamount, 'cartsum' =>  $sum, 'filter' => $filter->createView()));
    }

}

