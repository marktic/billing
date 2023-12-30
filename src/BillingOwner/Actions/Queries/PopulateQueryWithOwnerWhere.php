<?php

namespace Marktic\Billing\BillingOwner\Actions\Queries;

use Marktic\Billing\Utility\BillingUtility;

class PopulateQueryWithOwnerWhere
{
    protected $query;
    protected $owner;

    /**
     * @param $query
     * @param $owner
     */
    public function __construct($query, $owner)
    {
        $this->query = $query;
        $this->owner = $owner;
    }


    public static function for($query, $owner)
    {
        return new static($query, $owner);
    }

    public function handle()
    {
        $this->query->where('owner = ?', BillingUtility::morphLabelFor($this->owner));
        $this->query->where('owner_id = ?', $this->owner->id);
        return $this->query;
    }
}

