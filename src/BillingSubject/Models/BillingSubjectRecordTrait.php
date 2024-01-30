<?php

namespace Marktic\Billing\BillingSubject\Models;

use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRecordTrait;

trait BillingSubjectRecordTrait
{
    use HasBillingStatusRecordTrait;

    public function getBillingCurrency()
    {
        if (method_exists($this, 'getCurrency')) {
            return $this->getCurrency();
        }
        return null;
    }
}