<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Marktic\Billing\InvoiceLines\Actions\Create\CreateBlankLineForInvoice;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Nip\Records\Record;

trait HasInvoiceLinesTrait
{

    /**
     * @return InvoiceLine|Record
     */
    protected function generateBlankInvoiceItem()
    {
        return CreateBlankLineForInvoice::for($this->getInvoice())->handle();
    }

    abstract protected function generateInvoiceItems();
}
