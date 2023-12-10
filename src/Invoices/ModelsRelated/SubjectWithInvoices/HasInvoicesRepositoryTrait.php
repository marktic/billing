<?php

namespace Marktic\Billing\Invoices\ModelsRelated\SubjectWithInvoices;

use Marktic\Billing\Utility\BillingModels;

trait HasInvoicesRepositoryTrait
{

    protected function initRelationsBillingInvoices(): void
    {
        $this->morphMany(
            'BillingInvoices',
            ['class' => BillingModels::invoicesClass(), 'morphPrefix' => 'subject', 'morphTypeField' => 'subject']
        );
    }
}
