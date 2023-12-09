<?php

namespace Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity;

use Marktic\Billing\Utility\BillingModels;

trait HasLegalEntityRepositoryTrait
{
    protected function initRelationsBillingLegalEntity(): void
    {
        $this->belongsTo(
            'BillingLegalEntity',
            ['class' => BillingModels::legalEntitiesClass(), 'fk' => 'legal_entity_id']
        );
    }
}
