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
        <?php $event = $item->getEvent(); ?>
        <tr>
            <td>
                <?php if ($event) { ?>
                    <a href="<?php echo $event->getURL(); ?>" class="btn btn-xs btn-info btn-outline float-end">
                        ?
                    </a>
                <?php } ?>
                <?= $item->printNameHTML(); ?>
            </td>
            <td>
                <?= $item->quantity; ?>
                <?= $item->unit_name; ?>
            </td>
            <td>
                <?= $item->cost; ?>
                <?= $item->cost_type == 'percentage' ? '<sup>%</sup>' : '<sup>RON</sup>'; ?>

            </td>
            <td>
                <?= $item->getValue(); ?>
                <sup>RON</sup>
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