<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\Parties\Actions\BillingPartyForSubject;
use Nip\Controllers\Response\ResponsePayload;
use Marktic\Billing\Bundle\Library\View\ViewUtility;
use Nip\View\View;

/**
 * @method ResponsePayload payload()
 * @method getModelFromRequest()
 */
trait PartySubjectControllerTrait
{
    use \Nip\Controllers\Traits\AbstractControllerTrait;

    protected function fillPayloadWithBillingParty($single = true): void
    {
        $model = $this->getModelFromRequest();
        $action = BillingPartyForSubject::for($model);
        $action->returnSingle($single);
        $this->payload()->set('billingParty', $action->handle());
    }

    public function registerViewPaths(View $view): void
    {
        parent::registerViewPaths($view);

        ViewUtility::registerViewPaths($view, 'admin');
    }
}
