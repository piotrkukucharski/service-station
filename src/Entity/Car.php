<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=48,unique=true)
     */
    private $vin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Model", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modelId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BodyType", inversedBy="cars")
     */
    private $bodyTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Color", inversedBy="cars")
     */
    private $colorId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DriveType", inversedBy="cars")
     */
    private $driveTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FuelType", inversedBy="cars")
     */
    private $fuelTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Transmission", inversedBy="cars")
     */
    private $transmissionId;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $buildDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $modelYear;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="cars")
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getModelId(): ?Model
    {
        return $this->modelId;
    }

    public function setModelId(?Model $modelId): self
    {
        $this->modelId = $modelId;

        return $this;
    }

    public function getBodyTypeId(): ?BodyType
    {
        return $this->bodyTypeId;
    }

    public function setBodyTypeId(?BodyType $bodyTypeId): self
    {
        $this->bodyTypeId = $bodyTypeId;

        return $this;
    }

    public function getColorId(): ?Color
    {
        return $this->colorId;
    }

    public function setColorId(?Color $colorId): self
    {
        $this->colorId = $colorId;

        return $this;
    }

    public function getDriveTypeId(): ?DriveType
    {
        return $this->driveTypeId;
    }

    public function setDriveTypeId(?DriveType $driveTypeId): self
    {
        $this->driveTypeId = $driveTypeId;

        return $this;
    }

    public function getFuelTypeId(): ?FuelType
    {
        return $this->fuelTypeId;
    }

    public function setFuelTypeId(?FuelType $fuelTypeId): self
    {
        $this->fuelTypeId = $fuelTypeId;

        return $this;
    }

    public function getTransmissionId(): ?Transmission
    {
        return $this->transmissionId;
    }

    public function setTransmissionId(?Transmission $transmissionId): self
    {
        $this->transmissionId = $transmissionId;

        return $this;
    }

    public function getBuildDate(): ?\DateTimeInterface
    {
        return $this->buildDate;
    }

    public function setBuildDate(?\DateTimeInterface $buildDate): self
    {
        $this->buildDate = $buildDate;

        return $this;
    }

    public function getModelYear(): ?\DateTimeInterface
    {
        return $this->modelYear;
    }

    public function setModelYear(?\DateTimeInterface $modelYear): self
    {
        $this->modelYear = $modelYear;

        return $this;
    }

    public function getOwner(): ?Client
    {
        return $this->owner;
    }

    public function setOwner(?Client $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
