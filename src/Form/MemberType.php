<?php

namespace App\Form;

use App\Entity\Member;

use Symfony\Component\Form\AbstractType;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => "Nom"
            ])
            ->add('maidenName', TextType::class, [
                'label' => "Nom de jeune fille"
            ])
            ->add('firstname', TextType::class, [
                'label' => "Prénom"
            ])
            ->add('picture', TextType::class, [//TODO modifier le label en fonction de ce qui sera dit
                'label' => "Image" 
            ])
            //* Expected argument of type "DateTimeImmutable", "null" given at property path "dateOfBirth".
            //->add('dateOfBirth', DateTimeType::class, [ 
            //    'label' => "Date de Naissance",
            //    'widget' => 'single_text',
            //    //'format' => 'dd-MM-yyyy',
            //    
            //])
            //->add('placeOfBirth')
            //->add('address')
            //->add('zipcode')
            //->add('city')
            //->add('firstEmail')
            //->add('secondEmail')
            //->add('Sponsor')
            //->add('job')
            //->add('pouvoirAg')
            //->add('donation')
            //->add('totalPayed')
            //->add('firstRegisteration')
            //->add('fftNumber')
            //->add('fftaNumber')
            //->add('fftpmNumber')
            //->add('lastKnownSeason')
            //->add('attestation')
            //->add('secondClub')
            //->add('status')
            //->add('note')
            //->add('title')
            //->add('isRegistered')
            //->add('firstPhone')
            //->add('secondPhone')
            //->add('mobilePhone')
            //->add('peculiarities')
            //->add('ratesFFT')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
             'attr' => [
                'novalidate' => "novalidate",
            ]
        ]);
    }
}
