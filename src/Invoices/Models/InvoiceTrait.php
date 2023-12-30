<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordTrait as HasStatusRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\InvoiceStatuses\AbstractStatus;
use Marktic\Billing\Invoices\Models\Behaviours\HasTimestamps\HasTimestampsRecordTrait;
use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRecordTrait;
use Nip\Records\Collections\Collection;

/**
 * Trait InvoiceTrait
 * @method Collection|InvoiceLine[] getBillingLines()
 * @method AbstractStatus getStatusObject()
 */
trait InvoiceTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use HasSubjectRecordTrait;
    use HasCustomerPartyRecordTrait;
    use Behaviours\SerialNumberFormatter;
    use Behaviours\HasAmounts\HasAmountsRecordTrait;
    use RecordHasCurrency;
    use HasTimestampsRecordTrait;
    use HasStatusRecordTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getManager()->getLabel('title.singular')
            . ' #' . $this->getSeries()
            . ' - ' . $this->getNumber();
    }

    protected function getInvoiceId(): string
    {
        return $this->series . '-' . $this->number;
    }

}
