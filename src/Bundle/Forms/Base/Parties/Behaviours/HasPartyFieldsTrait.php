<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\Utility\BillingModels;

trait HasPartyFieldsTrait
{
    protected $partyRepository;

    protected function initializePartyFields($mandatory = true)
    {
        $this->partyRepository = BillingModels::parties();
        $this->addRadioGroup('party[type]', $this->partyRepository->getLabel('form.type'), $mandatory);
        $typeSelect = $this->getElement('party[type]');
        $typeSelect->addOption('person', $this->partyRepository->getLabel('form.type.person'));
        $typeSelect->addOption('legal_entity', $this->partyRepository->getLabel('form.type.legal_entity'));
        $typeSelect->setValue('person');
    }

    protected function setPartyFieldsMandatory($mandatory = true): void
    {
        $this->getElement('party[type]')->setRequired($mandatory);
    }

    protected function getDataFromModelPartyFields()
    {

        $value = $this->getModel()->isCompany() ? 'legal_entity' : 'person';
        $this->getElement('party[type]')->getData($value, 'model');
    }

    protected function processValidationPartyFields()
    {
    }

}