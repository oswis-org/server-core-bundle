<?php

declare(strict_types=1);

use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses;
use NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */
    'preset'       => 'symfony',
    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    | This options allow adding hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    | Supported: "textmate", "macvim", "emacs", "sublime", "phpstorm",
    | "atom", "vscode".
    |
    | If you have another IDE that is not in this list but which provide an
    | url-handler, you could fill this config with a pattern like this:
    |
    | myide://open?url=file://%f&line=%l
    |
    */
    'ide'          => 'phpstorm',
    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind, that all added `Insights` must belong to a specific `Metric`.
    |
    */
    'exclude'      => [
        'doc',
        'node_modules',
        'var',
        'vendor',
        'tools',
        'src/DependencyInjection/Configuration.php',
    ],
    'add'          => [],
    'remove'       => [
        ForbiddenSetterSniff::class,
        ForbiddenNormalClasses::class,
        UnusedParameterSniff::class,
        SpaceAfterNotSniff::class,
        DisallowMixedTypeHintSniff::class,
    ],
    'config'       => [
        BinaryOperatorSpacesFixer::class => [
            'default' => 'align',
        ],
        LineLengthSniff::class           => [
            'lineLimit'         => 120,
            'absoluteLineLimit' => 140,
        ],
        FunctionLengthSniff::class       => [
            'maxLinesLength' => 35,
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
    */
    'requirements' => [
        'min-quality'            => 70,
        'min-complexity'         => 70,
        'min-architecture'       => 70,
        'min-style'              => 70,
        'disable-security-check' => false,
    ],
];
