<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

/**
 * Class Billed
 * @package Marktic\Billing\BillingStatuses\Statuses
 */
class Billed extends AbstractStatus
{
    public const NAME = self::BILLED;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'success';
    }
}
