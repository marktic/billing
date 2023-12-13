<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

use Marktic\Billing\Parties\Models\Party;
use Nip\Records\AbstractModels\Record;

trait FindRecordsTrait
{
    use HasRepository;
    public function handle()
    {
        return $this->findAll();
    }
}