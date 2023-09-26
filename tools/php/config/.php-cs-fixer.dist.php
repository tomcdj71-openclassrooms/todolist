<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('var')
    ->exclude('vendor')
    ->exclude('tools')
    ->in(dirname(__DIR__, 3))
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;
