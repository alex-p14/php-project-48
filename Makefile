install:
	composer install
update:
	composer update
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
test:
	composer exec --verbose phpunit tests
test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
