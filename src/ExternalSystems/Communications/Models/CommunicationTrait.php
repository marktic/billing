<?php

namespace Marktic\Billing\ExternalSystems\Communications\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRecordTrait;

/**
 */
trait CommunicationTrait
{
    use RecordHasId;
    use HasSubjectRecordTrait;
    use TimestampableTrait;

}
