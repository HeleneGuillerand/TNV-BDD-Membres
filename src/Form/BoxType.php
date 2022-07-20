<?php

namespace App\Form;

use App\Entity\Box;
use App\Entity\Member;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class BoxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', NumberType::class, [
                'label' => "Numéro"
            ])
            ->add('status', ChoiceType::class, [
                'label' => "Disponibilité",
                'choices' => [
                    'Libre' => 1,
                    'Occupé' => 2,
                    'Neutralisé' => 3
                ],
                'expanded' => true,
            ])
            ->add('member', EntityType::class, [
                'class' => Member::class,
                'label' => "N° de licence FFT du membre ",
                'placeholder' => '',
                'choice_label' => "fftNumber",
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.fftNumber', 'ASC');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Box::class,
            'attr' => [
                'novalidate' => "novalidate",
            ]
        ]);
    }
}
