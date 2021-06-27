# CLI Help

Ajuda sobre comandos

## Artisan

### MVC

```sh
# php artisan make:model -h
php artisan make:model Usuario
php artisan make:model Cliente -m # cria model e a migration de Cliente
php artisan make:model Pedido -a # cria migration, seeder, factory e resource controller

php artisan make:controller UsuarioController
php artisan make:resource UsuarioResource

php artisan make:request ClienteRequest
```

### Database

```sh
php artisan make:migration cria_livros_tabela
php artisan make:migration cria_produtos_tabela --create=produtos # cria tabela
php artisan make:migration renomeia_produtos_artigos --table=produtos # utiliza uma existente
```

```sh
# roda migrations
php artisan migrate
# roda migrations com seed
php artisan migrate --seed
# retorna 1 migration
php artisan migrate:rollback
# reseta todas migrations
php artisan migrate:reset
# remove todas tabelas e recria com seed
php artisan migrate:refresh --seed

php artisan migrate:status

# popula novamente as tabelas
php artisan db:seed
```

#### Corrigir migration

- Caso não tenha usado ``php artisan migrate``
    - Apagar arquivo de migration
    - ``composer dump-autoload`` <!-- ? -->
- Caso tenha usado ``php artisan migrate``
    - ``php artisan rollback`` até a última migration correta
    - Apagar arquivo de migration
    - ``composer dump-autoload`` <!-- ? -->


## Postgresql

```sh
# cria banco de dados
createdb -U postgres isb-conecta
```

```sh
# dicas do postgresql no terminal
# Entrar
psql -U postgres -d isb-conecta

# \?                    exibe ajuda
# \q                    sai
# \l                    lista databases
# \c <databasename>     conecta uma database
# \dt                   lista tables da database
# \d <tablename>        descreve uma tabela
```
