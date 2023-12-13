<?php

namespace Marktic\Billing\ExternalSystems\Communications\Models;

use Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 */
trait CommunicationTrait
{
    use RecordHasId;
    use HasSubjectRecordTrait;
    use TimestampableTrait;

}
