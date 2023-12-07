<?php

namespace Marktic\Billing\Parties\Actions\Populate;

use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Parties\Models\Party;

class PartyPopulateFrom
{
    public static function contact(Party &$party, Contact $contact)
    {
        $party->setIdentification($contact->getIdentification());
        $party->name = $contact->getName();
        $party->contact_id = $contact->getId();
    }

    public static function legalEntity(Party &$party, LegalEntity $entity)
    {
        $party->setIdentification($entity->getIdentification());
        $party->name = $entity->getName();
        $party->legal_entity_id = $entity->getId();
    }
}