<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\Bundle\Forms\Admin\BillingStatuses\DetailsForm;
use Nip\Records\AbstractModels\Record;

trait BillingStatusesControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\HasStatus;
    use Behaviours\HasFormsTrait;

    /**
     * @param BillingStatus $item
     * @return bool
     */
    protected function checkItemAccess($item)
    {
        if (parent::checkItemAccess($item) === false) {
            return false;
        }

        if (false === ($item->getBillingSubject() instanceof Record)) {
            return true;
        }
        return true;
    }

    protected function afterActionUrlDefault($type, $item = null)
    {
        if ($item) {
            return $item->getBillingSubject()->compileURL('view');
        }
        return parent::afterActionUrlDefault($type, $item);
    }

    protected function getModelFormClass($model, $action = null): ?string
    {
        return match ($action) {
            default => DetailsForm::class,
        };
    }
}