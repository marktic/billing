<?php

declare(strict_types=1);

namespace Marktic\Billing\Utility;

use Marktic\Billing\BillingServiceProvider;
use Marktic\Billing\BillingStatuses\Statuses\AbstractStatus;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class PackageConfig.
 */
class PackageConfig extends \ByTIC\PackageBase\Utility\PackageConfig
{
    use SingletonTrait;

    protected $name = BillingServiceProvider::NAME;

    public static function configPath(): string
    {
        return __DIR__ . '/../../config/mkt_billing.php';
    }

    public static function tableName($name, $default = null)
    {
        return static::instance()->get('tables.' . $name, $default);
    }

    /**
     * @throws \Exception
     */
    public static function databaseConnection(): ?string
    {
        return (string) static::instance()->get('database.connection');
    }

    public static function shouldRunMigrations(): bool
    {
        return false !== static::instance()->get('database.migrations', false);
    }

    public static function billingStatusesDirectories()
    {
        return static::instance()->get('billingStatuses.statuses.directories', [AbstractStatus::DIRECTORY]);
    }
}
