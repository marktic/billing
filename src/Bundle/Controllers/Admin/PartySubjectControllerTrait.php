<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\Parties\Actions\BillingPartyForSubject;
use Nip\Controllers\Response\ResponsePayload;

/**
 * @method ResponsePayload payload()
 * @method getModelFromRequest()
 */
trait PartySubjectControllerTrait
{
    use AbstractControllerTrait;

    protected function fillPayloadWithBillingParty($single = true): void
    {
        $model = $this->getModelFromRequest();
        $action = BillingPartyForSubject::for($model);
        $action->returnSingle($single);

        $this->payload()->with([
            'billingParty' => $action->handle(),
            'billingPartyCreateUrl' => $action->getCreateUrl(),
        ]);
    }
}
