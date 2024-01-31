<?php

namespace Marktic\Billing\PostalAddresses\Actions\Identification;

use Bytic\Actions\Action;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;
use Marktic\Billing\Utility\BillingModels;

class GenerateIdentification extends Action
{
    protected ?string $identification = null;

    protected PostalAddress $record;

    public static function fromData(array $data)
    {
        $record = BillingModels::postalAddresses()->getNew($data);
        return static::fromRecord($record);
    }

    public static function fromRecord(PostalAddress $record): static
    {
        $action = new static();
        $action->record = $record;
        return $action;
    }

    public function handle(): string
    {
        return $this->getIdentification();
    }

    public function getIdentification(): string
    {
        if ($this->identification === null) {
            $this->identification = $this->generateIdentification();
        }
        return $this->identification;
    }

    protected function generateIdentification(): string
    {
        $unique = $this->record->getStreetName()
            . $this->record->getAdditionalStreetname()
            . $this->record->getCityName()
            . $this->record->getPostalZone()
            . $this->record->getCountrySubentity();
        $country = $this->record->getCountry();
        $unique .= $country ? $country->name : '';
        return sha1($unique);
    }
}

