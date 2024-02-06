<?php

namespace Marktic\Billing\PostalAddresses\Actions\Transformation;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;

class PostalAddressesString extends Action
{
    use HasSubject;

    public function string()
    {
        $content = '';
        $content = $this->getSubject()->getStreetName();

        $additionalStreetName = $this->getSubject()->getAdditionalStreetName();
        $content .= $additionalStreetName ? ', ' . $additionalStreetName : '';

        $postalZone = $this->getSubject()->getPostalZone();
        $content .= $postalZone ? ', ' . $postalZone : '';

        $cityName = $this->getSubject()->getCityName();
        $content .= $cityName ? ', ' . $cityName : '';
        $content .= "\n";

        $countrySubentity = $this->getSubject()->getCountrySubentity();
        $content .= $countrySubentity ?: '';

        $country = $this->getSubject()->getCountry();
        $content .= $country ? ', ' . $country : '';
        return $content;
    }

    public function __toString()
    {
        return $this->string();
    }

    public function html()
    {
        $content = '';
        $content = $this->getSubject()->getStreetName();

        $additionalStreetName = $this->getSubject()->getAdditionalStreetName();
        $content .= $additionalStreetName ? ', ' . $additionalStreetName : '';

        $postalZone = $this->getSubject()->getPostalZone();
        $content .= $postalZone ? ', ' . $postalZone : '';

        $cityName = $this->getSubject()->getCityName();
        $content .= $cityName ? ', ' . $cityName : '';
        $content .= "<br>";

        $countrySubentity = $this->getSubject()->getCountrySubentity();
        $content .= $countrySubentity ?: '';

        $country = $this->getSubject()->getCountry();
        $content .= $country ? ', ' . $country : '';
        return $content;
    }
}
