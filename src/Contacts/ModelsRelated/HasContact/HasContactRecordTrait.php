<?php

namespace Marktic\Billing\Contacts\ModelsRelated\HasContact;

use Marktic\Billing\Contacts\Models\Contact;

/**
 * @method Contact getBillingContact()
 */
trait HasContactRecordTrait
{
    protected ?int $contact_id = null;


    public function getContactId(): ?int
    {
        return $this->contact_id;
    }

    public function setContactId(?int $legal_entity_id): void
    {
        $this->contact_id = $legal_entity_id;
    }
}
