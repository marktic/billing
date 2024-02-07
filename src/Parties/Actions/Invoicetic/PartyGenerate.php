<?php

namespace Marktic\Billing\Parties\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\Party\Party as eParty;
use Marktic\Billing\Contacts\Actions\Invoicetic\ContactGenerate;
use Marktic\Billing\LegalEntities\Actions\Invoicetic\LegalEntityGenerate;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\PostalAddresses\Actions\Invoicetic\PostalAddressGenerate;

class PartyGenerate extends Action
{
    protected Party $party;

    protected eParty $eParty;

    public static function for(Party $party): self
    {
        $action = new static();
        $action->party = $party;
        return $action;
    }

    public function handle(): eParty
    {
        $this->eParty = $this->newEParty();
        $this->populateAttributes();
        $this->populateLegalEntity();
        $this->populatePostalAddress();
        $this->populateContact();
        return $this->eParty;
    }

    protected function populateAttributes(): void
    {
        $this->eParty->setName($this->party->getName());
        $this->eParty->setPartyIdentification($this->party->getIdentification());
    }

    protected function populateLegalEntity(): void
    {
        $legalEntity = $this->party->getBillingLegalEntity();
        if (!$legalEntity) {
            return;
        }
        $this->eParty->setLegalEntity(
            LegalEntityGenerate::for($legalEntity)->handle()
        );
    }

    protected function populatePostalAddress(): void
    {
        $this->eParty->setPostalAddress(
            PostalAddressGenerate::for($this->party->getBillingPostalAddress())->handle()
        );
    }

    protected function populateContact(): void
    {
        $this->eParty->setContact(
            ContactGenerate::for($this->party->getBillingContact())->handle()
        );
    }

    protected function newEParty(): eParty
    {
        return new eParty();
    }
}
