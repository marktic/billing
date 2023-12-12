<?php

namespace Marktic\Billing\PostalAddresses\Models;

use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
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

    protected ?string $street_name = null;
    protected ?string $additional_street_name = null;
    protected ?string $city_name = null;
    protected ?string $cityName = null;
    protected ?string $postal_zone = null;

    protected ?string $country_subentity = null;

    protected Country|string $country;

    public function getCityName(): ?string
    {
        return $this->city_name;
    }

    /**
     * Set Building Name
     */
    public function setCityName(?string $city_name): PostalAddress
    {
        $this->city_name = $city_name;
        return $this;
    }

    /**
     * Get street name
     */
    public function getStreetName(): ?string
    {
        return $this->street_name;
    }

    /**
     * Set street Name
     */
    public function setStreetName(?string $street_name): PostalAddress
    {
        $this->street_name = $street_name;
        return $this;
    }

    /**
     * Get Additional Street Name
     */
    public function getAdditionalStreetName(): ?string
    {
        return $this->additional_street_name;
    }

    /**
     * Set addional street name
     */
    public function setAdditionalStreetName(?string $name): PostalAddress
    {
        $this->additional_street_name = $name;
        return $this;
    }

    /**
     * Get postal zone
     */
    public function getPostalZone(): ?string
    {
        return $this->postal_zone;
    }

    /**
     * Set postal zone
     */
    public function setPostalZone(?string $postal_zone): PostalAddress
    {
        $this->postal_zone = $postal_zone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountrySubentity(): ?string
    {
        return $this->country_subentity;
    }

    /**
     * @param string $subentity
     * @return self
     */
    public function setCountrySubentity(string $country_subentity): self
    {
        $this->country_subentity = $country_subentity;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): Country|null
    {
        return $this->country;
    }

    /**
     * Set Country
     */
    public function setCountry(Country|string $country): self
    {
        $country = is_string($country) ? Country::fromName($country) : $country;
        $country->stringableAlpha2();
        $this->country = $country;
        return $this;
    }
}
