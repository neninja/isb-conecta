# ISB Conecta

[![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](http://neni.dev/emojicom)

Parei com o desenvolvimento do projeto no primeiro relatório por desinteresse. Foi criada toda estrutura de pesquisa e criação do relatório de atendimento, a conclusão seria o desenvolvimento da criação dos demais relatórios. Meu objetivo de testar alpine, tailwind e livewire foi concluído.

## Desenvolvimento

### Ambiente

1. Duplique `.env.example` para `.env` e **mude o usuário (`DB_USERNAME`) e senha (`DB_PASSWORD`)**

```sh
cp .env.example .env
```

2. Baixe o Sail juntamente com as dependências do composer
```sh
docker run -v $(pwd):/var/www/html -w /var/www/html laravelsail/php83-composer:latest sh -c "composer config --global && composer install --ignore-platform-reqs"
```

```sh
sudo chown 1000:1000 -R vendor
sudo chmod 775 -R vendor
```

3. Suba o ambiente
```sh
./vendor/bin/sail up -d
```

> Esse comando é <a href="#Execução">utilizado sempre que quiser subir o ambiente ja configurado</a> também

4. Crie a `APP_KEY`
```sh
./vendor/bin/sail art key:generate
```

5. Crie as tabelas com alguns registros do *seeder*
```sh
./vendor/bin/sail art migrate:fresh --seed
```

6. Baixe as dependências javascript
```sh
./vendor/bin/sail npm i
```

7. Gere o frontend
```sh
./vendor/bin/sail npm run
```

### Execução

1. Inicie o backend se necessário
```sh
./vendor/bin/sail up -d
```

> Interrompa com `./vendor/bin/sail down`

2. Inicie o frontend
```sh
./vendor/bin/sail npm run dev
```

> Interrompa com <kbd>ctrl</kbd><kbd>c</kbd>

3. Acesse o sistema:
    - `localhost/login`: `admin.isb` `123` (utilize `NESFD7UNNXAE3JIZ` como seeder do TOTP)
    - `localhost/login`: `recepcao.isb` `123`

> Como *admin*, gere alguns reports com o seeder

> Como *recepção* crie alguns relatórios de atendimento

Outros comandos úteis durante o desenvolvimento:

- `sail bash`
- `sail psql`
- `sail tinker`
- `sail art queue:work`
- `sail art optimize:clear`
- `sail composer i`

### Linting

```sh
./vendor/bin/sail php ./vendor/bin/pint
./vendor/bin/sail php ./vendor/bin/pint --dirty
```

### Testes

#### Ambiente

```sh
./vendor/bin/sail psql
create database isbconecta_testing;
```

#### Execução

```sh
./vendor/bin/sail test
./vendor/bin/sail test tests/Feature/BlablaTest.php
./vendor/bin/sail test --parallel --no-coverage
./vendor/bin/sail test --filter nomeDoTeste
```

<!-- aguardar aprovação
#### QA

Desafio principal: validar responsividade para desktop e celular

É mantido em paralelo os [testes automatizados](http://github.com/neninja/isbconeqa) de api e interface web. Para testar:
- no `.env` deve estar com `APP_ENV` configurado como `e2e`
- com o projeto ja configurado, executar `sail art migrate:fresh --seed` e `sail art optimize:clear` para resetar o ambiente
-->
