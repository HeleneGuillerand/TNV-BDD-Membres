<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('picture')
            ->add('dateOfBirth')
            ->add('placeOfBirth')
            ->add('address')
            ->add('city')
            ->add('firstEmail')
            ->add('secondEmail')
            ->add('Sponsor')
            ->add('job')
            ->add('pouvoirAg')
            ->add('donation')
            ->add('totalPayed')
            ->add('updatedAt')
            ->add('firstRegisteration')
            ->add('fftNumber')
            ->add('fftaNumber')
            ->add('fftpmNumber')
            ->add('lastKnownSeason')
            ->add('attestation')
            ->add('secondClub')
            ->add('status')
            ->add('note')
            ->add('title')
            ->add('isRegistered')
            ->add('firstPhone')
            ->add('secondPhone')
            ->add('mobilePhone')
            ->add('zipcode')
            ->add('peculiarities')
            ->add('ratesFFT')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
