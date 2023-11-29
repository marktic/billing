<?php

namespace Marktic\Billing\Contacts\ModelsRelated\HasContact;

use Marktic\Billing\Utility\BillingModels;

trait HasContactRepositoryTrait
{
    protected function initRelationsContact(): void
    {
        $this->belongsTo(
            'BillingContact',
            ['class' => BillingModels::contactsClass(), 'fk' => 'contact_id']
        );
    }
}
