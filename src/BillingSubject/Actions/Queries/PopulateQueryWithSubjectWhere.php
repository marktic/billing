<?php

namespace Marktic\Billing\BillingSubject\Actions\Queries;

use Marktic\Billing\Utility\BillingUtility;

class PopulateQueryWithSubjectWhere
{
    protected $query;
    protected $subject;

    /**
     * @param $query
     * @param $owner
     */
    public function __construct($query, $owner)
    {
        $this->query = $query;
        $this->subject = $owner;
    }


    public static function for($query, $owner)
    {
        return new static($query, $owner);
    }

    public function handle()
    {
        $this->query->where('subject = ?', BillingUtility::morphLabelFor($this->subject));
        $this->query->where('subject_id = ?', $this->subject->id);
        return $this->query;
    }
}

