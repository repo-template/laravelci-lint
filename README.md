# laravelci-lint

Laravel用のGitHub Actions

## After `Laravel new {my-project}`

```bash
$ cd {my-project}
$ composer --dev require nunomaduro/larastan
$ composer --dev require friendsofphp/php-cs-fixer
```

## [larastan] Create `{my-project}/phpstan.neon`

```bash
$ touch phpstan.neon
```

[larastan rules][larastan rules url]

**Example `phpstan.neon`**

```yaml
includes:
    - ./vendor/nunomaduro/larastan/extension.neon

parameters:
    # The level 9 is the highest level
    level: 9

    paths:
        - app
        - bootstrap
        - database
        - routes
        - tests

    excludePaths:
        - database/factories/**.php
        - routes/console.php

    checkModelProperties: true
    checkPhpDocMissingReturn: true
    checkUnusedViews: true
```

## [php-cs-fixer] Create `{my-project}/.php_cs.dist`

```bash
$ touch .php_cs.dist
```

[php-cs-fixer rules][php-cs-fixer rules url]

**Example `.php_cs.dist`**

```php
<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('somedir')
    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;
```

[larastan rules url]: https://github.com/nunomaduro/larastan/blob/master/docs/rules.md
[php-cs-fixer rules url]: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/config.rst
