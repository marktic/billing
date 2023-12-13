<?php

namespace Marktic\Billing\Base\HasSubject\Actions\Behaviours;

use Marktic\Billing\Base\HasSubject\Actions\Queries\PopulateQueryWithSubjectWhere;
use Nip\Records\AbstractModels\Record;

trait HasSubjectRecordTrait
{
    protected Record $subject;

    public static function for($subject): self
    {
        $action = new static();
        $action->setSubject($subject);
        return $action;
    }

    public function setSubject(Record $subject): void
    {
        $this->subject = $subject;
    }

    protected function populateQueryWithSubject($query)
    {
        return PopulateQueryWithSubjectWhere::for($query, $this->subject)->handle();
    }
}