# Teste de Conhecimento Técnico
## Descrição

### Teste de conhecimento tecnico para o processo seletivo da Objective.

## Pré-requisitos
### Para execução local
PHP: Verifique se o PHP está instalado (recomendado PHP 8.3 ou superior).

Composer: Certifique-se de que o Composer está instalado.

Laravel: As extensões do PHP para o laravel devem estar instaladas.

### Para execução com Docker
Docker: Instale o Docker na sua máquina.

Docker Compose: Verifique se o Docker Compose está disponível.

## Como Rodar o Projeto

### Opção 1: Usando PHP Artisan

#### Navegue até a pasta do projeto:

cd /caminho/para/o/projeto/code

### Instale as dependências do projeto:

composer install

### Rode o servidor do artisan

php artisan serve

### Opção 2: Usando Docker
#### Navegue até a pasta do projeto:

cd /caminho/para/o/projeto

#### Instale as dependências com o Docker Compose:

docker-compose up -d

#### Acesse o contêiner em execução:

docker exec -it <nome_do_container> /bin/bash

Substitua <nome_do_container> pelo nome do contêiner que está executando a aplicação.

#### Dentro do contêiner, execute o script init.sh para setar as permissões de pastas e iniciar o banco de dados limpo.

./init.sh

## Contato
Para dúvidas entre em contato pelo e-mail: it.brunoms@gmail.com

