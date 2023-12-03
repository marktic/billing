<?php

namespace Marktic\Billing\PostalAddresses\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Nip\Utility\Country;

/**
 * Trait NewsletterConsentTrait
 */
trait PostalAddressTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use RecordHasIdentifier;
    use TimestampableTrait;

    protected $streetName;
    protected $additionalStreetName;
    protected $buildingNumber;
    protected $cityName;
    protected $postalZone;

    protected $countrySubentity;

    protected Country|string $country;


    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    /**
     * Set Building Name
     */
    public function setBuildingNumber(?string $buildingNumber): PostalAddress
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    /**
     * Get street name
     */
    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    /**
     * Set street Name
     */
    public function setStreetName(?string $streetName): PostalAddress
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * Get Additional Street Name
     */
    public function getAdditionalStreetName(): ?string
    {
        return $this->additionalStreetName;
    }

    /**
     * Set addional street name
     */
    public function setAdditionalStreetName(?string $additionalStreetName): PostalAddress
    {
        $this->additionalStreetName = $additionalStreetName;
        return $this;
    }

    /**
     * get city name
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * Set City Name
     */
    public function setCityName(?string $cityName): PostalAddress
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     * Get postal zone
     */
    public function getPostalZone(): ?string
    {
        return $this->postalZone;
    }

    /**
     * Set postal zone
     */
    public function setPostalZone(?string $postalZone): PostalAddress
    {
        $this->postalZone = $postalZone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountrySubentity(): ?string
    {
        return $this->countrySubentity;
    }

    /**
     * @param string $subentity
     * @return self
     */
    public function setCountrySubentity(string $countrySubentity): self
    {
        $this->countrySubentity = $countrySubentity;
        return $this;
    }

    /**
     * @return string|Country|null
     */
    public function getCountry(): string|Country|null
    {
        return $this->country;
    }

    /**
     * Set Country
     */
    public function setCountry(Country|string $country): self
    {
        $country = is_string($country) ? Country::fromName($country) : $country;
        $this->country = $country;
        return $this;
    }
}
