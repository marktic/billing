<?php

namespace Marktic\Billing\InvoiceLines\Actions\Changes;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;

class CanChangeInvoiceLine extends Action
{
    use HasSubject;

    public function canEdit(): bool
    {
        $invoiceLine = $this->getSubject();
        $invoice = $invoiceLine->getBillingInvoice();
        return $invoice->getStatusObject()->canEdit();
    }

    public function canDelete(): bool
    {
        $invoiceLine = $this->getSubject();
        $invoice = $invoiceLine->getBillingInvoice();
        return $invoice->getStatusObject()->canDelete();
    }
}