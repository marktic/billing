<?php

namespace Marktic\Billing\Invoices\Actions\Behaviours;

use Marktic\Billing\Invoices\Models\Invoices;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\RecordManager;

trait HasRepository
{
    use \Marktic\Billing\Base\Actions\Behaviours\HasRepository;

    protected function generateRepository(): Invoices|RecordManager
    {
        return BillingModels::invoices();
    }
}