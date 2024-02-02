<?php

use Marktic\Billing\Invoices\InvoiceStatuses\AbstractStatus;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Utility\BillingModels;

$invoiceRepository = BillingModels::invoices();

/** @var Invoice $item */
$item = $item ?? $this->item;

$metadata = $item->metadata;
$metadataArray = $metadata->toArray();
?>
<table class="details table table-striped">
    <tbody>
    <?php foreach ($metadataArray as $key => $value) { ?>
        <tr>
            <td class="name">
                <?= $key; ?>:
            </td>
            <td class="value">
                <?= $value; ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>