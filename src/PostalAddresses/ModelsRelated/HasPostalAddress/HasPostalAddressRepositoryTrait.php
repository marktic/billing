<?php

namespace Marktic\Billing\PostalAddresses\ModelsRelated\HasPostalAddress;

use Marktic\Billing\Utility\BillingModels;

trait HasPostalAddressRepositoryTrait
{
    protected function initRelationsPostalAddress(): void
    {
        $this->belongsTo(
            'BillingPostalAddress',
            ['class' => BillingModels::PostalAddressesClass(), 'fk' => 'PostalAddress_id']
        );
    }
}
