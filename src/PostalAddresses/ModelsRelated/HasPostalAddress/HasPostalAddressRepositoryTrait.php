<?php

namespace Marktic\Billing\PostalAddresses\ModelsRelated\HasPostalAddress;

use Marktic\Billing\Utility\BillingModels;

trait HasPostalAddressRepositoryTrait
{
    protected function initRelationsBillingPostalAddress(): void
    {
        $this->belongsTo(
            'BillingPostalAddress',
            ['class' => BillingModels::PostalAddressesClass(), 'fk' => 'postal_address_id']
        );
    }
}
