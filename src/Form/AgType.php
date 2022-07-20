<?php

namespace App\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nextAg', DateType::class, [ 
                'label' => "Prochaine Assemblée Générale",
                'input' => "datetime_immutable",
                //'years' => range(date('Y'), 1900),
                'widget' => "single_text",   
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //'data_class' => Member::class,
             'attr' => [
                'novalidate' => "novalidate",
            ]
        ]);
    }
}
