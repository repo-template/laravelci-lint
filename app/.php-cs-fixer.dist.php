<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('database/migrations')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules(
    [
        '@PSR12' => true,
        '@PhpCsFixer' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ]
)->setFinder($finder);
