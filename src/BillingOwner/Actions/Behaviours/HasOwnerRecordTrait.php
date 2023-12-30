<?php

namespace Marktic\Billing\BillingOwner\Actions\Behaviours;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Parties\Actions\BillingPartyCreateForSubject;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Records\Record;

/**
 * @method Record getBillingOwner()
 */
trait HasOwnerRecordTrait
{
    protected Record|AdminOwner|null $owner = null;

    /**
     * @return Record|\Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRecordTrait
     */
    public function getOwner(): Record|AdminOwner
    {
        return $this->owner;
    }

    /**
     * @param Record|AdminOwner|null $owner
     * @return BillingPartyCreateForSubject|HasOwnerRecordTrait
     */
    public function withOwner(Record|AdminOwner|null $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    public function getOwnerType()
    {
        return BillingUtility::morphLabelFor($this->owner);
    }

    public function getOwnerId()
    {
        return $this->owner?->id;
    }

    protected function populateRecordWithOwner($record)
    {
        $record->owner = BillingUtility::morphLabelFor($this->owner);
        $record->owner_id = $this->owner?->id;
    }
}
