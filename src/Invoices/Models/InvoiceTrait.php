<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\Invoices\Models\Traits\SerialNumberFormatter;

/**
 * Trait NewsletterConsentTrait
 */
trait InvoiceTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use SerialNumberFormatter;
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
