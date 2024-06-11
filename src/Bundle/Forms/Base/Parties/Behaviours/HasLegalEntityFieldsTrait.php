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

    protected function initializeLegalEntityFields($mandatory = true): void
    {
        $this->legalEntityRepository = BillingModels::legalEntities();

        $this->addInput('legal_entity[name]', $this->legalEntityRepository->getLabel('form.name'), false);
        $this->addInput('legal_entity[identification]', $this->legalEntityRepository->getLabel('form.identification'), false);
        $this->addInput('legal_entity[trading_id]', $this->legalEntityRepository->getLabel('form.trading_id'), false);
    }

    protected function setLegalEntityFieldsMandatory($mandatory = true): void
    {
        $this->getElement('legal_entity[name]')->setRequired($mandatory);
        $this->getElement('legal_entity[identification]')->setRequired($mandatory);
        $this->getElement('legal_entity[trading_id]')->setRequired($mandatory);
    }

    protected function getDataFromModelLegalEntity()
    {
        $this->legalEntityRecord = $this->getBillingParty()->getBillingLegalEntity();
        if ($this->legalEntityRecord instanceof LegalEntity) {
            $this->getElement('legal_entity[name]')->getData($this->legalEntityRecord->getName(), 'model');
            $this->getElement('legal_entity[identification]')->getData($this->legalEntityRecord->getIdentification(), 'model');
            $this->getElement('legal_entity[trading_id]')->getData($this->legalEntityRecord->trading_id, 'model');
        }
    }

    protected function processValidationLegalEntity()
    {
        if (false == $this->hasPartyLegalEntity()) {
            return null;
        }

        foreach (['name', 'identification', 'trading_id'] as $field) {
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
            $existing = $this->legalEntityRecord->exists();
            if ($existing) {
                $existing->fill($data);
                $this->legalEntityRecord = $existing;
            }

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