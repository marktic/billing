<?php

namespace Marktic\Billing\PostalAddresses\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\PostalAddress\Country;
use Invoicetic\Common\Dto\PostalAddress\PostalAddress as ePostalAddress;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;

class PostalAddressGenerate extends Action
{
    protected PostalAddress $postalAddress;

    protected ePostalAddress $ePostalAddress;

    public static function for(PostalAddress $postalAddress): self
    {
        $action = new static();
        $action->postalAddress = $postalAddress;
        return $action;
    }

    public function handle(): ePostalAddress
    {
        $this->ePostalAddress = $this->newEPostalAddress();
        $this->populateAttributes();
        return $this->ePostalAddress;
    }

    protected function populateAttributes(): void
    {
        $this->ePostalAddress->setStreetName($this->postalAddress->getStreetName());
        $this->ePostalAddress->setAdditionalStreetName($this->postalAddress->getAdditionalStreetName());
//        $this->ePostalAddress->setBuildingNumber($this->postalAddress->getBuildingNumber());
        $this->ePostalAddress->setCityName($this->postalAddress->getCityName());
        $this->ePostalAddress->setPostalZone($this->postalAddress->getPostalZone());
        $this->ePostalAddress->setCountrySubentity($this->postalAddress->getCountrySubentity());

        $country = new Country();
        $country->setIdentificationCode($this->postalAddress->getCountry()->alpha2 );
        $this->ePostalAddress->setCountry($country);
    }

    protected function newEPostalAddress(): ePostalAddress
    {
        return new ePostalAddress();
    }
}