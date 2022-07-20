<?php

namespace App\Form;

use App\Entity\RateFFTA;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RateFFTAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => "Code"
            ])
            ->add('label', TextType::class, [
                'label' => "Description"
            ])
            ->add('entryFee', MoneyType::class, [
                'label' => "Frais d'entrée",
                'currency' => "EUR"  
            ])
            ->add('cotisation', MoneyType::class, [
                'label' => "Cotisation",
                'currency' => "EUR"  
            ])
            ->add('licence', MoneyType::class, [
                'label' => "Licence",
                'currency' => "EUR"  
            ])
            ->add('amount', MoneyType::class, [
                'label' => "Total",
                'currency' => "EUR"  
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RateFFTA::class,
            'attr' => [
                'novalidate' => "novalidate",
            ]
        ]);
    }
}
