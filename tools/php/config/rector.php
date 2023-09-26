<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    // get root dir
    $srcDir = dirname(__DIR__, 3).'/src';
    $testsDir = dirname(__DIR__, 3).'/tests';
    if (! is_dir($srcDir) || ! is_dir($testsDir)) {
        throw new \Exception(
            "Directories do not exist: $srcDir or $testsDir \n"
        );
    }
    $rectorConfig->paths(
        [$srcDir, $testsDir]
    );

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::PHP_80,
        SetList::STRICT_BOOLEANS,
        SetList::CODING_STYLE,
        SetList::NAMING,
        SetList::TYPE_DECLARATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF
    ]);


    $rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);

    $rectorConfig->phpVersion(PhpVersion::PHP_80);
};
