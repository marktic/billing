<?php

namespace Marktic\Billing\Parties\Actions\Identification;

use Bytic\Actions\Action;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;
use Marktic\Billing\Utility\BillingModels;

class GenerateIdentification extends Action
{
    protected ?string $identification = null;

    protected Party $record;

    public static function fromData(array $data)
    {
        $record = BillingModels::parties()->getNew($data);
        return static::fromRecord($record);
    }

    public static function fromRecord(Party $record): static
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
        $unique = $this->record->owner_id
            . $this->record->owner
            . $this->record->subject_id
            . $this->record->subject;
        return sha1($unique);
    }
}

