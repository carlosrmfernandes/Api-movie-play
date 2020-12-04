![alt text](https://images-na.ssl-images-amazon.com/images/I/61d1F5V%2BsqL._SY200_QL15_.png)
## API MOVIE PLAY

## Obsessão
Para esse projecto foi usando design pattern SOLID parav facilitar a compreensão, o desenvolvimento e a manutenção de software.  

Api foi desensolvidade usando o framework laravel usando o padrão MVC


## Começando
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.

## Pré-requisitos

```php
Clonar o projecto
```

A seguir, execute o seguinte:

```php
Criar um arquivo .evn coloca os dados que estarão no arquivo .env.example;
```

Todos esses comandos que citarei a seguir, devem ser executados na linha de comando da sua máquina. Portanto, navegue até a pasta do projeto para poder executar os comandos abaixo especificados.
Para instalar o projeto em sua máquina, logo após clona-ló, na pasta raíz do projeto execute os seguintes comandos. 

```php
composer install
```
Pra quem vem do JavaScript, esse comando funcionaria como o npm, o "composer install" vai instalar todas as dependências do Laravel necessárias para executar o projeto em sua máquina

## Banco de dados

Configura o seu banco de dados e a seguir, execute o seguinte comando:

```php
php artisan migrate
```

## Executar os seguinte comando

```php
php artisan config:clear
```

```php
composer dump-autoload
```

## Executar o projecto com o seguinte comando

```php
php artisan serve
```
## Teste Unintário  

Para teste os campos da tabela do usuários 
```php
vendor/bin/phpunit
```
## Link da documentação 
https://drive.google.com/file/d/1s1QP3wAF4VAzt-fhK3eU2R-RqnjAI2Bk/view?usp=sharing



## Link da collections 
https://www.getpostman.com/collections/1880ed9fa93d2165b772

