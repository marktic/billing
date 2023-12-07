<?php

namespace Marktic\Billing\Contacts\Actions\Identification;

use Bytic\Actions\Action;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\Utility\BillingModels;

class GenerateIdentification extends Action
{
    protected ?string $identification = null;

    protected Contact $contact;

    public static function fromData(array $data)
    {
        $contact = BillingModels::contacts()->getNew($data);
        return static::fromContact($contact);
    }

    public static function fromContact(Contact $contact): static
    {
        $action = new static();
        $action->contact = $contact;
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
        $unique = $this->contact->getEmail() . '' . $this->contact->getTelephone();
        return sha1($unique);
    }
}

