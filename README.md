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

 - **Passo 01:** Baixar projeto zip ou clonar diretamente do gitlab: **$ git clone url...**
 
 - **Passo 02:** Criar base de dados (nome da base a sua escolha)
 - **Passo 03:** Criar arquivo .env na raiz do projeto ou Renomear arquivo .env.example da raiz do projeto para .env
  - **Passo 03.1:** No arquivo .env setar (inserir) o nome da base criada no passo 02
 - **Passo 04:** Executar comando: **$ composer update**
 - **Passo 05:** executar: 
    - **$ php artisan serve**
      -Abrir navegador (Sua preferência) e acessar: http://localhost:8000/
    - $ php artisan key:generate (OPCIONAL)
    - $ php artisan migrate (OPCIONAL)
    - $ php artisan db:seed (OPCIONAL)
    

# Principais funcionalidades

 - Criação de pautas/eventos
 - Criação de categorias, subcategorias, ...
 - Sistema de autenticação (controle de acesso)
 - Login/Logout
 - Api externas
