<?php

namespace App\Command;

use App\Entity\Member;
use DateTimeImmutable;
//use Symfony\Component\Console\Input\InputArgument;
use App\Repository\MemberRepository;
//use Symfony\Component\Console\Input\InputOption;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class CreateMembersFromCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;
    
    private string $dataDirectory;

    private SymfonyStyle $io;

    private MemberRepository $memberRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        string $dataDirectory,
        MemberRepository $memberRepository
    )
    {
        parent::__construct();
        $this->dataDirectory = $dataDirectory;
        $this->entityManager = $entityManager;
        $this->memberRepository = $memberRepository;
    }
    
    protected static $defaultName = 'app:create-members-from-file';
    protected static $defaultDescription = 'Import members\'s data from CSV file';

    protected function configure(): void
    {
        $this
            //->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            //->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }
    
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->createMembers();

        return Command::SUCCESS;
    }

    private function getDataFromFile():array
    {
        $file = $this->dataDirectory . 'bdd-tnv.csv';

        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $normalizers = [new ObjectNormalizer()];

        $encoders = [
            new CsvEncoder(),
            new XmlEncoder(),
            new YamlEncoder()
        ];
        
        $serializer = new Serializer($normalizers,$encoders);

        /** @var string $fileString */
        $fileString = file_get_contents($file);

        $data = $serializer->decode($fileString, $fileExtension);

        if (array_key_exists('results', $data)) {
            
            return $data['results'];
        }

        return $data;
    }

    private function createMembers(): void
    {
        $this->io->section('CREATION DES MEMBRES A PARTIR DU FICHER');

        $membersCreated = 0;

        foreach ($this->getDataFromFile() as $row) {
            //we check if member already exists in database
            $member = $this->memberRepository->findOneBy([
                'fftNumber' => $row['fftNumber']
            ]);

            //if member is not in database we persist it
            if (!$member) {
                $member = new Member();

                $date = new DateTimeImmutable();
                //we set $dateOfBirth as an instance of datetimeImmutable
                $stringDateOfBirth = $row['dateOfBirth'];

                $birthPieces = explode("/", $stringDateOfBirth);
                $dateOfBirth = $date->setDate($birthPieces[2], $birthPieces[1], $birthPieces[0]);

                //we set $firstRegisteration as an instance of datetimeImmutable
                $stringFirstRegisteration = $row['firstRegisteration'];

                $firstRegisterationPieces = explode("/", $stringFirstRegisteration);
                $firstRegisteration = $date->setDate($firstRegisterationPieces[2], $firstRegisterationPieces[1], $firstRegisterationPieces[0]);

                $member->setTitle($row['title'])
                    ->setFirstname($row['firstname'])
                    ->setLastname($row['lastname'])
                    ->setDateOfBirth($dateOfBirth)
                    ->setPlaceOfBirth($row['placeOfBirth'])
                    ->setAddress($row['address'])
                    ->setZipcode($row['zipcode'])
                    ->setCity($row['city'])
                    ->setFirstPhone($row['firstPhone'])
                    ->setMobilePhone($row['mobilePhone'])
                    ->setFirstEmail($row['firstEmail'])
                    ->setSponsor($row['sponsor'])
                    ->setIsRegistered($row['isRegistered'])
                    ->setTotalPayed($row['totalPayed'])
                    ->setDonation($row['donation'])
                    ->setSecondClub($row['2EMECLUB'])
                    ->setFirstRegisteration($firstRegisteration)
                    ->setFftNumber($row['fftNumber'])
                    ->setStatus(2);
                    
                
                $this->entityManager->persist($member);

                $membersCreated++;
            }
        }
        //we save the created members in the database
        $this->entityManager->flush();

        //we display the number of members created
        if ($membersCreated > 1){
            $string = "{$membersCreated} MEMBRES ONT ETE AJOUTES EN BASE DE DONNEES.";
        } elseif ($membersCreated === 1) {
            $string = '1 MEMBRE A ETE AJOUTE EN BASE DE DONNEES.';
        }else{
            $string='AUCUN MEMBRE N\'A ETE AJOUTE EN BASE DE DONNEES.';
        }

        $this->io->success($string);
    }
}
