lint:
	vendor/bin/phpstan --level=8 analyse ./bin ./src
	vendor/bin/phpcbf --standard=PSR12 ./bin ./src


