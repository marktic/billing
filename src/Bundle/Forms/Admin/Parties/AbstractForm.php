<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasContactFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasLegalEntityFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPartyFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPostalAddressesFieldsTrait;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\Bundle\Library\Form\FormModel;
use Nip\Records\Record;

/**
 * @method Party getModel()
 */
abstract class AbstractForm extends FormModel
{
    protected AdminOwner|Record $owner;

    use HasPartyFieldsTrait;
    use HasLegalEntityFieldsTrait;
    use HasContactFieldsTrait;
    use HasPostalAddressesFieldsTrait;

    public function initialize(): void
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-billing-party-form');
        $this->addButton('save', translator()->trans('submit'));

        $this->initializePartyFields();
        $this->initializeLegalEntityFields();
        $this->initializeContactFields();
        $this->initializePostalAddressesFields();
    }

    public function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->getDataFromModelPartyFields();
        $this->getDataFromModelLegalEntity();
        $this->getDataFromModelContact();
        $this->getDataFromModelPostalAddresses();
    }

    public function setOwner(AdminOwner|Record $owner)
    {
        $this->owner = $owner;
    }

    public function getDataFromModelOwner()
    {
        $this->owner = $this->getModel()->getBillingOwner();
    }
}
