# sigec-migracao-laravel

 - Objetivo do projeto migrar um projeto em produção na qual é utilizado o framework YI para o framework Laravel

# Equipe de desenvolvimento (Tecnologia da SEC - Gerente Sidney Falcão)

# Desenvolvedor responsável: [ Yago L. Martins ]  - (yagolopesmartins777@gmail.com)

# Tecnologias utilizadas

 - Php versão 8.0.9
 - Laravel versão 8x
 - MySQL
 - Git

 # Como utilizar o projeto ?

 - **Passo 01:** Baixar projeto ou clonar diretamente do gitlab
 - **Passo 02:** Executar comando: **$ composer update**
 - **Passo 03:** Criar base de dados (nome da base a sua escolha)
 - **Passo 04:** Renomear arquivo .env.example da raiz do projeto para .env
  - **Passo 04.1:** No arquivo .env setar (inserir) o nome da base criada no passo 03
 - **Passo 05:** executar: 
    - $ php artisan key:generate
    - **$ php artisan migrate**
    - _$ php artisan db:seed_
    - $ php artisan serve

# Principais funcionalidades

 - Criação de pautas/eventos
 - Criação de categorias, subcategorias, ...
 - Sistema de autenticação (controle de acesso)
 - Login/Logout
 - Api externas
