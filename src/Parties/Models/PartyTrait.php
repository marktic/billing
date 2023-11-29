<?php

namespace Marktic\Billing\Parties\Models;

use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasIdentifier\RecordHasIdentifier;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRecordTrait;
use Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity\HasLegalEntityRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait PartyTrait
{
    use RecordHasId;
    use RecordHasIdentifier;
    use RecordHasName;
    use HasOwnerRecordTrait;
    use HasLegalEntityRecordTrait;
    use TimestampableTrait;


    protected ?string $type = null;

    protected ?string $tradingName = null;

    protected $vatId = null;

    protected $taxId = null;

    protected $registrationId = null;

    protected $contactName = null;
    protected $contactPhone = null;
    protected $contactEmail = null;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getTradingName(): ?string
    {
        return $this->tradingName;
    }

    /**
     * @param string|null $tradingName
     */
    public function setTradingName(?string $tradingName): void
    {
        $this->tradingName = $tradingName;
    }

    public function isCompany(): bool
    {
        // TODO: Implement isCompany() method.
    }

    public function isPerson(): bool
    {
        // TODO: Implement isPerson() method.
    }
}
