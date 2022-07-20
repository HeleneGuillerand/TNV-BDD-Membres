<?php

namespace App\Entity;

use App\Repository\RateFFTARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=RateFFTARepository::class)
 * @UniqueEntity("code",
 * message="Le numéro de code est déjà utilisé")
 * @UniqueEntity("label",
 * message="Cette description est déjà utilisée")
 */
class RateFFTA
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $label;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $entryFee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cotisation;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $licence;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amount;

    /**
     * @ORM\ManyToMany(targetEntity=Member::class, mappedBy="ratesFFTA")
     */
    private $members;

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getEntryFee(): ?float
    {
        return $this->entryFee;
    }

    public function setEntryFee(?float $entryFee): self
    {
        $this->entryFee = $entryFee;

        return $this;
    }

    public function getCotisation(): ?float
    {
        return $this->cotisation;
    }

    public function setCotisation(?float $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    public function getLicence(): ?float
    {
        return $this->licence;
    }

    public function setLicence(?float $licence): self
    {
        $this->licence = $licence;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return Collection<int, Member>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->addRatesFFTA($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeRatesFFTA($this);
        }

        return $this;
    }
}
