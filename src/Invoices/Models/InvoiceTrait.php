<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\DataObjects\Casts\Metadata\AsMetadataObject;
use ByTIC\DataObjects\Casts\Metadata\Metadata;
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
 *
 * @property string|Metadata $metadat
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

    public function __construct()
    {
        parent::__construct();

        $this->addCast('metadata', AsMetadataObject::class . ':json');
    }

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

    public function getExternalLink()
    {
        return $this->metadata->get(Invoice::METADATA_EXTERNAL_LINK);
    }

    public function setExternalLink($link): self
    {
        $this->metadata->set(Invoice::METADATA_EXTERNAL_LINK, $link);
        return $this;
    }

    public function hasExternalLink(): bool
    {
        return $this->metadata->has(Invoice::METADATA_EXTERNAL_LINK);
    }
}
