<?php

namespace Marktic\Billing\ExternalSystems\Communications\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Invoices
 * @package Marktic\Billing\Invoices\Models
 */
class Communications extends RecordManager
{
    use CommunicationsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_external_communications';
    public const CONTROLLER = 'mkt_billing-external_communications';
}
