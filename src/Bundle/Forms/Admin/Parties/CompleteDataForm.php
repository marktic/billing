<?php

declare(strict_types=1);


namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\LegalEntities\Actions\LegalEntitiesGenerate;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\Record;

class CompleteDataForm extends AbstractForm
{
    protected $partyRepository;

    protected $contactsRepository;
    protected $legalEntityRepository;
    protected $postalAddressesRepository;
    protected AdminOwner|Record $owner;

    public function initialize(): void
    {
        parent::initialize();

        $this->initializePartyFields();
        $this->initializeLegalEntityFields();
        $this->initializeContactFields();
        $this->initializePostalAddressesFields();
    }

    protected function initializePartyFields()
    {
        $this->partyRepository = BillingModels::parties();
        $this->addSelect('party[type]', $this->partyRepository->getLabel('form.type'), true);
        $typeSelect = $this->getElement('party[type]');
        $typeSelect->addOption('person', $this->partyRepository->getLabel('form.type.person'));
        $typeSelect->addOption('legal_entity', $this->partyRepository->getLabel('form.type.legal_entity'));

    }

    protected function initializeLegalEntityFields()
    {
        $this->legalEntityRepository = BillingModels::legalEntities();

        $this->addInput('legal_entity[name]', $this->partyRepository->getLabel('form.legal_entity.name'), true);
        $this->addInput('legal_entity[identification]', $this->partyRepository->getLabel('form.legal_entity.identification'), true);
        $this->addInput('legal_entity[registration_number]', $this->partyRepository->getLabel('form.legal_entity.registration_number'), true);
    }

    protected function initializeContactFields(): void
    {
        $this->contactsRepository = BillingModels::contacts();

        $this->addInput('contact[name]', $this->contactsRepository->getLabel('form.name'), true);
        $this->addInput('contact[telephone]', $this->contactsRepository->getLabel('form.telephone'), true);
        $this->addInput('contact[email]', $this->contactsRepository->getLabel('form.email'), true);
    }

    protected function initializePostalAddressesFields(): void
    {
        $this->postalAddressesRepository = BillingModels::postalAddresses();

        $this->addInput('postal_address[street_name]', $this->postalAddressesRepository->getLabel('form.street_name'), true);
        $this->addInput('postal_address[additional_street_name]', $this->postalAddressesRepository->getLabel('form.additional_street_name'), true);
        $this->addInput('postal_address[city_name]', $this->postalAddressesRepository->getLabel('form.city_name'), true);
        $this->addInput('postal_address[postal_zone]', $this->postalAddressesRepository->getLabel('form.postal_zone'), true);
        $this->addInput('postal_address[country_subentity]', $this->postalAddressesRepository->getLabel('form.country_subentity'), true);
        $this->addInput('postal_address[country]', $this->postalAddressesRepository->getLabel('form.country'), true);
    }

    public function saveToModel()
    {
        parent::saveToModel();
        $type = $this->getElement('party[type]')->getValue();
        if ($type == 'person') {
            $this->getModel()->name = $this->getElement('legal_entity[name]')->getValue();
            $this->getModel()->identification = $this->getElement('legal_entity[identification]')->getValue();
        } else {
            $this->getModel()->name = $this->getElement('contact[name]')->getValue();
            $this->getModel()->identification = '0';
        }
    }


    public function saveModel()
    {
        $data = $this->getData();

        $this->saveLegalEntity($data['legal_entity']);

        parent::saveModel();
    }

    protected function saveLegalEntity($data)
    {
        $action = LegalEntitiesGenerate::for($data);
        $action->withOwner($this->owner);
        $action->orCreate();

        return $action->fetch();
    }

    public function setOwner(AdminOwner|Record $owner)
    {
        $this->owner = $owner;
    }
}