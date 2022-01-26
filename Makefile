#Helpers
DC = docker-compose
EXEC = ${DC} exec
ARTISAN = ${EXEC} php ./artisan

##
##Environment
##-------------
up: ## Start app environment
	$(DC) up -d --remove-orphans --no-recreate
build: ## Build app environment and start
	$(DC) up -d --build
down: ## Stop app environment
	docker-compose down

link-storage: ## Create link for storage folder
    ${ARTISAN} storage:link



.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
