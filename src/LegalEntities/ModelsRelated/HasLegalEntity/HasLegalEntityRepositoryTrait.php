<?php

namespace Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity;

use Marktic\Billing\Utility\BillingModels;

trait HasLegalEntityRepositoryTrait
{
    protected function initRelationsLegalEntity(): void
    {
        $this->belongsTo(
            'LegalEntity',
            ['class' => BillingModels::legalEntitiesClass(), 'fk' => 'legal_entity_id']
        );
    }
}
