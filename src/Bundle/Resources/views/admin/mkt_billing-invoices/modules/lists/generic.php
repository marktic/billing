<?php

use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingModels;

/** @var Invoice[] $items */
$items = $items ?? $this->invoices;
?>
<?php if (count($items) < 1) { ?>
    <?= $this->Messages()->info(BillingModels::invoices()->getMessage('dnx')); ?>
    <?php return; ?>
<?php } ?>
<table class="details table table-striped">
    <thead>
    <tr>
        <th><?= translator()->trans('name'); ?></th>
        <th class="col-md-2"><?= translator()->trans('amount'); ?></th>
        <th class="col-md-2"><?= translator()->trans('date'); ?></th>
        <th class="col-md-2"><?= translator()->trans('status'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item) { ?>
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
        </tr>
    <?php } ?>
    </tbody>
</table>