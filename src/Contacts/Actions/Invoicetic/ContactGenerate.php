<?php

namespace Marktic\Billing\Contacts\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\Contact\Contact as eContact;
use Marktic\Billing\Contacts\Models\Contact;

class ContactGenerate extends Action
{
    protected Contact $contact;

    protected eContact $eContact;

    public static function for(Contact $party): self
    {
        $action = new static();
        $action->contact = $party;
        return $action;
    }

    public function handle(): eContact
    {
        $this->eContact = $this->newEContact();
        $this->populateAttributes();
        return $this->eContact;
    }

    protected function populateAttributes(): void
    {
        $this->eContact->setName($this->contact->getName());
        $this->eContact->setTelephone($this->contact->getTelephone());
        $this->eContact->setEmail($this->contact->getEmail());
    }

    protected function newEContact(): eContact
    {
        return new eContact();
    }
}
