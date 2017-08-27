# simple-sms

A simple sms microservice .

## Getting Started

1. Take a checkout of the simple-sms repo from git to your local folder

```
git clone git@github.com:debashishnit/simple-sms.git <local_folder>
```
2. Open the config/cache.php in editor and under the memcached host, update the host ip (instead of 127.0.0.1) .

You can get the host ip from ifconfig command under inet section.

```
'memcached' => [
                    'driver'  => 'memcached',
                    'servers' => [
                        [
                            'host' => env('MEMCACHED_HOST', '<host_ip>'), 'port' => env('MEMCACHED_PORT', 11211), 'weight' => 100,
                        ],
                    ],
                ],
```

3. Please ensure you have ports 9002, 33061 and 11211 unallocated for the service to work , else you can modify the ports in the docker-compose.yml file.

4. Setup the docker-container by executing docker-compose inside this project folder:

```
docker-compose up -d
```

5. The following processes should be up and running

```
 docker ps -a

 c909aa9f0119        simplesms_web       "nginx -g 'daemon ..."   2 hours ago         Up 2 hours               443/tcp, 0.0.0.0:9002->80/tcp   simplesms_web_1
 4f41a7e95fb6        simplesms_app       "php-fpm"                2 hours ago         Up 2 hours               9000/tcp                        simplesms_app_1
 1ef89cb11249        memcached           "docker-entrypoint..."   2 hours ago         Up 2 hours               0.0.0.0:11211->11211/tcp        simplesms_memcached_1
 8355df6c6bec        mysql:5.6           "docker-entrypoint..."   2 hours ago         Up 2 hours               0.0.0.0:33061->3306/tcp         simplesms_database_1
```

6. Open a web browser and hit localhost:9002 , you should be able to see the Lumen version.

7. The docker container can be stopped anytime using

```
docker-compose down
```

### Prerequisites

This application expects that you have docker installed and configured in your system.

Also , a MySql client will help in debugging the database setup issues/queries.

```
Give examples
```

### Installing

Once when the microservice is up and running on port 9002 , now it's the time to configure the database.

Inside the project folder root, run the below command

```
docker-compose exec app php artisan migrate
```
Laravel will create the necessary db, tables and populate the data as per the requirement.

If mysql is installed , the tables and dbs can be seen by connecting to the db as:

```
mysql -P 33061 --protocol=tcp -u root -p
```

## Running the tests

Running phpunit in the root project folder will run the test cases. I have included sample test cases for reference.

## Built With

* [Lumen (5.4.6)](https://lumen.laravel.com/docs/5.4) - The PHP web framework used
* [Memcache](https://memcached.org/downloads) - Caching layer
* [Nginx] (https://nginx.org/en/) - Web Server
* [php-fpm] (http://php.net/manual/en/install.fpm.php) - Fast CGI Process Manager for PHP
* [MySql (5.6)] - Database
* [Docker] (https://www.docker.com/what-docker) - deployment tool
