<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class Overdue extends AbstractStatus
{
    use Behaviours\IsImmutableTrait;

    public const NAME = 'overdue';
}