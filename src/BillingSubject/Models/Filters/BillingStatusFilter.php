<?php

namespace Marktic\Billing\BillingSubject\Models\Filters;

use Marktic\Billing\Utility\BillingModels;
use Nip\Database\Query\AbstractQuery;
use Nip\Database\Query\Select as SelectQuery;
use Nip\Records\Filters\Column\AbstractFilter;
use Nip\Records\Filters\Column\FilterInterface;

/**
 * Class BillingStatusFilter
 * @package Marktic\Billing\BillingSubject\Models\Filters
 */
class BillingStatusFilter extends AbstractFilter implements FilterInterface
{
    public const NAME = 'billingStatus';

    protected $field = self::NAME;

    /**
     * @param SelectQuery $query
     */
    public function filterQuery($query): void
    {
        $query->where("id IN (?)", $this->getSubQuery());
    }

    /**
     * @return AbstractQuery|SelectQuery
     */
    public function getSubQuery()
    {
        $query = BillingModels::billingStatuses()->newQuery();
        $query->setCols('subject_id');
        $query->where('`status` = ?', $this->getValue());
        $subject = $this->getManager()->getRecordManager()->getMorphName();
        $query->where('`subject` = ?', $subject);

        return $query;
    }

}
