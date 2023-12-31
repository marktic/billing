<?php

namespace Marktic\Billing\Invoices\InvoiceStatuses\Behaviours;

trait IsImmutableTrait
{

    public function canEdit(): bool
    {
        return false;
    }

    public function canDelete(): bool
    {
        return false;
    }
}

