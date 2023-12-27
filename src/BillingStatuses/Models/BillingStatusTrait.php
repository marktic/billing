<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait BillingStatusTrait
 */
trait BillingStatusTrait
{
    use RecordHasId;
    use HasSubjectRecordTrait;
    use Behaviours\HasStatus\HasStatusRecordTrait;
    use TimestampableTrait;
}
