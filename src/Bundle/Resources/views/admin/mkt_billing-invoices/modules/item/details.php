<?php

use Marktic\Billing\Invoices\InvoiceStatuses\AbstractStatus;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingModels;

$invoiceRepository = BillingModels::invoices();

/** @var Invoice $item */
$item = $item ?? $this->item;
$itemIsSaved = $item->isInDB();

$itemSubject = $item->getBillingSubject();
$itemSubjectManager = $itemSubject->getManager();

$selectedStatus = $item->getStatus();

/** @var AbstractStatus[] $statuses */
$statuses = $this->statuses;
?>
<table class="details table table-striped">
    <tbody>
    <tr>
        <td class="name">
            <?= $itemSubjectManager ? $itemSubjectManager->getLabel('title.singular') : '-'; ?>:
        </td>
        <td class="value">
            <?php if ($itemSubject) { ?>
                <a href="<?= $itemSubject->getURL(); ?>">
                    <?= $itemSubject->getName(); ?>
                </a>
            <?php } else { ?>
                ----
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $invoiceRepository->getLabel('series'); ?>:
        </td>
        <td class="value">
            <?= $item->getSeries(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $invoiceRepository->getLabel('number'); ?>:</td>
        <td class="value">
            <?= $item->getNumber(); ?></td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('amount'); ?>:</td>
        <td class="value">
            <?= $item->getAmountMoney()->formatBy('html'); ?></td>
    </tr>
    <tr>
        <td class="name">
            <?= $invoiceRepository->getLabel('issued'); ?>:</td>
        <td class="value">
            <?php echo _strftime($item->issued_at); ?></td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('created'); ?>:</td>
        <td class="value">
            <?php echo _strftime($item->created_at); ?></td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('status'); ?>:
        </td>
        <td class="value">
            <?= $selectedStatus->getLabelHTML(); ?>

            <?php if ($itemIsSaved) { ?>
                <div class="btn-group right">
                    <a class="btn dropdown-toggle btn-xs btn-primary" data-bs-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-pencil glyphicon-white"></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <?php foreach ($statuses as $status) { ?>
                            <?php if ($status->getName() != $selectedStatus->getName()) { ?>
                                <li>
                                    <a href="<?= $invoiceRepository->compileURL(
                                        'changeStatus',
                                        ['id' => $item->getId(), 'status' => $status->getName()]
                                    ); ?>">
                                        <?= $status->getLabel(); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>