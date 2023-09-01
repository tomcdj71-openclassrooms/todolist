<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Core\ValueObject\PhpVersion;
use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    // get root dir
    $rootDir = '../../../';
    $rectorConfig->paths([$rootDir . '/src', $rootDir . '/tests']);

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
    ]);

    $rectorConfig->skip([
        CompleteDynamicPropertiesRector::class => [
        ]
    ]);

    $rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);

    $rectorConfig->phpVersion(PhpVersion::PHP_80);

    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');
};
