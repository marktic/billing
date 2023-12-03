<?php

namespace Marktic\Billing\Utility;

class BillingPaths
{
    protected const PATH_BUNDLE = '/Bundle';
    protected const PATH_RESOURCES = self::PATH_BUNDLE . '/resources';
    protected const PATH_ASSETS = self::PATH_RESOURCES . '/assets';
    protected const PATH_IMAGES = self::PATH_ASSETS . '/images';

    public static function root(string $path = null): string
    {
        static $root;
        if ($root === null) {
            $root = realpath(dirname(__DIR__, 2));
        }
        return $root . $path;
    }

    public static function bundle(string $path = null)
    {
        return self::root(self::PATH_BUNDLE) . $path;
    }

    public static function resources(string $path = null)
    {
        return self::root(self::PATH_RESOURCES) . $path;
    }

    public static function images(string $path = null)
    {
        return self::root(self::PATH_IMAGES) . $path;
    }
}