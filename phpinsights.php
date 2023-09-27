<?php

declare(strict_types=1);

use NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff;

return [
    'preset' => 'symfony',
    'ide' => 'vscode',
    'exclude' => [
        dirname(__DIR__, 2).'/vendor',
        dirname(__DIR__, 2).'/tools',
    ],

    'add' => [
    ],

    'remove' => [
        AlphabeticallySortedUsesSniff::class,
        DeclareStrictTypesSniff::class,
        DisallowMixedTypeHintSniff::class,
        DisallowShortTernaryOperatorSniff::class,
        ForbiddenDefineFunctions::class,
        ForbiddenFinalClasses::class,
        ForbiddenTraits::class,
        ParameterTypeHintSniff::class,
        PropertyTypeHintSniff::class,
        ReturnTypeHintSniff::class,
        UselessFunctionDocCommentSniff::class,
        UnnecessaryFinalModifierSniff::class,
    ],

    'config' => [
        UnusedParameterSniff::class => [
            'exclude' => [
                dirname(__DIR__, 3).'/src/Form',
            ],
        ],
        DisallowMixedTypeHintSniff::class => [
            'exclude' => [
                dirname(__DIR__, 3).'/src/Form',
            ],
        ],
        ForbiddenSetterSniff::class => [
            'exclude' => [
                dirname(__DIR__, 3).'/src/Entity',
            ],
        ],
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class => [
            'lineLimit' => 120,
            'absoluteLineLimit' => 160,
            'ignoreComments' => false,
        ],
    ],

    'requirements' => [
        'min-quality' => 80,
        'min-complexity' => 80,
        'min-architecture' => 80,
        'min-style' => 80,
    ],

    'threads' => 4,
];
