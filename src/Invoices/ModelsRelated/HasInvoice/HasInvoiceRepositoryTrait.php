<?php

namespace Marktic\Billing\Invoices\ModelsRelated\HasInvoice;

use Marktic\Billing\Utility\BillingModels;

trait HasInvoiceRepositoryTrait
{
    protected function initRelationBillingInvoice(): void
    {
        $this->belongsTo(
            HasInvoiceRepository::RELATION_BILLING_INVOICE,
            ['class' => BillingModels::invoicesClass(), 'fk' => 'invoice_id']
        );
    }
}
