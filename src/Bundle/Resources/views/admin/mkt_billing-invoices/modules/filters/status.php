<?php

use Marktic\Billing\BillingSubject\Models\Filters\BillingStatusFilter;
use Marktic\Billing\Utility\BillingModels;

?>
<div class="col-sm-2">
    <label for="billingStatus">
        <?= BillingModels::invoices()->getLabel('status'); ?>
    </label>
    <select class="form-control" name="status">
        <option value="">----</option>
        <?= $this->HTML()->options(
            $this->statuses,
            'name',
            'label',
            $this->filters['status'] ?? ''
        ); ?>
    </select>
</div>