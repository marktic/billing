<?php

use Marktic\Billing\Utility\BillingModels;

?>
<thead>
<tr>
    <th>
        <?= translator()->trans('name'); ?>
    </th>
    <th class="col-md-2">
        <?= translator()->trans('amount'); ?>
    </th>
    <th class="col-md-2">
        <?= BillingModels::parties()->getLabel('title.singular'); ?>
    </th>
    <th class="col-md-2">
        <?= translator()->trans('date'); ?>
    </th>
    <th class="col-md-2">
        <?= translator()->trans('status'); ?>
    </th>
</tr>
</thead>