<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use League\ISO3166\ISO3166;
use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\PostalAddresses\Actions\PostalAddressesGenerate;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;
use Marktic\Billing\Utility\BillingModels;

trait HasPostalAddressesFieldsTrait
{

    protected $postalAddressesRepository;

    protected $postalAddressRecord = null;

    protected function initializePostalAddressesFields($mandatory = true): void
    {
        $this->postalAddressesRepository = BillingModels::postalAddresses();

        $this->initializePostalAddressesStreetFields($mandatory);

        $this->addInput(
            'postal_address[city_name]',
            $this->postalAddressesRepository->getLabel('form.city_name'),
            $mandatory
        );

        $this->initializePostalAddressesPostalZone($mandatory);

        $this->addInput(
            'postal_address[country_subentity]',
            $this->postalAddressesRepository->getLabel('form.country_subentity'),
            $mandatory
        );

        $this->initializePostalAddressesCountry($mandatory);
    }

    protected function getDataFromModelPostalAddresses()
    {
        $this->postalAddressRecord = $this->getBillingParty()->getBillingPostalAddress();
        if (false == ($this->postalAddressRecord instanceof PostalAddress)) {
            return;
        }
        $this->getElement('postal_address[street_name]')->getData($this->postalAddressRecord->getStreetName(), 'model');

        if ($this->hasElement('postal_address[additional_street_name]')) {
            $this->getElement('postal_address[additional_street_name]')->getData($this->postalAddressRecord->getAdditionalStreetName(), 'model');
        }
        $this->getElement('postal_address[city_name]')->getData($this->postalAddressRecord->getCityName(), 'model');

        if ($this->hasElement('postal_address[postal_zone]')) {
            $this->getElement('postal_address[postal_zone]')->getData($this->postalAddressRecord->getPostalZone(), 'model');
        }
        $this->getElement('postal_address[country_subentity]')->getData($this->postalAddressRecord->getCountrySubentity(), 'model');
        $this->getElement('postal_address[country]')->getData($this->postalAddressRecord->getCountry(), 'model');
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

    /**
     * @param mixed $mandatory
     * @return void
     */
    protected function initializePostalAddressesStreetFields(mixed $mandatory): void
    {
        $this->addInput(
            'postal_address[street_name]',
            $this->postalAddressesRepository->getLabel('form.address'),
            $mandatory
        );
        return;
        $this->addInput(
            'postal_address[additional_street_name]',
            $this->postalAddressesRepository->getLabel('form.additional_street_name'),
            $mandatory
        );
    }

    /**
     * @param mixed $mandatory
     * @return void
     */
    protected function initializePostalAddressesPostalZone(mixed $mandatory): void
    {
        return;
        $this->addInput(
            'postal_address[postal_zone]',
            $this->postalAddressesRepository->getLabel('form.postal_zone'),
            $mandatory
        );
    }

    /**
     * @param mixed $mandatory
     * @return void
     */
    protected function initializePostalAddressesCountry(mixed $mandatory): void
    {
        $this->addSelect(
            'postal_address[country]',
            $this->postalAddressesRepository->getLabel('form.country'),
            $mandatory
        );

        $selectElement = $this->getElement('postal_address[country]');
        $countries = (new ISO3166())->all();
        foreach ($countries as $country) {
            $selectElement->addOption($country['alpha2'], $country['name']);
        }
        $selectElement->setValue($this->getPostalAddressesCountryDefault());
    }

    protected function getPostalAddressesCountryDefault()
    {
        return null;
    }
}