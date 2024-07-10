<?php

namespace Marktic\Billing\Parties\Actions\Transformation;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Parties\Models\Party;

/**
 * @method Party getSubject()
 */
class PartiesConvertToPerson extends Action
{
    use HasSubject;

    public function handle()
    {
        $this->handleConversion();
    }

    protected function handleConversion()
    {
        $legalEntity = $this->getSubject()->getBillingLegalEntity();
        if (!$legalEntity) {
            return;
        }
        $this->getSubject()->setLegalEntityId(null);
        $this->getSubject()->save();
    }
}
