<?php
declare(strict_types=1);

use ByTIC\Icons\Icons;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;

/** @var InvoiceLine[] $items */
$items = $items ?? $this->items;
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?= translator()->trans('name'); ?></th>
        <th><?= translator()->trans('quantity'); ?></th>
        <th><?= translator()->trans('amount'); ?></th>
        <th><?= translator()->trans('total'); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item) { ?>
        <?php $subject = $item->getBillingSubject(); ?>
        <tr>
            <td>
                <?php if ($subject) { ?>
                    <a href="<?= $subject->getURL(); ?>" class="btn btn-xs btn-info btn-outline float-end">
                        ?
                    </a>
                <?php } ?>
                <?= $item->printNameHTML(); ?>
                <small class="d-block text-muted">
                    <?= $item->getDescription(); ?>
                </small>
            </td>
            <td>
                <?= $item->getQuantity(); ?>
                x
                <?= $item->getUnitName(); ?>
            </td>
            <td>
                <?= $item->getUnitPriceMoney()->formatBy('html'); ?>
            </td>
            <td>
                <?= $item->getTotalMoney()->formatBy('html'); ?>
            </td>
            <td>
                <a href="<?= $item->compileURL('edit'); ?>" class="btn btn-primary btn-xs">
                    <?= Icons::edit(); ?>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>