README EX1:

Listagem de Usuários

 URL
/public/users.php

 Descrição
Exibe todos os usuários cadastrados no arquivo storage/users.txt em formato de tabela (nome e e-mail).

 Limitações
- Sem paginação ou ordenação.
- Dados carregados diretamente do arquivo de armazenamento.
- Apenas leitura (não há exclusão ou edição).

 Fluxo interno
- FileUserRepository::findAll() → lê e converte o arquivo.
- ListUsersService::execute() → orquestra e retorna o array.
- users.php → exibe HTML com tabela simples.


--------------------------------------------------------------------------------------------

README EX2:
 Projeto: Cadastro e Listagem de Produtos (PHP + SRP)

 Descrição

Este projeto é um sistema simples de cadastro e listagem de produtos, feito em PHP puro, aplicando:

- O princípio da responsabilidade única (SRP)  
- O padrão PSR-4 para autoload com o Composer 
- Uma arquitetura em camadas (Application, Domain, Infra, Contracts) 

Os dados dos produtos são salvos em um arquivo texto (JSON por linha), sem banco de dados.


 Objetivos

- Separar corretamente as responsabilidades (SRP).  
- Usar o autoload do Composer (PSR-4).  
- Organizar o código em camadas.  
- Criar e listar produtos.  
- Validar dados corretamente.  
- Seguir o padrão de código PSR-12.


Regras de Negócio

O ID é incremental (começa em 1 se o arquivo estiver vazio).

O nome não precisa ser único.

O preço não pode ser negativo.




CASOS DE TESTE:

1. Cadastro válido
name="Teclado", price=120.50
Produto salvo e exibido

3. Nome muito curto
 	name="T", price=50
 		Erro de validação
 Preço negativo
 	name="Mouse", price=-10
 Erro de validação
10. Lista vazia	Nenhum produto cadastrado	Mensagem: “Nenhum produto cadastrado”
11. Múltiplos cadastros	3 produtos diferentes	IDs 1, 2, 3 em ordem


 Estrutura do Projeto

 products-srp-demo/
├── composer.json
├── vendor/
├── src/
│ ├── Contracts/
│ │ ├── ProductRepository.php
│ │ └── ProductValidator.php
│ ├── Application/
│ │ └── ProductService.php
│ ├── Domain/
│ │ └── SimpleProductValidator.php
│ └── Infra/
│ └── FileProductRepository.php
├── public/
│ ├── index.php # Formulário para cadastrar produto
│ ├── create.php # Recebe os dados e cria o produto
│ └── products.php # Lista os produtos
└── storage/
└── products.txt # Arquivo com produtos salvos (JSON por linha)


