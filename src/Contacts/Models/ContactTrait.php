<?php

namespace Marktic\Billing\Contacts\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRecordTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait ContactTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use RecordHasIdentifier;
    use RecordHasName;
    use TimestampableTrait;
    protected $telephone = null;
    protected $email = null;

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
