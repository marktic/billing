<?php

use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\Utility\BillingModels;

/** @var BillingStatus $billingStatus */
$billingStatus = $billingStatus ?? ($this->item instanceof BillingStatus ? $this->item : null);

$billingStatusesRepository = $billingStatusesRepository ?? BillingModels::billingStatuses();

/** @var Marktic\Billing\BillingStatuses\Statuses\AbstractStatus[] $statuses */
$statuses = $this->billingStatuses ?? $billingStatusesRepository->getStatuses();
$customerParty = $billingStatus?->getCustomerParty();
?>

<table class="details table table-striped">
    <tbody>
    <tr>
        <td class="name">
            <?= BillingModels::parties()->getLabel('title.singular'); ?>:
        </td>
        <td class="value">
            <?php if ($customerParty) { ?>
                <a href="<?= $customerParty->compileURL('edit'); ?>">
                    <?= $customerParty->getName(); ?>
                </a>
            <?php } else { ?>
                ---
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $billingStatusesRepository->getLabel('amount'); ?>:
        </td>
        <td class="value">
            <?= $billingStatus?->getAmountMoney()->formatByHtml(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $billingStatusesRepository->getLabel('billed'); ?>:
        </td>
        <td class="value">
            <?= $billingStatus?->getAmountBilledMoney()->formatByHtml(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $billingStatusesRepository->getLabel('title.singular'); ?>:
        </td>
        <td class="value">
            <?=
            $billingStatus
                ? $this->load('/abstract/modules/item-actions/status-change', ['item' => $billingStatus, 'statuses' => $statuses])
                : '';
            ?>
        </td>
    </tr>
    </tbody>
</table>
