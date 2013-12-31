
# PHP Exercise
PHP Exercise based on Laravel framework.

## Installation
**Use this steps for installations**

- Install composer dependencies.  (This project depends on [laravel sail](https://laravel.com/docs/9.x/sail) package which should be installed by composer.)
  [Learn more](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)

```bash  
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
 ```  

- Add .env file and generate key.
```bash  
$ cp .env.example .env
$ ./vendor/bin/sail php artisan key:generate
 ```  

- Add database credentials to .env file.
```bash  
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
 ```  



- Build and run docker.
```bash  
$ ./vendor/bin/sail up
 ```

- Run migrations & seeds.
```bash  
$ sail artisan migrate
$ sail artisan db:seed
 ```

- Import postman collection by import this file from project root.
```bash  
form_app.postman_collection.json
 ```


## Code quality helper commands

- [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).
```bash  
$ ./vendor/bin/sail php ./vendor/bin/phpcs // Code sniffer check.
$ ./vendor/bin/sail php ./vendor/bin/phpcbf // Code sniffer Fix.
```
