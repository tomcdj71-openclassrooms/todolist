<?php

declare(strict_types=1);

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
        // Allow Yoda style (symfony preset)
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class,
    ],

    'config' => [
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class => [
            'exclude' => [
                'src/Handler/UserHandlerInterface.php',
                'src/Handler/TaskHandlerInterface.php',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class => [
            'exclude' => [
                'src/Security',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class => [
            'exclude' => [
                'src/Form',
            ],
        ],
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class => [
            'lineLimit' => 120,
            'absoluteLineLimit' => 160,
            'ignoreComments' => false,
        ],
        \NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class => [
            'exclude' => [
                'src/Entity',
            ],
        ],
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class => [
            'exclude' => [
                'src/Entity',
            ],
        ],
    ],

    'requirements' => [
        'min-quality' => 95,
        'min-complexity' => 90,
        'min-architecture' => 95,
        'min-style' => 95,
    ],

    'threads' => 4,
];
