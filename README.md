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

Vai ser exibida a tela de login,
Digite um email e uma senha válida e em seguida notará que NÃO FUNCIONARÁ.

Por que?
Porque você não importou ainda o banco de dados.

Para importar o banco de dados, acesse o phpmyadmin através da url: http://localhost:9001/index.php digitando o usuário e senha do arquivo .env

Depois clique na lateral esquerda no banco de dados "albuns_php"

Agora você deverá importar um arquivo que está dentro da pasta dockerfiles/scripts/albuns_php.sql

Para isso, clique na aba importar, selecione o arquivo mencionado e executar.

Várias mensagens de sucesso serão exibidas e tabelas aparecerão na lista da esquerda do phpmyadmin.

Agora sim!

Volte para o projeto em http://localhost e digite o usuário com a senha.

Espero que seja feito o login e tenha sucesso na execução do projeto!
