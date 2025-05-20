# Sistema de Vendas

## Tecnologias utilizadas
- Laravel (API REST)
- Vue.js
- Bootstrap
- Axios
- MySQL

## Como rodar o projeto
no arquivo .env configure o banco de dados


cd projeto-venda
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


cd projeto-venda
npm install
npm run dev


por fim acessar  http://127.0.0.1:8000