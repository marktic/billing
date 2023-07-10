<?php

declare(strict_types=1);

namespace Marktic\Billing\Utility;

use ByTIC\PackageBase\Utility\ModelFinder;
use Marktic\Billing\BillingServiceProvider;
use Marktic\Billing\InvoiceLines\Models\InvoiceLines;
use Marktic\Billing\Invoices\Models\Invoices;
use Nip\Records\RecordManager;

/**
 * Class BillingModels.
 */
class BillingModels extends ModelFinder
{
    public const INVOICES = 'carts';
    public const INVOICE_LINES = 'invoice_lines';
    public const INVOICE_PARTIES = 'invoice_parties';

    public static function invoices(): Invoices|RecordManager
    {
        return static::getModels(self::INVOICES, Invoices::class);
    }

    /**
     * @return InvoiceLines|RecordManager
     */
    public static function invoiceLines(): InvoiceLines|RecordManager
    {
        return static::getModels(self::INVOICE_LINES, InvoiceLines::class);
    }

    public static function invoiceParties(): InvoiceLines|RecordManager
    {
        return static::getModels(self::INVOICE_PARTIES, InvoiceLines::class);
    }

    protected static function packageName(): string
    {
        return BillingServiceProvider::NAME;
    }
}
