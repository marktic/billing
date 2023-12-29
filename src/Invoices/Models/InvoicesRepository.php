<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRepository;

interface InvoicesRepository extends HasCustomerPartyRepository
{
    public const TABLE = 'mkt_billing_invoices';
    public const CONTROLLER = 'mkt_billing-invoices';

}