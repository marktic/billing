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
        <?= BillingModels::legalEntities()->getLabel('title.singular'); ?>
    </td>
    <td>
        <?= $item->getName() ?>
    </td>
</tr>

<tr>
    <td>
        <?= BillingModels::legalEntities()->getLabel('form.identification'); ?>
    </td>
    <td>
        <?= $item->getIdentification() ?>
    </td>
</tr>

