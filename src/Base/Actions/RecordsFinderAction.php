<?php

namespace Marktic\Billing\Base\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\HasRepository;

abstract class RecordsFinderAction extends Action
{
   use HasRepository;

    public function handle(): \Nip\Records\Collections\Collection
    {
        return $this->findAll();
    }
}