<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class PartiallyPaid extends AbstractStatus
{
    public const NAME = 'partially_paid';

    public function canDelete(): bool
    {
        return false;
    }
}