<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasOwner;

use Marktic\Billing\Base\Dto\AdminOwner;
use Nip\Records\Collections\Collection;
use Nip\Records\Record;

/**
 */
trait HasOwnerRecordTrait
{

    protected ?string $owner = null;

    protected ?int $owner_id = null;

    public function populateFromOwnerRecord(Record $owner)
    {
        $this->owner_id = $owner->id;

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
