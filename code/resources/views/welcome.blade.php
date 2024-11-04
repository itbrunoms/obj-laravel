<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Técnico - Desenvolvedor Sênior | Objective</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-dark text-white text-center py-5">

    <h1>Desafio Técnico para Desenvolvedor Sênior</h1>
    <br>
    <section id="logo">
        <img src="https://www.objective.com.br/wp-content/uploads/2020/11/logo-2.svg" class="img-fluid" alt="Objective">
    </section>
</header>

<main class="container my-5">

    <section id="descricao">
        <h2 class="mb-4">Descrição</h2>
        <p>Este é um teste de conhecimento técnico para o processo seletivo da Objective para o cargo de Desenvolvedor Sênior.</p>
    </section>

    <section id="pre-requisitos" class="mt-5">
        <h2 class="mb-4">Pré-requisitos</h2>
        <h3>Para execução local</h3>
        <ul>
            <li><strong>PHP:</strong> Verifique se o PHP está instalado (recomendado PHP 8.3 ou superior).</li>
            <li><strong>Composer:</strong> Certifique-se de que o Composer está instalado.</li>
            <li><strong>Laravel:</strong> As extensões do PHP para o Laravel devem estar instaladas.</li>
        </ul>
        <h3>Para execução com Docker</h3>
        <ul>
            <li><strong>Docker:</strong> Instale o Docker na sua máquina.</li>
            <li><strong>Docker Compose:</strong> Verifique se o Docker Compose está disponível.</li>
        </ul>
    </section>

    <section id="como-rodar" class="mt-5">
        <h2 class="mb-4">Como Rodar o Projeto</h2>
        <h3>Criação do arquivo .env</h3>
        <p>Execute o seguinte comando:</p>
        <code>cp code/.env.example code/.env</code>

        <h4 class="mt-4">Opção 1: Usando PHP Artisan</h4>
        <ol>
            <li>Navegue até a pasta do projeto:</li>
            <code>cd /caminho/para/o/projeto/code</code>
            <li>Instale as dependências do projeto:</li>
            <code>composer install</code>
            <li>Gere a chave da aplicação:</li>
            <code>php artisan key:generate</code>
            <li>Libere as permissões para a pasta <code>cache</code> e <code>storage</code>:</li>
            <code>chmod -R 777 storage</code><br>
            <code>chmod -R 777 bootstrap/cache</code>
            <li>Rode o servidor do artisan:</li>
            <code>php artisan serve --port=8001</code>
        </ol>

        <h4 class="mt-4">Opção 2: Usando Docker</h4>
        <ol>
            <li>Navegue até a pasta do projeto:</li>
            <code>cd /caminho/para/o/projeto</code>
            <li>Instale as dependências com o Docker Compose:</li>
            <code>docker-compose up -d</code>
            <li>Acesse o contêiner em execução do Laravel:</li>
            <code>docker exec -it <nome_do_container> /bin/bash</code>
            <li>Instale as dependências do projeto:</li>
            <code>composer install</code>
            <li>Dentro do contêiner, dê as permissões e execute o script init.sh:</li>
            <code>chmod +x init.sh</code><br>
            <code>./init.sh</code>
        </ol>
    </section>

    <section id="contato" class="mt-5">
        <h2 class="mb-4">Contato</h2>
        <p>Para dúvidas, entre em contato pelo e-mail: <a href="mailto:it.brunoms@gmail.com">it.brunoms@gmail.com</a></p>
    </section>
</main>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Objective - Teste Técnico Desenvolvedor Sênior</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
