<?php

namespace Marktic\Billing\InvoiceLines\Models;

use ByTIC\Money\Utility\Money;
use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasDescription\RecordHasDescription;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Invoices\ModelsRelated\HasInvoice\HasInvoiceRecordTrait;
use Nip\Utility\Number;

/**
 * Trait NewsletterConsentTrait
 */
trait InvoiceLineTrait
{
    use RecordHasId;
    use HasInvoiceRecordTrait;
    use HasSubjectRecordTrait;
    use RecordHasName;
    use RecordHasDescription;
    use RecordHasCurrency;
    use TimestampableTrait;

    protected ?int $quantity = null;

    protected ?string $unit_name = null;
    protected ?int $unit_price = null;

    protected ?int $subtotal = null;

    protected ?int $tax_rate = null;
    protected ?int $tax_total = null;

    protected ?int $total = null;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int|string|null $quantity): void
    {
        $this->quantity = Number::intOrNull($quantity);
    }

    public function getUnitName(): ?string
    {
        return $this->unit_name;
    }

    public function setUnitName(?string $unit_name): void
    {
        $this->unit_name = $unit_name;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unit_price;
    }

    public function setUnitPrice(int|string|null $unit_price): void
    {
        $this->unit_price = Number::intOrNull($unit_price);
    }

    public function getUnitPriceMoney(): \ByTIC\Money\Money
    {
        return Money::fromCents($this->unit_price, $this->getCurrency());
    }

    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    public function setSubtotal(?int $subtotal): void
    {
        $this->subtotal = Number::intOrNull($subtotal);
    }

    public function getSubtotalMoney(): \ByTIC\Money\Money
    {
        return Money::fromCents($this->subtotal, $this->getCurrency());
    }

    public function getTaxRate(): ?int
    {
        return $this->tax_rate;
    }

    public function setTaxRate(?int $tax_rate): void
    {
        $this->tax_rate = Number::intOrNull($tax_rate);
    }

    public function getTaxTotal(): ?int
    {
        return $this->tax_total;
    }

    public function getTaxTotalMoney(): \ByTIC\Money\Money
    {
        return Money::fromCents($this->tax_total, $this->getCurrency());
    }

    public function setTaxTotal(?int $tax_total): void
    {
        $this->tax_total = Number::intOrNull($tax_total);
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function getTotalMoney(): \ByTIC\Money\Money
    {
        return Money::fromCents($this->total, $this->getCurrency());
    }

    public function setTotal(?int $total): void
    {
        $this->total = Number::intOrNull($total);
    }
}
