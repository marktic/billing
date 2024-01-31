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
        <?= $item ? $item->getName() : '--'; ?>
    </td>
</tr>
<tr>
    <td>
        <?= translator()->trans('identification'); ?>
    </td>
    <td>
        <?= $item ? $item->getIdentification() : '--'; ?>
    </td>
</tr>

<tr>
    <td>
        <?= translator()->trans('email'); ?>
    </td>
    <td>
        <?= $item ? $item->getEmail() : '--' ?>
    </td>
</tr>
<tr>
    <td>
        <?= translator()->trans('telephone'); ?>
    </td>
    <td>
        <?= $item ? $item->getTelephone() : '--' ?>
    </td>
</tr>