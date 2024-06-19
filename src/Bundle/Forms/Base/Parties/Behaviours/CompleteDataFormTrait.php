<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasContactFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasLegalEntityFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPartyFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPostalAddressesFieldsTrait;
use Nip\Records\Record;

trait CompleteDataFormTrait
{
    protected AdminOwner|Record $billingOwner;

    use HasPartyFieldsTrait;
    use HasLegalEntityFieldsTrait;
    use HasContactFieldsTrait;
    use HasPostalAddressesFieldsTrait;

    protected function initializeBillingFields($mandatory = true): void
    {
        $this->initializePartyFields($mandatory);
        $this->initializeLegalEntityFields($mandatory);
        $this->initializeContactFields($mandatory);
        $this->initializePostalAddressesFields($mandatory);
    }
    
    protected function setBillingFieldsMandatory($mandatory = true): void
    {
        $this->setPartyFieldsMandatory($mandatory);

        // Not mandatory unless type is legal entity
//        $this->setLegalEntityFieldsMandatory($mandatory);

        $this->setContactFieldsMandatory($mandatory);
        $this->setPostalAddressesFieldsMandatory($mandatory);
    }

    public function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->getDataFromModelBillingFields();
    }

    public function getDataFromModelBillingFields(): void
    {
        $this->getDataFromModelPartyFields();
        $this->getDataFromModelLegalEntity();
        $this->getDataFromModelBillingContact();
        $this->getDataFromModelPostalAddresses();
    }
    public function processValidation()
    {
        parent::processValidation();
        $this->processValidationBillingFields();
    }
    public function processValidationBillingFields(): void
    {
        $this->processValidationPartyFields();
        $this->processValidationLegalEntity();
        $this->processValidationBillingContact();
        $this->processValidationPostalAddresses();
    }

    abstract protected function getBillingParty();

    public function saveModelBillingFields(): void
    {
        $party = $this->getBillingParty();

        $this->saveModelContact($party);
        $this->saveModelLegalEntity($party);
        $this->saveModelPostalAddress($party);
        $party->save();
    }

    public function setBillingOwner(AdminOwner|Record $billingOwner)
    {
        $this->billingOwner = $billingOwner;
    }

    public function getDataFromModelOwner(): void
    {
        $this->billingOwner = $this->getModel()->getBillingOwner();
    }
}

