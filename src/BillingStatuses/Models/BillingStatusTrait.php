<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Invoices\ModelsRelated\HasInvoice\HasInvoiceRecordTrait;
use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRecordTrait;

/**
 * Trait BillingStatusTrait
 */
trait BillingStatusTrait
{
    use RecordHasId;
    use HasSubjectRecordTrait;
    use HasCustomerPartyRecordTrait;
    use HasInvoiceRecordTrait;
    use Behaviours\HasStatus\HasStatusRecordTrait;
    use Behaviours\HasAmounts\HasAmountsRecordTrait;
    use RecordHasCurrency;
    use TimestampableTrait;

    public function getName()
    {
        return $this->getManager()->getLabel('title.singular') . ' ' . $this->id;
    }
}
