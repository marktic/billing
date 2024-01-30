<?php

namespace Marktic\Billing\InvoiceLines\Actions\Create;

use Bytic\Actions\Action;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\Record;

class CreateBlankLineForInvoice extends Action
{
    protected Invoice $invoice;

    public static function for(Invoice $invoice): self
    {
        $action = new static();
        $action->invoice = $invoice;
        return $action;
    }

    public function handle(): Record|InvoiceLine
    {
        $line = BillingModels::invoiceLines()->getNew();
        $line->invoice_id = $this->invoice->id;
        $line->setCurrency($this->invoice->getCurrency());
        return $line;
    }
}