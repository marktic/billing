<?php

namespace Marktic\Billing\InvoiceLines\Actions\Changes;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\InvoiceLines\Actions\Calculator\CalculateLineTotals;
use Marktic\Billing\Invoices\Actions\Calculator\RecalculateAmounts;

class EditInvoiceLine extends Action
{
    use HasSubject;

    public function handle()
    {
        $invoiceLine = $this->getSubject();
        if (false == CanChangeInvoiceLine::for($invoiceLine)->canEdit()) {
            return;
        }

        CalculateLineTotals::for($invoiceLine)
            ->doSave(true)
            ->handle();

        RecalculateAmounts::for($invoiceLine->getBillingInvoice())
            ->doSave(true)
            ->handle();
    }
}