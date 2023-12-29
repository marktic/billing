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

    protected function generateBlankInvoice()
    {
        $this->invoice = BillingModels::invoices()->getNew();
        $this->invoice->setPropertyValue('status', Draft::NAME);
        $this->invoiceItems = $this->invoice->getBillingLines();
    }
}
