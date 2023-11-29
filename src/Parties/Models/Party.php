<?php

namespace Marktic\Billing\Parties\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Marktic\Billing\Parties\Dto\PartyInterface;
use Nip\Records\Record;

/**
 * Class Party
 * @package Marktic\Billing\Parties\Models
 */
class Party extends Record implements PartyInterface
{
    use PartyTrait;
    use CommonRecordTrait;

}
