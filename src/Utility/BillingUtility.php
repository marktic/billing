<?php

namespace Marktic\Billing\Utility;

use Marktic\Billing\Base\Dto\AdminOwner;

class BillingUtility
{
    public static function morphLabelFor($record)
    {
        if ($record instanceof AdminOwner) {
            return $record->type;
        }
        return $record ? $record->getManager()->getController() : null;
    }
}