<?php

namespace Marktic\Billing\Invoices\Actions\Finder;

use Marktic\Billing\Base\Actions\RecordsFinderAction;
use Marktic\Billing\Base\HasSubject\Actions\Behaviours\HasSubjectRecordTrait;
use Marktic\Billing\Invoices\Actions\Behaviours\HasRepository;
use Marktic\Billing\Utility\BillingModels;

class FindInvoicesByLineSubject extends RecordsFinderAction
{
    use HasRepository;
    use HasSubjectRecordTrait;

    protected function findParams(): array
    {
        return [
            'where' => [
                ['id IN ?', $this->generateItemsQuery()],
            ],
        ];
    }

    protected function generateItemsQuery()
    {
        $query = BillingModels::invoiceLines()->paramsToQuery();
        $query = $this->populateQueryWithSubject($query);
        $query->setCols('invoice_id');

        return $query;
    }
}

