# Albuns PHP

Lembre-se:
- Docker instalado (https://www.docker.com/products/docker-desktop)

```
cp .env.dist .env
docker-compose up
```

Acessar http://localhost

Vai dar um erro:
```
Warning: include(/var/www/htdocs/vendor/autoload.php): failed to open stream: No such file or directory in /var/www/htdocs/index.php on line 2

Warning: include(): Failed opening '/var/www/htdocs/vendor/autoload.php' for inclusion (include_path='.:/usr/local/lib/php') in /var/www/htdocs/index.php on line 2

Fatal error: Uncaught Error: Class 'App\Index' not found in /var/www/htdocs/index.php:4 Stack trace: #0 {main} thrown in /var/www/htdocs/index.php on line 4
```

Abra um novo terminal e dentro da pasta do projeto, execute:
```
docker-compose exec php bash
composer install
```

