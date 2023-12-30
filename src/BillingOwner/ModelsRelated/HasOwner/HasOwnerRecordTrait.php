<?php

namespace Marktic\Billing\BillingOwner\ModelsRelated\HasOwner;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\BillingOwner\Dto\BillingOwner;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Records\Collections\Collection;
use Nip\Records\Record;

/**
 */
trait HasOwnerRecordTrait
{

    protected ?string $owner = null;

    protected ?int $owner_id = null;

    public function populateFromOwnerRecord(Record|BillingOwner $owner)
    {
        $this->setBillingOwner($owner);
    }

    public function setBillingOwner(Record|BillingOwner $owner): void
    {
        $this->owner_id = $owner->id;
        $this->owner = BillingUtility::morphLabelFor($owner);
    }

    public function getBillingOwner(): \Nip\Records\AbstractModels\Record|Collection|AdminOwner
    {
        if ($this->owner_id == 0 && $this->owner == 'admin') {
            return new AdminOwner();
        }
        return $this->getRelation('BillingOwner')->getResults();
    }

    /**
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }

    /**
     * @param string|null $owner
     */
    public function setOwner(?string $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return int|null
     */
    public function getOwnerId(): ?int
    {
        return $this->owner_id;
    }

    /**
     * @param int|null $owner_id
     */
    public function setOwnerId(?int $owner_id): void
    {
        $this->owner_id = $owner_id;
    }
}
