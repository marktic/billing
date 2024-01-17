<?php

use Marktic\Billing\LegalEntities\Models\LegalEntity;
use Marktic\Billing\Utility\BillingModels;

/** @var LegalEntity $item */
$item = $item ?: ($this->billingLegalEntity ?? null);
if (!$item) {
    return;
}
?>
<tr>
    <td>
        <?= BillingModels::contacts()->getLabel('title.singular'); ?>
    </td>
    <td>
        <?= $item->getName() ?>
    </td>
</tr>
<tr>
    <td>
        <?= translator()->trans('email'); ?>
    </td>
    <td>
        <?= $item->getEmail() ?>
    </td>
</tr>
<tr>
    <td>
        <?= translator()->trans('telephone'); ?>
    </td>
    <td>
        <?= $item->getTelephone() ?>
    </td>
</tr>
