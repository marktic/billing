<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class Issued extends AbstractStatus
{
    public const NAME = 'issued';

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'primary';
    }

    public function canDelete(): bool
    {
        return false;
    }
}