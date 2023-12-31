<?php

namespace Marktic\Billing\InvoiceLines\Actions\Queries;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\BillingOwner\Actions\Queries\PopulateQueryWithOwnerWhere;
use Marktic\Billing\Utility\BillingModels;

class PopulateQueryWithInvoiceOwnerWhere extends Action
{
    use HasSubject;

    protected $owner;

    public static function forOwner($query, $owner)
    {
        $action = static::for($query);
        $action->owner = $owner;
        return $action;
    }

    public function handle()
    {
        $this->getSubject()->where('invoice_id IN ?', $this->invoiceSubQuery());
        return $this->getSubject();
    }


    protected function invoiceSubQuery()
    {
        $query = BillingModels::invoices()->newSelectQuery();
        $query->select('id');

        return PopulateQueryWithOwnerWhere::for($query, $this->owner)->handle();
    }
}

