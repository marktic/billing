<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordTrait as HasStatusRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait NewsletterConsentTrait
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
            . ' #' . $this->series
            . ' - ' . $this->number;
    }
}
