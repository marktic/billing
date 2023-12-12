<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Nip\Config\Config;
use Nip\Container\Container;
use Nip\I18n\Translator;
use Nip\Inflector\Inflector;

use Nip\Cache\Stores\Repository;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

define('PROJECT_BASE_PATH', __DIR__ . '/..');
define('TEST_BASE_PATH', __DIR__);
define('TEST_FIXTURE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'fixtures');

$container = new Container();
Container::setInstance($container);

$container->set('inflector', Inflector::instance());
$container->set('config', new Config([], true));

$translator = new Translator;
$container->set('translator', $translator);

$adapter = new ArrayAdapter( 600);
$store = new Repository($adapter);
$store->clear();
$container->set('cache.store', $store);
