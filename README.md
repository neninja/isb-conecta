# ISB Conecta

[![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](https://gist.github.com/nenitf/1cf5182bff009974bf436f978eea1996#emojicom)

Cadastro de atividades da instituição

## Quando o projeto ficará pronto?

Os [marcos](https://github.com/nenitf/isb-conecta/milestones) do projeto estão atrelados a conclusões issues/tarefas, sendo eles:
- [MVP](https://github.com/nenitf/isb-conecta/milestone/1): Pode ser publicado mesmo não finalizado (faltando funcionalidades que serão incrementadas)
- [Release](https://github.com/nenitf/isb-conecta/milestone/2): Finalizado com todos requisitos iniciais levantados

## Setup

1. Habilite as extensões necessárias do laravel e do seu banco
```sh
php -r "var_dump([
    extension_loaded('bcmath'),
    extension_loaded('ctype'),
    extension_loaded('json'),
    extension_loaded('xml'),
    extension_loaded('openssl'),
    extension_loaded('pdo'),
]);"

# caso precise habilitar alguma, edite seu php.ini que se encontra em:
# php --ini
```
2. Instale as dependências do php: ``composer i``
3. Instale as dependências do js: ``npm i``
4. Crie `.env` com base no `.env.example`
5. Crie o banco de dados
```sh
# exemplo com postgresql
createdb -U postgres isb-conecta

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
6. Crie as tabelas com as migrations: ``php artisan migrate --seed``
    - [mais comandos](tech-help.md)

7. Crie um usuário no banco

```sh
php artisan tinker
(new App\Models\User())->create(['name' => 'adm', 'email' => 'adm@isb.com', 'password' => bcrypt('123456')])->setores()->attach(1);
(new App\Models\User())->create(['name' => 'rec', 'email' => 'rec@isb.com', 'password' => bcrypt('123456')])->setores()->attach(2);
```

## Desenvolvimento local

Após configurar [setup](#setup):

```sh
php artisan serve
npm run watch

# localhost:8000
```

## Contribuindo

Veja o [CONTRIBUTING.md](CONTRIBUTING.md)
