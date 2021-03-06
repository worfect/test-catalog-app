<?php

declare(strict_types=1);

return
    (new PhpCsFixer\Config())
        ->setCacheFile(__DIR__ . '/storage/cache/..php-cs-fixer.php')
        ->setFinder(
            PhpCsFixer\Finder::create()
                ->in([
                    __DIR__ . '/app/Http/Controllers',
                    __DIR__ . '/app/Http/Requests',
                    __DIR__ . '/app/Models',
                    __DIR__ . '/database',
                    __DIR__ . '/public',
                    __DIR__ . '/routes',
                ])
                ->append([
                    __FILE__,
                ])
        )
        ->setRules([
            '@PSR12' => true,
            '@PSR12:risky' => true,
            '@PhpCsFixer' => true,
            '@PhpCsFixer:risky' => true,
            '@PHP81Migration' => true,

            'ordered_imports' => ['imports_order' => ['class', 'function', 'const']],

            'concat_space' => ['spacing' => 'one'],

            'phpdoc_to_comment' => false,
            'phpdoc_separation' => false,
            'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
            'phpdoc_align' => false,

            'operator_linebreak' => false,

            'global_namespace_import' => true,

            'blank_line_before_statement' => false,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],

            'fopen_flags' => ['b_mode' => true],

            'yoda_style' => false,

            'final_class' => true,
            'self_static_accessor' => true,

            'static_lambda' => true,
        ]);
