<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\LegalEntities\Actions\LegalEntitiesGenerate;
use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\Utility\BillingModels;

trait HasLegalEntityFieldsTrait
{

    protected $legalEntityRepository;

    protected $legalEntityRecord = null;

    protected function initializeLegalEntityFields(): void
    {
        $this->legalEntityRepository = BillingModels::legalEntities();

        $this->addInput('legal_entity[name]', $this->legalEntityRepository->getLabel('form.name'), false);
        $this->addInput('legal_entity[identification]', $this->legalEntityRepository->getLabel('form.identification'), false);
        $this->addInput('legal_entity[registration_number]', $this->legalEntityRepository->getLabel('form.registration_number'), false);
    }

    protected function getDataFromModelLegalEntity()
    {
        $this->legalEntityRecord = $this->getBillingParty()->getBillingLegalEntity();
        if ($this->legalEntityRecord instanceof LegalEntity) {
            $this->getElement('legal_entity[name]')->getData($this->legalEntityRecord->getName(), 'model');
            $this->getElement('legal_entity[identification]')->getData($this->legalEntityRecord->getIdentification(), 'model');
            $this->getElement('legal_entity[registration_number]')->getData($this->legalEntityRecord->registration_number, 'model');
        }
    }

    protected function processValidationLegalEntity()
    {
        if (false == $this->hasPartyLegalEntity()) {
            return null;
        }

        foreach (['name','identification','registration_number'] as $field) {
            $element = $this->getElement('legal_entity[' . $field . ']');
            $element->setRequired(true);
            $element->validate();
        }
    }

    protected function saveModelLegalEntity($party)
    {
        if (false == $this->hasPartyLegalEntity()) {
            return null;
        }

        $data = $this->getData();
        $legalEntity = $this->saveLegalEntity($data['legal_entity']);
        PartyPopulateFrom::legalEntity($party, $legalEntity);
        return $legalEntity;
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
        $action->withOwner($this->billingOwner);
        $action->orCreate();

        return $action->fetch();
    }

    protected function hasPartyLegalEntity()
    {
        return $this->getElement('party[type]')->getValue() == 'legal_entity';
    }
}