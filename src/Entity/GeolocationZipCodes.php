<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeolocationZipCodes
 *
 * @ORM\Table(name="geolocation_zip_codes")
 * @ORM\Entity(repositoryClass="App\Repository\GeolocationZipCodesRepository")
 */
class GeolocationZipCodes
{
    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $zipcode;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longtitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $longtitude;

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongtitude(): ?float
    {
        return $this->longtitude;
    }

    public function setLongtitude(float $longtitude): self
    {
        $this->longtitude = $longtitude;

        return $this;
    }
    public function setZipcode(string $zipCode): self
    {
        $this->zipcode = $zipCode;

        return $this;
    }

}
