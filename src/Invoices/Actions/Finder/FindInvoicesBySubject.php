<?php

namespace Marktic\Billing\Invoices\Actions\Finder;

use Marktic\Billing\Base\Actions\RecordsFinderAction;
use Marktic\Billing\BillingSubject\Actions\Behaviours\HasSubjectRecordTrait;
use Marktic\Billing\Invoices\Actions\Behaviours\HasRepository;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\BillingUtility;

class FindInvoicesBySubject extends RecordsFinderAction
{
    use HasRepository;
    use HasSubjectRecordTrait;

    protected function findParams(): array
    {
        return [
            'where' => [
                ['subject IN ?',  BillingUtility::morphLabelFor($this->subject)],
                ['subject_id IN ?',  $this->subject->id],
            ],
        ];
    }
}

