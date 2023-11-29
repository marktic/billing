<?php

namespace Marktic\Billing\Invoices\ModelsRelated\HasInvoice;

use Marktic\Billing\Utility\BillingModels;

trait HasInvoiceRepositoryTrait
{
    protected function initRelationsLegalEntity(): void
    {
        $this->belongsTo(
            'Invoice',
            ['class' => BillingModels::invoicesClass(), 'fk' => 'invoice_id']
        );
    }
}
