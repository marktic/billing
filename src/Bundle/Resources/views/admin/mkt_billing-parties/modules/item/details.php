<?php

use ByTIC\Icons\Icons;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\PostalAddresses\Actions\Transformation\PostalAddressesString;
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
<?php
$address = $item->getBillingPostalAddress();
$legalEntity = $item->getBillingLegalEntity();
$contact = $item->getBillingContact();
?>
<table class="table table-striped">
    <thead>
    <tr>
        <td>Name</td>
        <td>
            <?= $item->isCompany() ? Icons::building() : Icons::user(); ?>
            <?= $item->getName() ?>
        </td>
    </tr>

    <?= $this->load('MarkticBilling::/mkt_billing-legal_entities/modules/item/details-row', ['item' => $legalEntity]); ?>

    <tr>
        <td>Address</td>
        <td>
            <?php if ($address) { ?>
                <?= PostalAddressesString::for($address)->html(); ?>
            <?php } else { ?>
                ---
            <?php } ?>
        </td>
    </tr>

    <?= $this->load('MarkticBilling::/mkt_billing-contacts/modules/item/details-row', ['item' => $contact]); ?>

    </thead>
</table>
