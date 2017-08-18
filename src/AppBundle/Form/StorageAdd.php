<?php
// src/AppBundle/Form/StorageAdd.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StorageAdd extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('material',EntityType::class, array(
        'label' => 'Материал',
    'class' => 'AppBundle:Storage',
    'choice_label' => 'name',
))->add('amount', IntegerType::class, array('label' => 'Количество'))->add('Сохранить', SubmitType::class);
        ;
    }
}