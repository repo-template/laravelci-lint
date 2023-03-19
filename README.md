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

## Run phpstan

```bash
$ ./vendor/bin/phpstan analyse --memory-limit=1G
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

## Run `phpcs-fixer`

```bash
$ ./vendor/bin/php-cs-fixer fix --config=php_cs.dist ./
```

[larastan rules url]: https://github.com/nunomaduro/larastan/blob/master/docs/rules.md
[php-cs-fixer rules url]: https://mlocati.github.io/php-cs-fixer-configurator/#version:2.16
