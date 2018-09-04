# Simple Shopping Cart API

This project is just a proof of concept, of implementing a simple shopping cart API.

it uses php 7.2, docker-compose and offers behat end-2-end tests for the API endpoints, which also serves a documentation for the API.

## Limitations
* It is assumed, there is no users/a single user on the system for simplicity reasons
* error handling is very limited




## Getting started
* please make sure docker-compose  [is installed on your system](https://docs.docker.com/compose/install/)
* you can get the env running by running the command `docker-compose up -d` in the project root folder
* you can also "log into" the php instance by using the command `docker exec -it api-service bash`

### fixtures
there are fixtures for the products, with two dummy products, that get automatically imported once the system is running


### running unit tests
extending unit tests is work in progress. to run the unit tests
to run the unit tests use the command: `docker exec -it api-service ./bin/phpunit`
the coverage is also not 100% ;-)

### behat tests
work in progress, because of conflicts between behat 3.5 and symfony 4.1




