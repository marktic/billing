<?php

namespace Marktic\Billing\PostalAddresses\ModelsRelated\HasPostalAddress;

use Marktic\Billing\PostalAddresses\Models\PostalAddress;

/**
 * @method PostalAddress getBillingPostalAddress()
 */
trait HasPostalAddressRecordTrait
{
    protected ?int $postal_address_id = null;


    public function getPostalAddressId(): ?int
    {
        return $this->postal_address_id;
    }

    public function setPostalAddressId(?int $id): void
    {
        $this->postal_address_id = $id;
    }

    public function hasPostalAddress(): bool
    {
        return $this->getPostalAddressId() !== null;
    }
}
