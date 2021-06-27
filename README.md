# ISB Conecta

[![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](https://gist.github.com/nenitf/1cf5182bff009974bf436f978eea1996#emojicom)

Cadastro de atividades da instituição

## <a name="status"></a> Quando o projeto ficará pronto? [:clipboard:](#status)

Os [marcos](https://github.com/nenitf/isb-conecta/milestones) do projeto estão atrelados a conclusões de [tarefas (issues)](https://github.com/nenitf/isb-conecta/issues). Cada marco é alcançado em sua respectiva ordem e define um estado do projeto, sendo:
- [ ] [v0.0.0](https://github.com/nenitf/isb-conecta/milestone/1): Pode ser publicado mesmo não finalizado (faltando funcionalidades que serão incrementadas)
- [ ] [v1.0.0](https://github.com/nenitf/isb-conecta/milestone/2): Finalizado com todos requisitos iniciais levantados

Note que o tempo para atingir cada marco não possui relação com o seu percentual atual, pois depende da conclusão de novas tarefas. Sendo issues mais simples resolvidas em poucas horas ou mais complexas em semanas.

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
    extension_loaded('pgsql'),
    extension_loaded('pdo_pgsql')
]);"

# caso precise habilitar alguma, edite seu php.ini que se encontra em:
# php --ini
```
2. Instale as dependências do php: ``composer i``
3. Instale as dependências do js: ``yarn``
4. Crie `.env` com base no `.env.example`
5. Crie o banco de dados cujo optiou em `DB_DATABASE` no `.env`
6. Crie as tabelas com as migrations: ``php artisan migrate --seed``
7. Crie um usuário no banco com ``php artisan dev:isb:create:user {name} {username} {email} {senha} {idsetor}``

## Servidor para desenvolvimento local

```sh
php artisan serve #localhost:8000
yarn start
```

## Criação dos arquivos estáticos

Para o aceite da UI é possível fazer build do frontend.

<!--1. Add no `.env` a propriedade `MIX_GHPAGES_TEST=1` -->
1. `composer prevprod`

Será criado o diretório `prevprodFrontend` (não versionado), cujo possui o arquivo `index.html` que pode ser aberto pelo browser.


## Contribuindo

Veja o [CONTRIBUTING.md](CONTRIBUTING.md)
