<?php

namespace Marktic\Billing\PostalAddresses\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class PostalAddresses
 * @package Marktic\Billing\PostalAddresses\Models
 */
class PostalAddresses extends RecordManager
{
    use PostalAddressesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_postal_addresses';
    public const CONTROLLER = 'mkt_billing-postal_addresses';
}
