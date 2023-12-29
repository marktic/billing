<?php

namespace Marktic\Billing\BillingSubject\Models;

use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRecordTrait;

trait BillingSubjectRecordTrait
{
    use HasBillingStatusRecordTrait;
}