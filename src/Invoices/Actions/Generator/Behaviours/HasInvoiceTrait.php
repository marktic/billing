<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Marktic\Billing\Invoices\InvoiceStatuses\Draft;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingModels;

trait HasInvoiceTrait
{
    /**
     * @var Invoice
     */
    protected $invoice;

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }

    protected function initInvoice()
    {
        $this->invoice = $this->generateBlankInvoice();
        $this->invoiceItems = $this->invoice->getBillingLines();
    }

    protected function generateBlankInvoice()
    {
        $invoice = BillingModels::invoices()->getNew();
        $invoice->setPropertyValue('status', Draft::NAME);
        return $invoice;
    }
}
