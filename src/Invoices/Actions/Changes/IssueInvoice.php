<?php

namespace Marktic\Billing\Invoices\Actions\Changes;


use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Invoices\Events\InvoiceDeleted;
use Marktic\Billing\Invoices\Events\InvoiceIssued;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingEvents;

/**
 * @method Invoice getSubject()
 */
class IssueInvoice extends Action
{
    use HasSubject;

    public function handle()
    {
        $invoice = $this->getSubject();
        $invoice->issuedAtNow(date('Y-m-d'));
        $invoice->saveRecord();

        BillingEvents::dispatch(InvoiceIssued::class, $invoice);
        return true;
    }

}