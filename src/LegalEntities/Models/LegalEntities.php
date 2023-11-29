<?php

namespace Marktic\Billing\LegalEntities\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class LegalEntities
 * @package Marktic\Billing\LegalEntities\Models
 */
class LegalEntities extends RecordManager
{
    use LegalEntitiesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_legal_entities';
    public const CONTROLLER = 'mkt_billing_legal_entities';
}
