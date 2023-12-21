<?php

namespace Marktic\Billing\LegalEntities\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\LegalEntity\LegalEntity as eLegalEntity;
use Marktic\Billing\LegalEntities\Models\LegalEntity;

class LegalEntityGenerate extends Action
{
    protected LegalEntity $legalEntity;

    protected eLegalEntity $eLegalEntity;

    public static function for(LegalEntity $legalEntity): self
    {
        $action = new static();
        $action->legalEntity = $legalEntity;
        return $action;
    }

    public function handle(): eLegalEntity
    {
        $this->eLegalEntity = $this->newELegalEntity();
        $this->populateAttributes();
        return $this->eLegalEntity;
    }

    protected function populateAttributes(): void
    {
        $this->eLegalEntity->setRegistrationName($this->legalEntity->getName());
        $this->eLegalEntity->setCompanyId($this->legalEntity->getIdentification());
        $this->eLegalEntity->setCompanyLegal($this->legalEntity->getName());
    }

    protected function newELegalEntity(): eLegalEntity
    {
        return new eLegalEntity();
    }
}