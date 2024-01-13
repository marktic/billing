<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\PostalAddresses\Actions\PostalAddressesGenerate;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;
use Marktic\Billing\Utility\BillingModels;

trait HasPostalAddressesFieldsTrait
{

    protected $postalAddressesRepository;

    protected $postalAddressRecord = null;

    protected function initializePostalAddressesFields(): void
    {
        $this->postalAddressesRepository = BillingModels::postalAddresses();

        $this->addInput('postal_address[street_name]', $this->postalAddressesRepository->getLabel('form.street_name'), true);
        $this->addInput('postal_address[additional_street_name]', $this->postalAddressesRepository->getLabel('form.additional_street_name'), true);
        $this->addInput('postal_address[city_name]', $this->postalAddressesRepository->getLabel('form.city_name'), true);
        $this->addInput('postal_address[postal_zone]', $this->postalAddressesRepository->getLabel('form.postal_zone'), true);
        $this->addInput('postal_address[country_subentity]', $this->postalAddressesRepository->getLabel('form.country_subentity'), true);
        $this->addInput('postal_address[country]', $this->postalAddressesRepository->getLabel('form.country'), true);
    }

    protected function getDataFromModelPostalAddresses()
    {
        $this->postalAddressRecord = $this->getBillingParty()->getBillingPostalAddress();
        if ($this->postalAddressRecord instanceof PostalAddress) {
            $this->getElement('postal_address[street_name]')->getData($this->postalAddressRecord->getStreetName(), 'model');
            $this->getElement('postal_address[additional_street_name]')->getData($this->postalAddressRecord->getAdditionalStreetName(), 'model');
            $this->getElement('postal_address[city_name]')->getData($this->postalAddressRecord->getCityName(), 'model');
            $this->getElement('postal_address[postal_zone]')->getData($this->postalAddressRecord->getPostalZone(), 'model');
            $this->getElement('postal_address[country_subentity]')->getData($this->postalAddressRecord->getCountrySubentity(), 'model');
            $this->getElement('postal_address[country]')->getData($this->postalAddressRecord->getCountry(), 'model');
        }
    }

    protected function processValidationPostalAddresses()
    {

    }

    protected function saveModelPostalAddress($party): PostalAddress
    {
        $data = $this->getData();
        $postalAddress = $this->savePostalAddress($data['postal_address']);
        PartyPopulateFrom::postalAddress($party, $postalAddress);
        return $postalAddress;
    }

    /**
     * @param $data
     * @return PostalAddress
     */
    protected function savePostalAddress($data): PostalAddress
    {
        if ($this->postalAddressRecord instanceof PostalAddress) {
            $this->postalAddressRecord->fill($data);
            $this->postalAddressRecord->save();

            return $this->postalAddressRecord;
        }

        return $this->createPostalAddresses($data);
    }

    protected function createPostalAddresses($data): PostalAddress
    {
        $action = PostalAddressesGenerate::for($data);
        $action->withOwner($this->billingOwner);
        $action->orCreate();

        return $action->fetch();
    }

}