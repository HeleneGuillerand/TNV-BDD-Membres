<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 * @UniqueEntity("fftNumber",
 * message="Le numéro de licence FFT est déjà utilisé")
 * @UniqueEntity("fftaNumber",
 * message="Le numéro de licence FFTA est déjà utilisé")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Le nom de famille doit faire au minimum {{ limit }} caractères")
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Le prénom doit faire au minimum {{ limit }} caractères")
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $address;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $city;


    /**
     * @ORM\Column(type="string", length=400)
     * @Assert\Email
     * @Assert\NotBlank
     */
    private $firstEmail;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     * @Assert\Email
     */
    private $secondEmail;

    /**
     * @ORM\Column(type="string", length=400)
     * @Assert\NotBlank
     */
    private $Sponsor;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pouvoirAg;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $donation;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $totalPayed;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank
     */
    private $firstRegisteration;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "Le numéro de licence doit faire {{ limit }} caractères",
     *      maxMessage = "Le numéro de licence doit faire {{ limit }} caractères"
     * )
     */
    private $fftNumber;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     * @Assert\Length(
     *      min = 7,
     *      max = 7,
     *      minMessage = "Le numéro de licence doit faire {{ limit }} caractères",
     *      maxMessage = "Le numéro de licence doit faire {{ limit }} caractères"
     * )
     */
    private $fftaNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fftpmNumber;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $lastKnownSeason;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $attestation;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $secondClub;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     * @Assert\Length(
     *      max = 500,
     *      maxMessage = "Le champ note ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity=Box::class, mappedBy="member")
     */
    private $boxes;

    /**
     * @ORM\ManyToMany(targetEntity=Peculiarity::class, inversedBy="members")
     */
    private $peculiarities;

    /**
     * @ORM\ManyToMany(targetEntity=RateFFT::class, inversedBy="members")
     */
    private $ratesFFT;

    /**
     * @ORM\ManyToMany(targetEntity=RateFFTA::class, inversedBy="members")
     */
    private $ratesFFTA;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     * 
     */
    private $isRegistered;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $firstPhone;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $secondPhone;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $mobilePhone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maidenName;

   



    public function __construct()
    {
        $this->boxes = new ArrayCollection();
        $this->peculiarities = new ArrayCollection();
        $this->ratesFFT = new ArrayCollection();
        $this->ratesFFTA = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeImmutable $dateOfBirth = null): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }


    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }



    public function getFirstEmail(): ?string
    {
        return $this->firstEmail;
    }

    public function setFirstEmail(string $firstEmail): self
    {
        $this->firstEmail = $firstEmail;

        return $this;
    }

    public function getSecondEmail(): ?string
    {
        return $this->secondEmail;
    }

    public function setSecondEmail(?string $secondEmail): self
    {
        $this->secondEmail = $secondEmail;

        return $this;
    }

    public function getSponsor(): ?string
    {
        return $this->Sponsor;
    }

    public function setSponsor(string $Sponsor): self
    {
        $this->Sponsor = $Sponsor;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function isPouvoirAg(): ?bool
    {
        return $this->pouvoirAg;
    }

    public function setPouvoirAg(?bool $pouvoirAg): self
    {
        $this->pouvoirAg = $pouvoirAg;

        return $this;
    }

    public function getDonation(): ?int
    {
        return $this->donation;
    }

    public function setDonation(?int $donation): self
    {
        $this->donation = $donation;

        return $this;
    }

    public function getTotalPayed(): ?int
    {
        return $this->totalPayed;
    }

    public function setTotalPayed(?int $totalPayed): self
    {
        $this->totalPayed = $totalPayed;

        return $this;
    }

    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(\DateTimeImmutable $registeredAt): self
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFirstRegisteration(): ?\DateTimeImmutable
    {
        return $this->firstRegisteration;
    }

    public function setFirstRegisteration(\DateTimeImmutable $firstRegisteration = null): self
    {
        $this->firstRegisteration = $firstRegisteration;

        return $this;
    }

    public function getFftNumber(): ?string
    {
        return $this->fftNumber;
    }

    public function setFftNumber(?string $fftNumber): self
    {
        $this->fftNumber = $fftNumber;

        return $this;
    }

    public function getFftaNumber(): ?string
    {
        return $this->fftaNumber;
    }

    public function setFftaNumber(?string $fftaNumber): self
    {
        $this->fftaNumber = $fftaNumber;

        return $this;
    }

    public function getFftpmNumber(): ?string
    {
        return $this->fftpmNumber;
    }

    public function setFftpmNumber(?string $fftpmNumber): self
    {
        $this->fftpmNumber = $fftpmNumber;

        return $this;
    }

    public function getLastKnownSeason(): ?string
    {
        return $this->lastKnownSeason;
    }

    public function setLastKnownSeason(?string $lastKnownSeason): self
    {
        $this->lastKnownSeason = $lastKnownSeason;

        return $this;
    }

    public function isAttestation(): ?bool
    {
        return $this->attestation;
    }

    public function setAttestation(?bool $attestation): self
    {
        $this->attestation = $attestation;

        return $this;
    }

    public function getSecondClub(): ?int
    {
        return $this->secondClub;
    }

    public function setSecondClub(?int $secondClub): self
    {
        $this->secondClub = $secondClub;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection<int, Box>
     */
    public function getBoxes(): Collection
    {
        return $this->boxes;
    }

    public function addBox(Box $box): self
    {
        if (!$this->boxes->contains($box)) {
            $this->boxes[] = $box;
            $box->setMember($this);
        }

        return $this;
    }

    public function removeBox(Box $box): self
    {
        if ($this->boxes->removeElement($box)) {
            // set the owning side to null (unless already changed)
            if ($box->getMember() === $this) {
                $box->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Peculiarity>
     */
    public function getPeculiarities(): Collection
    {
        return $this->peculiarities;
    }

    public function addPeculiarity(Peculiarity $peculiarity): self
    {
        if (!$this->peculiarities->contains($peculiarity)) {
            $this->peculiarities[] = $peculiarity;
        }

        return $this;
    }

    public function removePeculiarity(Peculiarity $peculiarity): self
    {
        $this->peculiarities->removeElement($peculiarity);

        return $this;
    }

    /**
     * @return Collection<int, RateFFT>
     */
    public function getRatesFFT(): Collection
    {
        return $this->ratesFFT;
    }

    public function addRatesFFT(RateFFT $ratesFFT): self
    {
        if (!$this->ratesFFT->contains($ratesFFT)) {
            $this->ratesFFT[] = $ratesFFT;
        }

        return $this;
    }

    public function removeRatesFFT(RateFFT $ratesFFT): self
    {
        $this->ratesFFT->removeElement($ratesFFT);

        return $this;
    }

    /**
     * @return Collection<int, RateFFTA>
     */
    public function getRatesFFTA(): Collection
    {
        return $this->ratesFFTA;
    }

    public function addRatesFFTA(RateFFTA $ratesFFTA): self
    {
        if (!$this->ratesFFTA->contains($ratesFFTA)) {
            $this->ratesFFTA[] = $ratesFFTA;
        }

        return $this;
    }

    public function removeRatesFFTA(RateFFTA $ratesFFTA): self
    {
        $this->ratesFFTA->removeElement($ratesFFTA);

        return $this;
    }

    public function getTitle(): ?int
    {
        return $this->title;
    }

    public function setTitle(int $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function isIsRegistered(): ?bool
    {
        return $this->isRegistered;
    }

    public function setIsRegistered(bool $isRegistered): self
    {
        $this->isRegistered = $isRegistered;

        return $this;
    }

    public function getFirstPhone(): ?string
    {
        return $this->firstPhone;
    }

    public function setFirstPhone(?string $firstPhone): self
    {
        $this->firstPhone = $firstPhone;

        return $this;
    }

    public function getSecondPhone(): ?string
    {
        return $this->secondPhone;
    }

    public function setSecondPhone(?string $secondPhone): self
    {
        $this->secondPhone = $secondPhone;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getMaidenName(): ?string
    {
        return $this->maidenName;
    }

    public function setMaidenName(?string $maidenName): self
    {
        $this->maidenName = $maidenName;

        return $this;
    }
}
