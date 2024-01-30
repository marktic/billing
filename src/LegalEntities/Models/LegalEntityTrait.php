<?php

namespace Marktic\Billing\LegalEntities\Models;

use ByTIC\DataObjects\Casts\Metadata\AsMetadataObject;
use ByTIC\DataObjects\Casts\Metadata\Metadata;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRecordTrait;

/**
 * Trait NewsletterConsentTrait
 *
 * @property string|Metadata $metadata
 */
trait LegalEntityTrait
{
    use RecordHasId;
    use HasOwnerRecordTrait;
    use RecordHasIdentifier;
    use RecordHasName;
    use TimestampableTrait;

    public function __construct()
    {
        parent::__construct();

        $this->addCast('metadata', AsMetadataObject::class . ':json');
    }

    public function getTradingId()
    {
        return $this->metadata->get('trading_id');
    }

    public function setTradingId($trading_id): self
    {
        $this->metadata->set('trading_id', $trading_id);
        return $this;
    }
}
