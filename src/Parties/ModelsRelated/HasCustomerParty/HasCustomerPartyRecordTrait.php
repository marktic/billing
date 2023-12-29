<?php

namespace Marktic\Billing\Parties\ModelsRelated\HasCustomerParty;

use Marktic\Billing\Parties\Models\Party;

/**
 * @method Party getCustomerParty()
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
}
