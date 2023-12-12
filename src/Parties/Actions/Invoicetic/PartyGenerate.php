<?php

namespace Marktic\Billing\Parties\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\Party\Party as eParty;
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
        return $this->eParty;
    }

    protected function populateAttributes(): void
    {
        $this->eParty->setName($this->party->getName());
        $this->eParty->setPartyIdentification($this->party->getIdentification());

        $this->populatePostalAddress();
    }

    protected function populatePostalAddress(): void
    {
        $this->eParty->setPostalAddress(
            PostalAddressGenerate::for($this->party->getBillingPostalAddress())->handle()
        );
    }

    protected function newEParty(): eParty
    {
        return new eParty();
    }
}