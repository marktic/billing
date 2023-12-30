<?php

namespace Marktic\Billing\Invoices\Actions\Changes;


use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Invoices\Events\InvoiceDeleted;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingEvents;

/**
 * @method Invoice getSubject()
 */
class DeleteInvoice extends Action
{
    use HasSubject;

    public function handle()
    {
        $invoice = $this->getSubject();
        if (!$invoice->getStatusObject()->canDelete()) {
            return false;
        }
        $this->deleteLines();
        $this->deleteInvoice();

        BillingEvents::dispatch(InvoiceDeleted::class, $invoice);
        return true;
    }

    protected function deleteLines()
    {
        $invoice = $this->getSubject();
        $lines =$invoice->getBillingLines();
        foreach ($lines as $line) {
            $line->delete();
        }
    }

    protected function deleteInvoice()
    {
        $invoice = $this->getSubject();
        $invoice->delete();
    }
}