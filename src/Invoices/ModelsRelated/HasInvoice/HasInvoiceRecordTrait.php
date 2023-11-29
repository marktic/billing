<?php

namespace Marktic\Billing\Invoices\ModelsRelated\HasInvoice;

use Nip\Records\Record;

/**
 * @method Record getBillingOwner()
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
}
