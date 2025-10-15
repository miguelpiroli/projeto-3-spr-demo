# products-srp-demo

Projeto: Cadastro e Listagem de Produtos (PHP puro + Composer)

## Objetivo
Criar um sistema do zero aplicando SRP, PSR-4, separação de camadas e persistência em arquivo (JSON por linha).

## Estrutura
- `composer.json` - autoload PSR-4 (namespace App\)
- `src/Contracts` - interfaces (ProductRepository, ProductValidator)
- `src/Application` - ProductService
- `src/Domain` - SimpleProductValidator
- `src/Infra` - FileProductRepository
- `public/` - interface web (index.php, create.php, products.php)
- `storage/products.txt` - persistência (um JSON por linha)

## Como executar
1. Tenha PHP e Composer instalados.
2. No terminal, na pasta do projeto, rode `composer install` para gerar `vendor/autoload.php`.
3. Sirva o diretório `public/` via servidor web (XAMPP) ou use `php -S localhost:8000 -t public`.
4. Acesse:
   - Formulário de cadastro: `index.php`
   - Criação (POST): `create.php`
   - Listagem: `products.php`

## Regras aplicadas (conforme PRD)
- Entidade: Produto { id:int, name:string, price:float }.
- Validações:
  - `name` não vazio, entre 2 e 100 caracteres.
  - `price` numérico e >= 0.
- Persistência: `storage/products.txt` com *JSON por linha*.
- ID incremental (lido do último registro ou começa em 1).
- PSR-4 + SRP: separação clara entre validação, orquestração e persistência.
- ProductService não faz I/O direto (apenas orquestra).
- FileProductRepository é o único responsável por ler/escrever em arquivo.
