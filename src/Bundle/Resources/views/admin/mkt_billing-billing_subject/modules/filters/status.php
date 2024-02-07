<?php

use Marktic\Billing\BillingSubject\Models\Filters\BillingStatusFilter;
use Marktic\Billing\Utility\BillingModels;

?>
<div class="col-sm-2">
    <label for="billingStatus">
        <?= BillingModels::billingStatuses()->getLabel('title.singular'); ?>
    </label>
    <select class="form-control" name="billingStatus">
        <option value="">----</option>
        <?= $this->HTML()->options(
            $this->billingStatuses,
            'name',
            'label',
            $this->filters[BillingStatusFilter::NAME] ?? ''
        ); ?>
    </select>
</div>