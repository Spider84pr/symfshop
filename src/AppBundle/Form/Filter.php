<?php
// src/AppBundle/Form/Filter.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Filter extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('cat',EntityType::class, array(
        'label' => 'Категория',
    'class' => 'AppBundle:Category',
    'choice_label' => 'text',
    'multiple'  => 'true',
    'expanded'  => 'true',
))->add('amountfrom', IntegerType::class, array('label' => 'Количество от '))->add('amountto', IntegerType::class, array('label' => 'до '))->add('pricefrom', NumberType::class, array('label' => 'Цена от '))->add('priceto', NumberType::class, array('label' => 'до '))->add('Фильтровать', SubmitType::class);
       
        ;
    }
}