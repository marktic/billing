<?php

use ByTIC\Icons\Icons;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\Utility\BillingModels;

/** @var Party $item */
$item = $item ?: ($this->billingParty ?? null);
$partiesRepository = BillingModels::parties();
?>
<?php if ($item == null) { ?>
    <div class="alert alert-danger">
        <?= $partiesRepository->getMessage('dnx') ?>
    </div>
    <?php return; ?>
<?php } ?>

<table class="table table-striped">
    <thead>
    <tr>
        <td>Name</td>
        <td>
            <?= $item->isCompany() ? Icons::building() : Icons::user(); ?>
            <?= $item->getName() ?>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?= $item->getBillingPostalAddress()->toString() ?></td>
    </tr>
    </thead>
</table>
