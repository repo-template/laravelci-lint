PROJECT_NAME := app

.PHONY: init
init:
	cd ${PROJECT_NAME} && \
		composer --dev require nunomaduro/larastan && \
		composer --dev require friendsofphp/php-cs-fixer
	test -f ${PROJECT_NAME}/.php-cs-fixer.dist.php || mv .php-cs-fixer.dist.php ${PROJECT_NAME}/.php-cs-fixer.dist.php
	test -f ${PROJECT_NAME}/phpstan.neon || mv phpstan.neon ${PROJECT_NAME}/phpstan.neon

.PHONY: lint
lint:
	cd ${PROJECT_NAME} && \
		./vendor/bin/phpstan analyse --memory-limit=1G --configuration=./phpstan.neon && \
		./vendor/bin/php-cs-fixer fix --path-mode=intersection --config=./.php-cs-fixer.dist.php --verbose --dry-run --allow-risky=yes ./
