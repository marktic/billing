<?php

namespace Marktic\Billing\BillingSubject\Models;

use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRecordTrait;

trait BillingSubjectRecordTrait
{
    use HasBillingStatusRecordTrait;

    public function getBillingCurrency()
    {
        if (method_exists($this, 'getCurrency')) {
            $currency = $this->getCurrency();
            if ($currency === null) {
                return null;
            }
            if (is_string($currency)) {
                return $currency;
            }

            if (method_exists($currency, 'getCode')) {
                return $currency->getCode();
            }

            return (string) $currency;
        }
        return null;
    }
}