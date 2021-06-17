# TCC
Teste cadastro de clientes

## Instruções ##

Exemplo: https://tcc.uemerson.com

<ol>
  <li>Clone o repositório</li>
  <li>Rode o comando <code>composer update</code> dentro da pasta raiz</li>
  <li>Configure a conexão com o banco de dados no arquivo <b>.env</b></li>
  <li>Caso o banco de dados não estiver criado, rode o comando <code>bin/console doctrine:database:create</code></li>
  <li>Rode o migrate usando o comando <code>bin/console doctrine:migrations:migrate</code></li>
</ol>

<ul>
  <li>Symfony 5</li>
  
  <li>MySQL 5.7</li>
    <ul>
      <li>driver: 'pdo_mysql'</li>
      <li>charset: utf8mb4</li>
      <li>collate: utf8mb4_unicode_ci</li>
    </ul>
</ul>

