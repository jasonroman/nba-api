<?php declare(strict_types=1);

/**
 * This assumes there is an autoload.php file in the vendor directory above this package.
 */
if (!file_exists(__DIR__.'/../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run test suite. "php composer.phar install --dev"');
}

require_once __DIR__.'/../vendor/autoload.php';