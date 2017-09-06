# Instalação:

## Pré-Requisitos:

- PHP 7.0
- Composer

Após instalar as dependências(PHP 7 e composer) execute os seguintes passos para configurar o projeto:

```
git clone https://github.com/tom-soares/api-cep-example.git
```
```
cd api-cep-example
```
```
composer install
```
Execute o servidor PHP  com este comando:
```
php -S localhost:8002 -t public
```
Acesse o Browser para testar:
```
http://localhost:8002/cep/17507260/sync
```

# Rotas disponíveis:

- Rota faz as chamadas de forma `síncrona`
```
http://localhost:8002/cep/`coloqueocepaqui`/sync
```

- Rota faz as chamadas de forma `assíncrona`
```
http://localhost:8002/cep/'coloqueocepaqui'/async
```
