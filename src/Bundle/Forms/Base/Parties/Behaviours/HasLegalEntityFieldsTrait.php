<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\LegalEntities\Actions\LegalEntitiesGenerate;
use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Utility\BillingModels;

trait HasLegalEntityFieldsTrait
{

    protected $legalEntityRepository;

    protected $legalEntityRecord = null;

    protected function initializeLegalEntityFields(): void
    {
        $this->legalEntityRepository = BillingModels::legalEntities();

        $this->addInput('legal_entity[name]', $this->legalEntityRepository->getLabel('form.name'), true);
        $this->addInput('legal_entity[identification]', $this->legalEntityRepository->getLabel('form.identification'), true);
        $this->addInput('legal_entity[registration_number]', $this->legalEntityRepository->getLabel('form.registration_number'), true);
    }

    protected function getDataFromModelLegalEntity()
    {
        $this->legalEntityRecord = $this->getModel()->getBillingLegalEntity();
        if ($this->legalEntityRecord instanceof LegalEntity) {
            $this->getElement('legal_entity[name]')->getData($this->legalEntityRecord->getName(), 'model');
            $this->getElement('legal_entity[identification]')->getData($this->legalEntityRecord->getIdentification(), 'model');
            $this->getElement('legal_entity[registration_number]')->getData($this->legalEntityRecord->registration_number, 'model');
        }
    }

    /**
     * @param $data
     * @return LegalEntity
     */
    protected function saveLegalEntity($data): LegalEntity
    {
        if ($this->legalEntityRecord instanceof LegalEntity) {
            $this->legalEntityRecord->fill($data);
            $this->legalEntityRecord->save();

            return $this->legalEntityRecord;
        }

        return $this->createLegalEntity($data);
    }

    protected function createLegalEntity($data): LegalEntity
    {
        $action = LegalEntitiesGenerate::for($data);
        $action->withOwner($this->owner);
        $action->orCreate();

        return $action->fetch();
    }

}