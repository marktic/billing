<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

/**
 *
 */
class Issued extends AbstractStatus
{
    use Behaviours\IsImmutableTrait;

    public const NAME = 'issued';

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'primary';
    }

}