<?php

namespace Marktic\Billing\Parties\ModelsRelated\HasCustomerParty;

use Marktic\Billing\Parties\Models\Party;
use Nip\Records\AbstractModels\Record;

/**
 */
trait HasCustomerPartyRecordTrait
{
    protected ?int $customer_party_id = null;

    public function getCustomerPartyId(): ?int
    {
        return $this->customer_party_id;
    }

    public function setCustomerPartyId(?int $party_id): void
    {
        $this->customer_party_id = $party_id;
    }

    public function getCustomerParty(): Party|Record|null|false
    {
        return $this->getRelation('CustomerParty')->getResults();
    }

    public function setCustomerParty(?Party $party): void
    {
        $this->setCustomerPartyId($party->id);
        $this->getRelation('CustomerParty')->setResults($party);
    }
}
