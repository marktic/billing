<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait InvoiceTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
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
