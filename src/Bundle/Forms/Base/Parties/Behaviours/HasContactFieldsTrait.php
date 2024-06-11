<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\Contacts\Actions\ContactsGenerate;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\Utility\BillingModels;

trait HasContactFieldsTrait
{
    protected $contactsRepository;

    protected $contactRecord = null;

    protected function initializeContactFields($mandatory = true): void
    {
        $this->contactsRepository = BillingModels::contacts();

        $this->addInput('contact[name]', $this->contactsRepository->getLabel('form.name'), $mandatory);
        $this->addInput('contact[telephone]', $this->contactsRepository->getLabel('form.telephone'), $mandatory);
        $this->addInput('contact[email]', $this->contactsRepository->getLabel('form.email'), $mandatory);
    }

    protected function setContactFieldsMandatory($mandatory = true): void
    {
        $this->getElement('contact[name]')->setRequired($mandatory);
        $this->getElement('contact[telephone]')->setRequired($mandatory);
        $this->getElement('contact[email]')->setRequired($mandatory);
    }

    protected function getDataFromModelBillingContact()
    {
        $this->contactRecord = $this->getBillingParty()->getBillingContact();
        if ($this->contactRecord instanceof Contact) {
            $this->getElement('contact[name]')->getData($this->contactRecord->getName(), 'model');
            $this->getElement('contact[telephone]')->getData($this->contactRecord->getTelephone(), 'model');
            $this->getElement('contact[email]')->getData($this->contactRecord->getEmail(), 'model');
        }
    }

    protected function processValidationBillingContact()
    {
    }

    protected function saveModelContact($party)
    {
        $data = $this->getData();

        $contact = $this->saveContact($data['contact']);
        PartyPopulateFrom::contact($party, $contact);
        return $contact;
    }

    /**
     * @param $data
     * @return Contact
     */
    protected function saveContact($data): Contact
    {
        if ($this->contactRecord instanceof Contact) {
            $this->contactRecord->fill($data);
            $this->contactRecord->save();

            return $this->contactRecord;
        }

        return $this->createContact($data);
    }

    protected function createContact($data): Contact
    {
        $action = ContactsGenerate::for($data);
        $action->withOwner($this->billingOwner);
        $action->orCreate();

        return $action->fetch();
    }
}