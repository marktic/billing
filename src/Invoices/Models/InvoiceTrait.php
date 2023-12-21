<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordTrait as HasStatusRecordTrait;
use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Parties\Models\Party;
use Nip\Records\Collections\Collection;

/**
 * Trait NewsletterConsentTrait
 * @method Collection|InvoiceLine[] getBillingLines()
 * @method Party getCustomerParty()
 */
trait InvoiceTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use HasSubjectRecordTrait;
    use Behaviours\SerialNumberFormatter;
    use Behaviours\HasAmounts\HasAmountsRecordTrait;
    use RecordHasCurrency;
    use TimestampableTrait;
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
