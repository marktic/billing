<?php

namespace Marktic\Billing\Invoices\ModelsRelated\HasInvoice;

use Marktic\Billing\Invoices\Models\Invoice;

/**
 * @method Invoice getBillingInvoice()
 */
trait HasInvoiceRecordTrait
{
    protected ?int $invoice_id = null;

    public function getInvoiceId(): ?int
    {
        return $this->invoice_id;
    }

    public function setInvoiceId(?int $invoice_id): void
    {
        $this->invoice_id = $invoice_id;
    }


    public function setBillingInvoice(?Invoice $invoice): void
    {
        $this->setInvoiceId($invoice->id);
        $this->getRelation(HasInvoiceRepository::RELATION_BILLING_INVOICE)->setResults($invoice);
    }
}
