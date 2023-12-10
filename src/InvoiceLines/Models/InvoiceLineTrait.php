<?php

namespace Marktic\Billing\InvoiceLines\Models;

use Marktic\Billing\Base\Models\Behaviours\HasCurrency\RecordHasCurrency;
use Marktic\Billing\Base\Models\Behaviours\HasId\RecordHasId;
use Marktic\Billing\Base\Models\Behaviours\HasName\RecordHasName;
use Marktic\Billing\Base\Models\Behaviours\HasSubject\HasSubjectRecordTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Marktic\Billing\Invoices\ModelsRelated\HasInvoice\HasInvoiceRecordTrait;

/**
 * Trait NewsletterConsentTrait
 */
trait InvoiceLineTrait
{
    use RecordHasId;
    use HasInvoiceRecordTrait;
    use HasSubjectRecordTrait;
    use RecordHasName;
    use RecordHasCurrency;
    use TimestampableTrait;

    protected ?int $quantity = null;

    protected ?string $unit_name = null;
    protected ?int $unit_price = null;

    protected ?int $subtotal = null;

    protected ?int $tax_rate = null;
    protected ?int $tax_total = null;

    protected ?int $total = null;

}
