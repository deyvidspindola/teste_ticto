## CheckPoint

Pré requisitos para rodar a aplicaçao:

-   Ter a versão do PHP >= 8.2
-   Ter o Docker instalado junto com o docker compose

Passos para rodar o projeto:

-   Suba o container docker com a última versào do Mysql.
-   Execute o comando `composer install` para instalar as dependências do Laravel.
-   Rode as migrations do banco de dados com o comando `php arisan migrate`
-   Rode a seed para criar o usuario Admin da aplicação com o comando `php artisan db:seed --class AdminSeeder`
-   Inicie o servidor rodando o comando `php artisan serve`

Versòes usadas no projeto:

-   PHP 8.2
-   Laravel 11.x
-   Mysql 8.x
-   Vuejs 3
-   NodeJs 18.x
