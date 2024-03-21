#! /bin/bash

##	deploy:			instalamos lo que necesita el proyecto
deploy:
	- composer install
	- php bin/phpunit

##	test:		            ejecutamos test
testing:
	- php bin/phpunit