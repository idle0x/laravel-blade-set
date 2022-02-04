#Helpers
DC = docker-compose
EXEC = ${DC} exec
PHP = ${EXEC} php
ARTISAN = ${PHP} ./artisan

##
##Environment
##-------------
start: ## Start app environment
	$(DC) up -d --remove-orphans --no-recreate
build: ## Build app environment and start
	$(DC) up -d --build
stop: ## Stop app environment
	docker-compose down

##
##Tests
##-------------
test: ## Run tests
	${ARTISAN} test
coverage:
	${PHP} ./vendor/bin/phpunit --coverage-text tests

coverage-html: ## Tests coverage (xdebug need in coverage mode)
	${PHP} ./vendor/bin/phpunit --coverage-html tests/coverage
	> chown-tests

chown-tests:
	${PHP} chown 1000:1000 -R tests/
##
##Helpers
##-------------
link-storage: ## Create link for storage folder
	${ARTISAN} storage:link

cache-clear: ## Clear cache
	${ARTISAN} cache:clear

php: ## Start application container
	${PHP} /bin/sh

tt:
	echo $(FOO)
	ls -al
	ls -al ./tests


.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
