init:
	git config --local core.hooksPath .githooks
	cp .env.example .env

d_build:
	docker compose up -d --build
