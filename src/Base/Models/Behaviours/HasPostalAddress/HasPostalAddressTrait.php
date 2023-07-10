<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasPostalAddress;

trait HasPostalAddressManagerTrait
{
    protected ?string $address = null;
    protected ?string $city = null;
    protected ?string $postalCode = null;
    protected ?string $subdivision = null;
    protected ?string $country = null;

    /**
     * Get address lines
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }


    /**
     * Set address lines
     * @param string $addressLines Address lines (up to 3 lines)
     * @return self                   This instance
     */
    public function setAddress(string $addressLines): self
    {
        $this->address = $addressLines;
        return $this;
    }


    /**
     * Get city name
     * @return string|null City name
     */
    public function getCity(): ?string
    {
        return $this->city;
    }


    /**
     * Set city name
     * @param string|null $city City name
     * @return self              This instance
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }


    /**
     * Get postal code
     * @return string|null Postal code
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }


    /**
     * Set postal code
     * @param string|null $postalCode Postal code
     * @return self                    This instance
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }


    /**
     * Get country subdivision (region, province, etc.)
     * @return string|null Country subdivision
     */
    public function getSubdivision(): ?string
    {
        return $this->subdivision;
    }


    /**
     * Set country subdivision (region, province, etc.)
     * @param string|null $subdivision Country subdivision
     * @return self                     This instance
     */
    public function setSubdivision(?string $subdivision): self
    {
        $this->subdivision = $subdivision;
        return $this;
    }


    /**
     * Get country code
     * @return string|null Country code
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }


    /**
     * Set country code
     * @param string|null $countryCode Country code
     * @return self                     This instance
     */
    public function setCountry(?string $countryCode): self
    {
        $this->country = $countryCode;
        return $this;
    }
}

