<?php

namespace Marktic\Billing\LegalEntities\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRecordTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait LegalEntityTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use RecordHasIdentifier;
    use RecordHasName;
    use TimestampableTrait;

    protected $trading_id = null;
}
