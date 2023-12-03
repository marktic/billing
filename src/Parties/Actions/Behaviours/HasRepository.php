<?php

namespace Marktic\Billing\Parties\Actions\Behaviours;

use Marktic\Billing\Parties\Models\Parties;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\RecordManager;

trait HasRepository
{
    use \Marktic\Billing\Base\Actions\Behaviours\HasRepository;

    protected function generateRepository(): Parties|RecordManager
    {
        return BillingModels::parties();
    }
}