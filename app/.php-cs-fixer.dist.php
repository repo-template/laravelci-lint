<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(
        [
            'config',
            'bootstrap/cache',
            'database/migrations',
            'storage',
        ]
    )
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules(
    [
        '@PSR12' => true,
        '@PhpCsFixer' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => [
            'statements' => [
                'break',
                'case',
                'continue',
                'declare',
                'default',
                'do',
                'exit',
                'for',
                'foreach',
                'goto',
                'if',
                'include',
                'include_once',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
                'while',
                'yield',
            ],
        ],
        'self_static_accessor' => true,
        'global_namespace_import' => [
            'import_constants' => true,
            'import_functions' => true,
        ],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'phpdoc_no_empty_return' => false,
        'single_quote' => true,
        'strict_param' => true,
        'yoda_style' => [
            'always_move_variable' => false,
            'equal' => false,
            'identical' => false
        ],
    ]
)->setFinder($finder);
