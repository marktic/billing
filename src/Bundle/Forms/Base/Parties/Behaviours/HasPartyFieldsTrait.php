<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\Utility\BillingModels;

trait HasPartyFieldsTrait
{
    protected $partyRepository;

    protected function initializePartyFields()
    {
        $this->partyRepository = BillingModels::parties();
        $this->addRadioGroup('party[type]', $this->partyRepository->getLabel('form.type'), true);
        $typeSelect = $this->getElement('party[type]');
        $typeSelect->addOption('person', $this->partyRepository->getLabel('form.type.person'));
        $typeSelect->addOption('legal_entity', $this->partyRepository->getLabel('form.type.legal_entity'));

    }

    protected function getDataFromModelPartyFields()
    {

        $value = $this->getModel()->isCompany() ? 'legal_entity' : 'person';
        $this->getElement('party[type]')->getData($value, 'model');
    }

}