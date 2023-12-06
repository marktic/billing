<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

use Marktic\Billing\Parties\Models\Party;
use Nip\Records\AbstractModels\Record;

trait HasResultRecordTrait
{

    protected Record|null $resultRecord = null;

    public function getResultRecord(): Party|Record|null
    {
        if ($this->resultRecord === null) {
            $this->resultRecord = $this->generateResultRecord();
        }
        return $this->resultRecord;
    }

    protected function generateResultRecord(): Record|Party|null
    {
        /** @var Party $result */
        $this->resultRecord = $this->getRepository()->getNew();
        $this->populateResultRecord();
        return $this->resultRecord;
    }

    protected function populateResultRecord()
    {
    }

    protected function fillResultRecordWithData(array $data)
    {

    }
}