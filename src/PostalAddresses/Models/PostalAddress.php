<?php

namespace Marktic\Billing\PostalAddresses\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class PostalAddress
 * @package Marktic\Billing\PostalAddresses\Models
 */
class PostalAddress extends Record
{
    use PostalAddressTrait;
    use CommonRecordTrait;

}
