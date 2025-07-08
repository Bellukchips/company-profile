.PHONY: help build up down restart logs shell db-migrate db-fresh cache-clear db-migrate-seed optimize queue-work tinker key-generate storage-link publish-livewire publish-livewire-cvoborjagad publish-livewire-bookingps

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build containers
	docker compose build --no-cache

up: ## Start all containers
	docker compose up -d

down: ## Stop all containers
	docker compose down

restart: ## Restart all containers
	docker compose restart

logs: ## Show logs
	docker compose logs -f cvoborjagad

shell: ## Access shell inside cvoborjagad
	docker compose exec cvoborjagad sh

db-migrate: ## Run database migrations
	docker compose exec cvoborjagad php artisan migrate

db-fresh: ## Fresh database with seeders
	docker compose exec cvoborjagad php artisan migrate:fresh --seed

db-migrate-seed: ## Run database migrations and seeders
	docker compose exec cvoborjagad php artisan migrate --seed

cache-clear: ## Clear all caches
	docker compose exec cvoborjagad php artisan cache:clear
	docker compose exec cvoborjagad php artisan config:clear
	docker compose exec cvoborjagad php artisan route:clear
	docker compose exec cvoborjagad php artisan view:clear

optimize: ## Optimize application for production
	docker compose exec cvoborjagad php artisan config:cache
	docker compose exec cvoborjagad php artisan route:cache
	docker compose exec cvoborjagad php artisan view:cache

queue-work: ## Start queue worker
	docker compose exec cvoborjagad php artisan queue:work

tinker: ## Access Laravel Tinker
	docker compose exec cvoborjagad php artisan tinker

key-generate: ## Generate application key
	docker compose exec cvoborjagad php artisan key:generate

storage-link: ## Create storage link
	docker compose exec cvoborjagad php artisan storage:link

publish-livewire: publish-livewire-cvoborjagad publish-livewire-bookingps ## Publish Livewire assets for all projects

publish-livewire-cvoborjagad: ## Publish Livewire assets (cvoborjagad)
	docker compose exec cvoborjagad php artisan vendor:publish --force --tag=livewire:assets
