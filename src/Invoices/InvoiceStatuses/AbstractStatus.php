<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses;

use ByTIC\Models\SmartProperties\Properties\Statuses\Generic;

abstract class AbstractStatus extends Generic
{
    public const NAME = null;

    protected function generateName(): string
    {
        return static::NAME;
    }

    public function canEdit(): bool
    {
        return true;
    }

    public function canDelete(): bool
    {
        return true;
    }
}