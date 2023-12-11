<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class Paid extends AbstractStatus
{
    public const NAME = 'paid';

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'success';
    }
}