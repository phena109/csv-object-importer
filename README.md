# Usage

## Install and Run

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

## See it

Visit `localhost` with any browser

# Files to look at

* `/controllers/*`
* `/lib/*`
* `/view/site/*`
* `/web/css/*`

# Reason for this approach

## Github

It is a source control and easy to share method. Nothing wrong with other
approaches.

## PHP framework

Using frameworks because it is more trustworthy and faster. Choosing Yii because
I am more familiar with Yii framework.

## Docker

Self contain do not require installation of anything other than docker

## Libraries

### league/csv

For CSV reading, much more reliable than parsing the CSV by the
primitive `fgetcsv()` function. It can be replaced with other similar libraries.