<?php

$rules = [
    '@Symfony'               => true,
    'binary_operator_spaces' => [
        'default' => 'align',
    ],
    'concat_space'           => [
        'spacing' => 'one',
    ],
];
$finder = (new PhpCsFixer\Finder())->in(__DIR__);
$finder->exclude('var')->exclude('vendor');

return (new PhpCsFixer\Config())->setRules($rules)->setFinder($finder);
