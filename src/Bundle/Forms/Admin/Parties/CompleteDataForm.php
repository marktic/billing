<?php

declare(strict_types=1);


namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\Contacts\Actions\ContactsGenerate;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\LegalEntities\Actions\LegalEntitiesGenerate;
use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\PostalAddresses\Actions\PostalAddressesGenerate;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\Record;

/**
 * @method Party getModel
 */
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

    public function saveModel()
    {
        $party = $this->getModel();
        $data = $this->getData();

        $contact = $this->saveContact($data['contact']);
        $type = $this->getElement('party[type]')->getValue();
        PartyPopulateFrom::contact($party, $contact);

        if ($type == 'legal_entity') {
            $legalEntity = $this->saveLegalEntity($data['legal_entity']);
            PartyPopulateFrom::legalEntity($party, $legalEntity);
        }
        $postalAddress = $this->savePostalAddress($data['postal_address']);
        PartyPopulateFrom::postalAddress($party, $postalAddress);

        parent::saveModel();
    }

    /**
     * @param $data
     * @return Contact
     */
    protected function saveContact($data): Contact
    {
        $action = ContactsGenerate::for($data);
        $action->withOwner($this->owner);
        $action->orCreate();

        return $action->fetch();
    }

    /**
     * @param $data
     * @return LegalEntity
     */
    protected function saveLegalEntity($data): LegalEntity
    {
        $action = LegalEntitiesGenerate::for($data);
        $action->withOwner($this->owner);
        $action->orCreate();

        return $action->fetch();
    }

    /**
     * @param $data
     * @return PostalAddress
     */
    protected function savePostalAddress($data): PostalAddress
    {
        $action = PostalAddressesGenerate::for($data);
        $action->withOwner($this->owner);
        $action->orCreate();

        return $action->fetch();
    }

    public function setOwner(AdminOwner|Record $owner)
    {
        $this->owner = $owner;
    }
}
