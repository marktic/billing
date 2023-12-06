<?php

namespace Marktic\Billing\Parties\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Parties
 * @package Marktic\Billing\Parties\Models
 */
class Parties extends RecordManager
{
    use PartiesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_parties';
    public const CONTROLLER = 'mkt_billing-parties';
}
