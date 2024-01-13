<?php

namespace Marktic\Billing\Parties\Actions\Populate;

use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;

class PartyPopulateFrom
{
    public static function contact(Party &$party, Contact $contact): void
    {
//        $party->setIdentification($contact->getIdentification());
        $party->name = $contact->getName();
        $party->contact_id = $contact->getId();
    }

    public static function legalEntity(Party &$party, LegalEntity $entity): void
    {
//        $party->setIdentification($entity->getIdentification());
        $party->name = $entity->getName();
        $party->legal_entity_id = $entity->getId();
    }
    public static function postalAddress(Party &$party, PostalAddress $address): void
    {
        $party->postal_address_id = $address->getId();
    }
}