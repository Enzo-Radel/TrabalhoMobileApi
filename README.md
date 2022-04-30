## Requisitos

- php 8

- composer 2

- mysql

## Instruções

1- Clone o projeto do git (git clone https://github.com/Enzo-Radel/TrabalhoMobileApi.git)

(Próximos passos são todos dentro da pasta do projeto)

2- Copiar o arquivo .env.example para .env (cp .env.example .env)

3- Altere no arquivo .env os campos a baixo com os dados que for usar no banco
DB_DATABASE= NOME DO BANCO
DB_USERNAME= NOME USUARIO
DB_PASSWORD= SENHA USUARIO

4- Crie o banco de dados e o usuário com os mesmos dados que colocou no .env

5- atualizar o composer (composer update)

6- rodar as migrations e as seeds (php artisan migrate --seed)

7- php artisan serve