<?php

namespace App\Form;

use App\Entity\Member;
use App\Entity\RateFFT;
use App\Entity\RateFFTA;
use App\Entity\Peculiarity;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', ChoiceType::class, [
                'label' => "Titre",
                'choices' => [
                    'Monsieur' => 1,
                    'Madame' => 2,
                ],
                'expanded' => true,
            ])
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
            ->add('dateOfBirth', DateType::class, [ 
                'label' => "Date de Naissance",
                'input' => "datetime_immutable",
                'years' => range(date('Y'), 1900),
                'widget' => "single_text",   
            ])
            ->add('placeOfBirth', TextType::class, [
                'label' => "Lieu de Naissance"
            ])
            ->add('address', TextType::class, [
                'label' => "Adresse"
            ])
            ->add('zipcode', TextType::class, [
                'label' => "Code Postal"
            ])
            ->add('city', TextType::class, [
                'label' => "Ville"
            ])
            ->add('firstPhone', TextType::class, [
                'label' => "Téléphone n°1"
            ])
            ->add('secondPhone', TextType::class, [
                'label' => "Téléphone n°2"
            ])
            ->add('mobilePhone', TextType::class, [
                'label' => "Mobile"
            ])
            ->add('firstEmail', EmailType::class,[
                'label' => "Email n°1"
            ])
            ->add('secondEmail', EmailType::class, [
                'label' => "Email n°2"
            ])
            ->add('Sponsor', TextType::class, [
                'label' => "Parrain"
            ])
            ->add('job', TextType::class, [
                'label' => "Emploi"
            ])
            ->add('firstRegisteration', DateType::class, [ 
                'label' => "Première Inscription",
                'input' => "datetime_immutable",
                'years' => range(date('Y'), 1900),
                'widget' => "single_text"  
            ])
            ->add('lastKnownSeason', TextType::class, [ //TODO add default value if member already exist
                'label' => "Dernière saison tirée",
                'help' => "Au format YYYY/YYYY"
            ])
            ->add('fftNumber', TextType::class, [
                'label' => "Licence FFT"
            ])
            ->add('fftaNumber', TextType::class, [
                'label' => "Licence FFTA"
            ])
            ->add('secondClub', ChoiceType::class, [
                'label' => "Club",
                'choices' => [
                    '1er' => 1,
                    '2ème' => 2,
                    'Autre' => 0
                ],
                'expanded' => true,
            ])
            ->add('ratesFFT', EntityType::class, [
                'class' => RateFFT::class,
                'label' => "Tarif FFT",
                'choice_label' => 'label',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.code', 'ASC');
                },
            ])
            ->add('ratesFFTA', EntityType::class, [
                'class' => RateFFTA::class,
                'label' => "Tarif FFTA",
                'choice_label' => 'label',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.code', 'ASC');
                },
            ])
            ->add('donation', NumberType::class,[
                'label' => "Don",
            ])
            ->add('totalPayed', NumberType::class, [//TODO add default value = (sum of rates)+ donnation
                'label' => "Total payé",

            ])
            ->add('isRegistered', ChoiceType::class, [
                'label' => "A payé",
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'expanded' => true
            ])
            ->add('status', ChoiceType::class, [
                'label' => "Status",
                'choices' => [
                    'Actif' => 1,
                    'Inactif' => 2,
                    'Décédé' => 3
                ],
                'expanded' => true,
            ])
            ->add('peculiarities', EntityType::class, [
                'class' => Peculiarity::class,
                'label' => "Particularités",
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->orderBy('p.name', 'ASC');
                }
            ])
            ->add('note', TextareaType::class, [
                'label' => "Notes"
            ])
            ->add('attestation', ChoiceType::class, [
                'label' => "Besoin d'une attestation",
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true,
            ])
            ->add('pouvoirAg', ChoiceType::class, [
                'label' => "Pouvoir reçu",
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true,
            ])
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
