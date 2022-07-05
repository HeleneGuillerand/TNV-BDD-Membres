<?php

namespace App\Entity;

use App\Repository\RateFFTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RateFFTRepository::class)
 */
class RateFFT
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $entryFee;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $cotisation;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $licence;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $amount;

    /**
     * @ORM\ManyToMany(targetEntity=Member::class, mappedBy="ratesFFT")
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

    public function getEntryFee(): ?int
    {
        return $this->entryFee;
    }

    public function setEntryFee(?int $entryFee): self
    {
        $this->entryFee = $entryFee;

        return $this;
    }

    public function getCotisation(): ?int
    {
        return $this->cotisation;
    }

    public function setCotisation(?int $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    public function getLicence(): ?int
    {
        return $this->licence;
    }

    public function setLicence(?int $licence): self
    {
        $this->licence = $licence;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
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
            $member->addRatesFFT($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeRatesFFT($this);
        }

        return $this;
    }
}
