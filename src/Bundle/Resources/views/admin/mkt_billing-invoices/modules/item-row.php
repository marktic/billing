<?php

use ByTIC\Icons\Icons;
use Marktic\Billing\Invoices\Models\Invoice;

/** @var Invoice $item */
$customerParty = $item->getCustomerParty();
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
        <?php if ($customerParty) { ?>
            <?= $customerParty->isCompany() ? Icons::building() : Icons::user(); ?>
            <?= $customerParty->getName(); ?>
        <?php } else { ?>
            ---
        <?php } ?>
    </td>
    <td>
        C: <?= _strftime($item->issued_at); ?>
        I: <?= _strftime($item->created_at); ?>
    </td>
    <td>
        <?= $item->getStatus()->getLabelHTML(); ?>
    </td>
</tr