<?php

namespace Marktic\Billing\Invoices\Actions\Calculator;

use Bytic\Actions\Action;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Models\Invoice;

class AppendLineItem extends Action
{
    protected Invoice $invoice;
    protected InvoiceLine $item;

    public static function for(Invoice $invoice, InvoiceLine $item)
    {
        $action = new self();
        $action->invoice = $invoice;
        $action->item = $item;
        return $action;
    }

    public function handle(): void
    {
        $this->invoice->getBillingLines()->add($this->item);
        $this->invoice->addAmount($this->item->getTotal());
    }
}

