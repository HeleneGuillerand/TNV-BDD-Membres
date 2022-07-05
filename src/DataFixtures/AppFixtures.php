<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Box;
use App\Entity\Member;
use DateTimeImmutable;
use App\Entity\RateFFT;
use App\Entity\Peculiarity;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\RatesProvider;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');
        
        //*Rates FFT
        // on récupère le tableau de tarifs
        $ratesProvider = new RatesProvider();
        $rates = $ratesProvider->getRates();
        // on créé les différents tarifs on les insert en BDD et dans un tableau d'objets rates
        $ratesList = [];

        foreach($rates as $rate){
            //on créé un nouvel objet
            $newRate = new RateFFT();
            //on le remplit
            $newRate->setCode($rate['code']);
            $newRate->setLabel($rate['label']);
            $newRate->setEntryFee($rate['entryFee']);
            $newRate->setCotisation($rate['cotisation']);
            $newRate->setLicence($rate['licence']);
            $newRate->setAmount($rate['amount']);
            //on l'ajoute à la liste
            $ratesList[] = $newRate;
            //on l'ajoute en BDD
            $manager->persist($newRate);
        }

        //*Peculiarities
        $peculiarities = ['Finiada', 'CE Renault', 'Handicape', 'Pokémon'];
        //on créé une liste d'objets peculiarity
        $peculiaritiesList = [];
        //on parcourt le tableau pour créer des objets peculiarity
        foreach($peculiarities as $peculiarity){
            //on créé un nouvel objet
            $newPeculiarity = new Peculiarity();
            //on le remplit
            $newPeculiarity->setName($peculiarity);
            //on l'ajoute à la liste
            $peculiaritiesList[] = $newPeculiarity;
            //on l'ajoute en BDD
            $manager->persist($newPeculiarity);
        }

        //*Boxes
        //on créé une liste d'objets box
        $boxesList = [];
        //on créé 50 boxes
        for($i = 1; $i <= 50; $i ++){
            //on créé un nouvel objet
            $newBox = new Box();
            //on le remplit
            $newBox->setNumber($i);
            $newBox->setStatus(1);
            //on l'ajoute à la liste
            $boxesList[] = $newBox;
            //on l'ajoute en BDD
            $manager->persist($newBox);
        }
        //*Members
        //on créé 300 membres
        for($j = 1; $j <= 600; $j++){
            //on créé un nouvel objet
            $member = new Member();
            //on le remplit
            $member->setTitle(mt_rand(1,2));
            $member->setLastname($faker->lastName());
            $member->setFirstname($faker->firstName());
            $member->setPicture($faker->imageUrl(null, 50, 60, 'Member'));
            $member->setDateOfBirth(new DateTimeImmutable('-' . mt_rand(8, 70) . ' years'));
            $member->setPlaceOfBirth($faker->city());
            $member->setAddress($faker->departmentName());
            $member->setZipcode($faker->numberBetween(10000, 99999));
            $member->setCity($faker->city());
            $member->setFirstPhone($faker->numberBetween(1000000000, 9999999999));
            $member->setMobilePhone($faker->numberBetween(1000000000, 9999999999));
            $member->setFirstEmail($faker->email());
            $member->setSponsor($faker->name());
            $member->setPouvoirAg($faker->boolean());
            $member->setAttestation($faker->boolean());
            $member->setIsRegistered($faker->boolean());
            $member->setFirstRegisteration(new DateTimeImmutable('-' . mt_rand(0, 60) . ' years'));
            $member->setFftNumber($faker->numberBetween(10000000, 99999999));
            $member->setStatus($faker->numberBetween(1,3));
            //on défini un tarif en fonction de l'age 
            $SeniorLimit = new DateTimeImmutable('-' . 25 . ' years');
            if($member->getDateOfBirth()> $SeniorLimit){
                $member->addRatesFFT($ratesList[mt_rand(8,17)]);
            } else {
                $member->addRatesFFT($ratesList[mt_rand(0,7)]);
            };
            //on l'ajoute en BDD
            $manager->persist($member);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
