<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class Voided extends AbstractStatus
{
    use Behaviours\IsImmutableTrait;

    public const NAME = 'voided';
}