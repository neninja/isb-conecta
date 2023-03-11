# ISB Conecta

<!--  [![coverage](https://raw.githubusercontent.com/nenitf/elefanteca_api/gh-pages/coverage.svg)](https://neni.dev/elefanteca_api/coverage/index.html) [![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](http://neni.dev/emojicom) -->

[![Back-end CI](https://github.com/nenitf/isb-conecta/actions/workflows/back-ci.yml/badge.svg)](https://github.com/nenitf/isb-conecta/actions/workflows/back-ci.yml) [![Front-end CI](https://github.com/nenitf/isb-conecta/actions/workflows/front-ci.yml/badge.svg)](https://github.com/nenitf/isb-conecta/actions/workflows/front-ci.yml) [![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](http://neni.dev/emojicom)

## <a name="roadmap"></a>Roadmap [:pushpin:](#roadmap)

- [Tarefas](https://github.com/nenitf/isb-conecta/issues)
- [Marcos](https://github.com/nenitf/isb-conecta/milestones)
- [Planejamento](https://github.com/users/nenitf/projects/4)

## Ambiente de desenvolvimento com Docker

### Configuração inicial

1. Duplique `.env.example` e renomeie para `.env`

```sh
cp .env.example .env
```

2. **Mude o usuário (`DB_USERNAME`), senha (`DB_PASSWORD`) e outras keys necessárias de `.env`**

3. Baixe as dependências do composer

```bash
docker run -v $(pwd):/var/www/html -w /var/www/html laravelsail/php82-composer:latest sh -c "composer config http-basic.nova.laravel.com ${NOVA_USERNAME} ${NOVA_LICENSE_KEY} && composer install --ignore-platform-reqs"
```

4. Crie a chave de criptografia

```sh
./vendor/bin/sail artisan key:generate
```

5. Crie as tabelas no banco

```sh
./vendor/bin/sail artisan migrate:fresh --seed
```

### Execução

Com a **configuração inicial** já realizada, suba os containers se necessário, inicie o ambiente front-end e acesse a aplicação em `localhost`

```sh
./vendor/bin/sail up -d
./vendor/bin/sail npm start
```

### Teste

```sh
./vendor/bin/sail test
```
