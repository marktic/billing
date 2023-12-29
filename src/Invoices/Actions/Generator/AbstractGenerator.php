<?php

namespace Marktic\Billing\Invoices\Actions\Generator;

use Bytic\Actions\Action;
use Marktic\Billing\Invoices\Models\Invoice;

abstract class AbstractGenerator extends Action
{
    use Behaviours\HasInvoiceTrait;
    use Behaviours\HasInvoiceLinesTrait;

    /**
     * @return Invoice
     */
    public function generate()
    {
        $this->generateBlankInvoice();
        $this->generateInvoiceItems();
        return $this->getInvoice();
    }
}