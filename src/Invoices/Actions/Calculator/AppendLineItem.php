<?php

namespace Marktic\Billing\Invoices\Actions\Calculator;

use Bytic\Actions\Action;
use Marktic\Billing\InvoiceLines\Actions\Calculator\CalculateLineTotals;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Models\InvoiceInterface;

class AppendLineItem extends Action
{
    protected InvoiceInterface $invoice;
    protected InvoiceLine $item;

    public static function for(InvoiceInterface $invoice, InvoiceLine $item)
    {
        $action = new self();
        $action->invoice = $invoice;
        $action->item = $item;
        return $action;
    }

    public function handle(): void
    {
        CalculateLineTotals::for($this->item)->handle();

        $this->invoice->getBillingLines()->add($this->item);
        $this->invoice->addAmount($this->item->getTotal());
    }
}

