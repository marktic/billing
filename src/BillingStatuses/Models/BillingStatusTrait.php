<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRecordTrait;

/**
 * Trait BillingStatusTrait
 */
trait BillingStatusTrait
{
    use RecordHasId;
    use HasSubjectRecordTrait;
    use HasCustomerPartyRecordTrait;
    use Behaviours\HasStatus\HasStatusRecordTrait;
    use RecordHasCurrency;
    use TimestampableTrait;
}
