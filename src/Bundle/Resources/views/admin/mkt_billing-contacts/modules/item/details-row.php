<?php

use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\Utility\BillingModels;

/** @var Contact $item */
$item = $item ?: ($this->billingContact ?? null);
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
        <?= translator()->trans('identification'); ?>
    </td>
    <td>
        <?= $item->getIdentification() ?>
    </td>
</tr>
