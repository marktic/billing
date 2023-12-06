<?php

use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\Utility\BillingModels;

/** @var Party $item */
$item = $this->billingParty ?? null;
$partiesRepository = BillingModels::parties();
?>
<?php if ($item) { ?>
    <table>
        <thead>
        <tr>
            <td>Name</td>
            <td><?= $item->getName() ?></td>
        </tr>
        </thead>
    </table>
<?php } else { ?>
    <div class="alert alert-danger">
        <?= $partiesRepository->getMessage('dnx') ?>
    </div>
<?php } ?>
