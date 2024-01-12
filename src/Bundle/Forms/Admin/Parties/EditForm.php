<?php

declare(strict_types=1);


namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Parties\Actions\Populate\PartyPopulateFrom;
use Marktic\Billing\Parties\Models\Party;

/**
 * @method Party getModel
 */
class EditForm extends AbstractForm
{
    public function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->getDataFromModelOwner();
    }

    public function saveModel(): void
    {
        $this->saveModelBillingFields();

        parent::saveModel();
    }
}
