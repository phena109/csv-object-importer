# Usage

## Install and Start

Run the following instructions to setup docker and start running it with all
needed PHP files and libraries.

```shell
git clone git@github.com:phena109/csv-object-importer.git
cd csv-object-importer
docker-compose start
docker exec -it csv-object-importer_php_1 composer install
```

## Stop

Following instruction will stop the docker container and so the web server.

```shell
docker-compose stop
```