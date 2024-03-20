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
$billingStatus = $billingStatus ?? null;

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
            <?= $invoiceRepository->getLabel('number'); ?>:
        </td>
        <td class="value">
            <?= $item->getNumber(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('amount'); ?>:
        </td>
        <td class="value">
            <?= $item->getAmountMoney()->formatBy('html'); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $invoiceRepository->getLabel('issued'); ?>:
        </td>
        <td class="value">
            <?= _strftime($item->issued_at); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('created'); ?>:
        </td>
        <td class="value">
            <?= _strftime($item->created_at); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= translator()->trans('status'); ?>:
        </td>
        <td class="value">
            <?php if ($itemIsSaved) { ?>
                <?= $this->load('/abstract/modules/item-actions/status-change', ['item' => $billingStatus, 'statuses' => $statuses]); ?>
            <?php } else { ?>
                <?= $selectedStatus->getLabelHTML(); ?>
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>