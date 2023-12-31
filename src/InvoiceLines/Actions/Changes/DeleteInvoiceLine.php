<?php

namespace Marktic\Billing\InvoiceLines\Actions\Changes;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Actions\Calculator\RecalculateAmounts;

/**
 * @method InvoiceLine getSubject()
 */
class DeleteInvoiceLine extends Action
{
    use HasSubject;

    public function handle()
    {
        $invoiceLine = $this->getSubject();
        if (false == CanChangeInvoiceLine::for($invoiceLine)->canDelete()) {
            return false;
        }
        $invoiceLine->delete();

        RecalculateAmounts::for($invoiceLine->getBillingInvoice())
            ->doSave(true)
            ->handle();

        return true;
    }
}