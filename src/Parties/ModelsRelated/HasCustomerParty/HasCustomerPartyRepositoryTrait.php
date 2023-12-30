<?php

namespace Marktic\Billing\Parties\ModelsRelated\HasCustomerParty;

use Marktic\Billing\Utility\BillingModels;

trait HasCustomerPartyRepositoryTrait
{

    protected function initRelationsBillingCustomerParty(): void
    {
        $this->belongsTo(
            self::RELATION_CUSTOMER_PARTY,
            [
                'class' => BillingModels::partiesClass(),
                'fk' => 'customer_party_id'
            ]
        );
    }
}
