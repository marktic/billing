<?php

namespace Marktic\Billing\Contacts\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Contacts
 * @package Marktic\Billing\Contacts\Models
 */
class Contacts extends RecordManager
{
    use ContactsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_contacts';
    public const CONTROLLER = 'mkt_billing-contacts';
}
