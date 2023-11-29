<?php

namespace Marktic\Billing\InvoiceLines\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\Invoices\ModelsRelated\HasInvoice\HasInvoiceRecordTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait InvoiceLineTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use HasInvoiceRecordTrait;
    use TimestampableTrait;

    protected ?string $name = null;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
