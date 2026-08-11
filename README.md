# Projeto Raízes do Nordeste

API Laravel executada via Docker.

## Requisitos

- Docker instalado
- Porta `80` livre no host

## 1) Build da imagem

No diretório raiz do projeto:

```bash
docker build -t raizes-nordeste:1.0 .
```

## 2) Subir o container

```bash
docker run -it --name containerRaizes -p 80:8000 -v .:/var/www raizes-nordeste:1.0 bash
```

## 3) Setup do Laravel dentro do container

### 3.1 Criar o arquivo `.env`

```bash
cp .env.example .env
```

### 3.2 Configurar SQLite no `.env`

Edite o `.env` para ficar com estes valores:

```env
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
```

### 3.3 Criar o banco SQLite

```bash
touch database/database.sqlite
```

### 3.4 Instalar dependências PHP

```bash
composer install
```

### 3.5 Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 3.6 Rodar migrations e seeders

```bash
php artisan migrate
php artisan db:seed
```

## 4) Iniciar a aplicação

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

A API ficará disponível em `http://localhost/api/v1`.

## 5) Rota para documentação swagger:
https://app.swaggerhub.com/apis-docs/student-167-95d/raizesdonordeste/1.0.0?view=uiDocs

## 6) Coleção de requisições do Postman
Importar o arquivo RaizesDoNordeste.postman_collection.json no postman
 **começar pelo teste Login válido, presente na pasta Auth.**
