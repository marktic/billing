<?php

namespace Marktic\Billing\Parties\Models;

use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Contacts\ModelsRelated\HasContact\HasContactRecordTrait;
use Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity\HasLegalEntityRecordTrait;
use Marktic\Billing\PostalAddresses\ModelsRelated\HasPostalAddress\HasPostalAddressRecordTrait;

/**
 * Trait PartyTrait
 */
trait PartyTrait
{
    use RecordHasId;
    use RecordHasIdentifier;
    use RecordHasName;
    use HasOwnerRecordTrait;
    use HasSubjectRecordTrait;
    use HasLegalEntityRecordTrait;
    use HasPostalAddressRecordTrait;
    use HasContactRecordTrait;
    use TimestampableTrait;

    public function isCompany(): bool
    {
        return $this->hasLegalEntity();
    }

    public function isPerson(): bool
    {
        return $this->hasLegalEntity() === false;
    }
}
