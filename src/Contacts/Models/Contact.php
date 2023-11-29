<?php

namespace Marktic\Billing\Contacts\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class Contact
 * @package Marktic\Billing\Contacts\Models
 */
class Contact extends Record
{
    use ContactTrait;
    use CommonRecordTrait;

}
