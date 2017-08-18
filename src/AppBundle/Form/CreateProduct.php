<?php
// src/AppBundle/Form/CreateProduct.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CreateProduct extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name', TextType::class, array('label' => 'Наименование'))->add('cat',EntityType::class, array(
        'label' => 'Категория',
    'class' => 'AppBundle:Category',
    'choice_label' => 'text',
))->add('material',EntityType::class, array(
        'label' => 'Материал',
    'class' => 'AppBundle:Storage',
    'choice_label' => 'name',
))->add('amount', IntegerType::class, array('label' => 'Количество'))->add('price', NumberType::class, array('label' => 'Цена'))->add('Сохранить', SubmitType::class);
       
        ;
    }
}