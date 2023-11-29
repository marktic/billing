<?php

declare(strict_types=1);

namespace Marktic\Billing\Utility;

use ByTIC\PackageBase\Utility\ModelFinder;
use Marktic\Billing\BillingServiceProvider;
use Marktic\Billing\Contacts\Models\Contacts;
use Marktic\Billing\InvoiceLines\Models\InvoiceLines;
use Marktic\Billing\Invoices\Models\Invoices;
use Marktic\Billing\LegalEntities\Models\LegalEntities;
use Marktic\Billing\Parties\Models\Parties;
use Nip\Records\RecordManager;

/**
 * Class BillingModels.
 */
class BillingModels extends ModelFinder
{
    public const INVOICES = 'invoice';
    public const INVOICE_LINES = 'invoice_lines';
    public const PARTIES = 'parties';
    public const LEGAL_ENTITIES = 'legal_entities';

    public const CONTACTS = 'contacts';

    public static function invoices(): Invoices|RecordManager
    {
        return static::getModels(self::INVOICES, Invoices::class);
    }

    public static function invoicesClass(): string
    {
        return static::getConfigVar('models.' . self::INVOICES, Invoices::class);
    }

    /**
     * @return InvoiceLines|RecordManager
     */
    public static function invoiceLines(): InvoiceLines|RecordManager
    {
        return static::getModels(self::INVOICE_LINES, InvoiceLines::class);
    }

    public static function parties(): Parties|RecordManager
    {
        return static::getModels(self::PARTIES, Parties::class);
    }

    public static function legalEntities(): Parties|RecordManager
    {
        return static::getModels(self::LEGAL_ENTITIES, LegalEntities::class);
    }

    public static function legalEntitiesClass(): string
    {
        return static::getConfigVar('models.' . self::LEGAL_ENTITIES, LegalEntities::class);
    }

    public static function contacts(): Parties|RecordManager
    {
        return static::getModels(self::CONTACTS, Contacts::class);
    }

    public static function contactsClass(): string
    {
        return static::getConfigVar('models.' . self::CONTACTS, Contacts::class);
    }

    protected static function packageName(): string
    {
        return BillingServiceProvider::NAME;
    }
}
