<?php

namespace Marktic\Billing\Invoices\Actions\Generator;

use Bytic\Actions\Action;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Invoices\Models\InvoiceInterface;

abstract class AbstractGenerator extends Action
{
    use Behaviours\CanCreateTrait;
    use Behaviours\HasBillingOwnerTrait;
    use Behaviours\HasCustomerPartyTrait;
    use Behaviours\HasInvoiceLinesTrait;
    use Behaviours\HasInvoiceTrait;
    use Behaviours\HasSubjectTrait;

    /**
     * @return Invoice
     */
    public function generate(): Invoice|InvoiceInterface
    {
        $this->initInvoice();
        $this->populateBillingOwner();
        $this->populateBillingSubject();
        $this->populateCustomerParty();
        $this->generateInvoiceItems();
        return $this->getInvoice();
    }


}