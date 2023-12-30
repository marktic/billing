<?php

namespace Marktic\Billing\Invoices\Actions\Generator;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Invoices\Models\Invoice;

abstract class AbstractGenerator extends Action
{
    use Behaviours\CanCreateTrait;
    use Behaviours\HasInvoiceLinesTrait;
    use Behaviours\HasInvoiceTrait;
    use Behaviours\HasSubjectTrait;

    /**
     * @return Invoice
     */
    public function generate(): Invoice
    {
        $this->generateBlankInvoice();
        $this->generateInvoiceItems();
        return $this->getInvoice();
    }
}