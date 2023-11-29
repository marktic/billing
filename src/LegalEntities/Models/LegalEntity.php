<?php

namespace Marktic\Billing\LegalEntities\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class LegalEntity
 * @package Marktic\Billing\LegalEntities\Models
 */
class LegalEntity extends Record
{
    use LegalEntityTrait;
    use CommonRecordTrait;

}
