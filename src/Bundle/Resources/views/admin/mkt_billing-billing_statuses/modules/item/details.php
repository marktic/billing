<?php

use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\Utility\BillingModels;

/** @var BillingStatus $billingStatus */
$billingStatus = $billingStatus ?? $this->item;

$billingStatusesRepository = $billingStatusesRepository ?? BillingModels::billingStatuses();

/** @var Marktic\Billing\BillingStatuses\Statuses\AbstractStatus[] $statuses */
$statuses = $this->billingStatuses ?? $billingStatusesRepository->getStatuses();
$customerParty = $billingStatus->getCustomerParty();
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
            <?= $billingStatus->getAmountMoney()->formatByHtml(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $billingStatusesRepository->getLabel('billed'); ?>:
        </td>
        <td class="value">
            <?= $billingStatus->getAmountBilledMoney()->formatByHtml(); ?>
        </td>
    </tr>
    <tr>
        <td class="name">
            <?= $billingStatusesRepository->getLabel('title.singular'); ?>:
        </td>
        <td class="value">
            <?= $billingStatus ? $billingStatus->getStatus()->getLabelHTML() : ''; ?>

            <div class="btn-group btn-group-sm float-right">
                <a class="btn dropdown-toggle btn-xs btn-primary" data-bs-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-pencil glyphicon-white"></span>
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-left">
                    <?php foreach ($statuses as $status) { ?>
                        <?php if (!$billingStatus || $status->getName() != $billingStatus->getStatus()->getName()) { ?>
                            <a class="dropdown-item" href="<?= $billingStatus->compileURL(
                                'changeStatus',
                                ['status' => $status->getName()]
                            ); ?>">
                                <?= $status->getLabel(); ?>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
