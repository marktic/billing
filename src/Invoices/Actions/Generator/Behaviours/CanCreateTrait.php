<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Marktic\Billing\BillingStatuses\Actions\Changes\UpdateOnInvoiceCreated;
use Marktic\Billing\Invoices\Events\InvoiceCreated;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Invoices\Models\InvoiceInterface;
use Marktic\Billing\Utility\BillingEvents;

trait CanCreateTrait
{
    public function create():Invoice|InvoiceInterface
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