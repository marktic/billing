<?php

use Marktic\Billing\Invoices\Models\Invoice;

/** @var Invoice $item */
?>
<tr>
    <td>
        <a href="<?= $item->getURL(); ?>">
            <?= $item->getName(); ?>
        </a>
    </td>
    <td>
        <?= $item->getAmountMoney()->formatBy('html'); ?>
    </td>
    <td>
        C: <?= _strftime($item->issued_at); ?>
        I: <?= _strftime($item->created_at); ?>
    </td>
    <td>
        <?= $item->getStatus()->getLabelHTML(); ?>
    </td>
</tr