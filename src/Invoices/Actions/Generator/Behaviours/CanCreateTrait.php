<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Marktic\Billing\BillingSubject\Actions\Changes\UpdateOnInvoiceCreated;
use Marktic\Billing\Invoices\Events\InvoiceCreated;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingEvents;

trait CanCreateTrait
{
    public function create(): Invoice
    {
        $invoice = $this->generate();
        $invoice->saveRecord();
        $invoice->saveRelations();

        $this->afterCreated($invoice);
        return $invoice;
    }

    protected function afterCreated($invoice): void
    {
        BillingEvents::dispatch(InvoiceCreated::class, $invoice);
        if ($this->billingStatus) {
            UpdateOnInvoiceCreated::forInvoice($this->billingStatus, $invoice)->handle();
        }
    }
}