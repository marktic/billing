<?php

namespace Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity;

use Nip\Records\Record;

/**
 * @method Record getBillingOwner()
 */
trait HasLegalEntityRecordTrait
{
    protected ?int $legal_entity_id = null;

    public function getLegalEntityId(): ?int
    {
        return $this->legal_entity_id;
    }

    public function setLegalEntityId(?int $legal_entity_id): void
    {
        $this->legal_entity_id = $legal_entity_id;
    }

    public function hasLegalEntity(): bool
    {
        return $this->getLegalEntityId() !== null;
    }
}
