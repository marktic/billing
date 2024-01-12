<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\CompleteDataFormTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasContactFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasLegalEntityFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPartyFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPostalAddressesFieldsTrait;
use Marktic\Billing\Bundle\Library\Form\FormModel;
use Marktic\Billing\Parties\Models\Party;
use Nip\Records\Record;

/**
 * @method Party getModel()
 */
abstract class AbstractForm extends FormModel
{
    use CompleteDataFormTrait;

    public function initialize(): void
    {
        parent::initialize();

        $this->addClass('mkt_billing_party_form');
        $this->addButton('save', translator()->trans('submit'));

        $this->initializeBillingFields();
    }

    protected function getBillingParty()
    {
        return $this->getModel();
    }
}
