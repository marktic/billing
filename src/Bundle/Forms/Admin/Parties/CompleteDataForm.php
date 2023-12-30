<?php

declare(strict_types=1);


namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\Parties\Models\Party;

/**
 * @method Party getModel
 */
class CompleteDataForm extends AbstractForm
{
    public function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->getDataFromModelOwner();
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
}
