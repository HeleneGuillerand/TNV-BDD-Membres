<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Box;
use App\Entity\Member;
use DateTimeImmutable;
use App\Entity\RateFFT;
use App\Entity\RateFFTA;
use App\Entity\Peculiarity;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\RatesFFTProvider;
use App\DataFixtures\Provider\RatesFFTAProvider;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');
        
        //*Rates FFT
        // on récupère le tableau de tarifs
        $ratesFFTProvider = new RatesFFTProvider();
        $ratesFFT = $ratesFFTProvider->getRates();
        // on créé les différents tarifs on les insert en BDD et dans un tableau d'objets rates
        $ratesFFTList = [];

        foreach($ratesFFT as $rateFFT){
            //on créé un nouvel objet
            $newRateFFT = new RateFFT();
            //on le remplit
            $newRateFFT->setCode($rateFFT['code']);
            $newRateFFT->setLabel($rateFFT['label']);
            $newRateFFT->setEntryFee($rateFFT['entryFee']);
            $newRateFFT->setCotisation($rateFFT['cotisation']);
            $newRateFFT->setLicence($rateFFT['licence']);
            $newRateFFT->setAmount($rateFFT['amount']);
            //on l'ajoute à la liste
            $ratesFFTList[] = $newRateFFT;
            //on l'ajoute en BDD
            $manager->persist($newRateFFT);
        }

        //*Rates FFTA
        // on récupère le tableau de tarifs
        $ratesFFTAProvider = new RatesFFTAProvider();
        $ratesFFTA = $ratesFFTAProvider->getRates();
        // on créé les différents tarifs on les insert en BDD et dans un tableau d'objets rates
        $ratesFFTAList = [];

        foreach($ratesFFTA as $rateFFTA){
            //on créé un nouvel objet
            $newRateFFTA = new RateFFTA();
            //on le remplit
            $newRateFFTA->setCode($rateFFTA['code']);
            $newRateFFTA->setLabel($rateFFTA['label']);
            $newRateFFTA->setEntryFee($rateFFTA['entryFee']);
            $newRateFFTA->setCotisation($rateFFTA['cotisation']);
            $newRateFFTA->setLicence($rateFFTA['licence']);
            $newRateFFTA->setAmount($rateFFTA['amount']);
            //on l'ajoute à la liste
            $ratesFFTAList[] = $newRateFFTA;
            //on l'ajoute en BDD
            $manager->persist($newRateFFTA);
        }

        //*Peculiarities
        $peculiarities = ['Finiada', 'CE Renault', 'Handicap', 'Ecole de tir', 'Initiation Adulte'];
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
        ////on créé 300 membres
        //for($j = 1; $j <= 600; $j++){
        //    //on créé un nouvel objet
        //    $member = new Member();
        //    //on le remplit
        //    $member->setTitle(mt_rand(1,2));
        //    $member->setLastname($faker->lastName());
        //    $member->setFirstname($faker->firstName());
        //    //if the member is female, she has 1/3 chances of beeing married/having a maiden name
        //    if($member->getTitle()==2){
        //        $num = mt_rand(1,3);
        //        if($num == 1){
        //            $member->setMaidenName($faker->lastName());
        //        }
        //    }
        //    $member->setPicture('https://picsum.photos/id/'. $faker->numberBetween(1, 100).'/150/200');
        //    $member->setDateOfBirth(new DateTimeImmutable('-' . mt_rand(8, 70) . ' years'));
        //    $member->setPlaceOfBirth($faker->city());
        //    $member->setAddress($faker->departmentName());
        //    $member->setZipcode($faker->numberBetween(10000, 99999));
        //    $member->setCity($faker->city());
        //    $member->setFirstPhone($faker->numberBetween(1000000000, 9999999999));
        //    $member->setMobilePhone($faker->numberBetween(1000000000, 9999999999));
        //    $member->setFirstEmail($faker->email());
        //    $member->setSponsor($faker->name());
        //    $member->setPouvoirAg($faker->boolean());
        //    $member->setAttestation($faker->boolean());
        //    $member->setIsRegistered($faker->boolean());
        //    $member->setSecondClub($faker->numberBetween(1,2));
        //    $member->setFirstRegisteration(new DateTimeImmutable('-' . mt_rand(0, 60) . ' years'));
        //    $member->setFftNumber($faker->numberBetween(10000000, 99999999));
        //    $member->setStatus($faker->numberBetween(1,3));
        //    //on défini un tarif en fonction de l'age 
        //    $SeniorLimit = new DateTimeImmutable('-' . 25 . ' years');
        //    if($member->getDateOfBirth()> $SeniorLimit){
        //        $member->addRatesFFT($ratesFFTList[mt_rand(8,17)]);
        //    } else {
        //        $member->addRatesFFT($ratesFFTList[mt_rand(0,7)]);
        //    };
        //    //on l'ajoute en BDD
        //    $manager->persist($member);
        //}

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
