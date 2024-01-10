
# gerenciamento-de-investimentos-api


Neste desafio, a missão é construir uma API para gerenciar investimentos. A aplicação deve oferecer funcionalidades para criar, visualizar, retirar e listar investimentos. 


## Instalação

Certifique-se de ter o PHP instalado em sua máquina.
Instale o Composer, caso ainda não o tenha.

- Dependências

Symfony Webpack Encore:
para gerenciar facilitar a configuração do Webpack.
```bash
  composer require symfony/webpack-encore-bundle
```

Componente Serializer.

```bash
  composer require symfony/serializer
```

Componente Brick/Math:
```bash
  composer require brick/math
```

## Documentação da API

### Criar Proprietário

```http
   POST /proprietario

```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `nome` | `string` | **Obrigatório**. Nome do proprietário |

#### Buscar Proprietário

```http
    GET /proprietario/${proprietarioId}

```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `id` | `int` | **Obrigatório**. Id do proprietario |

### Buscar Investimentos de um Proprietário

```http
  GET /proprietario/{proprietarioId}/investimentos?pagina={pagina}&itens_por_pagina={itens_por_pagina}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `proprietarioId`      | `int` | **Obrigatório**.  ID do proprietário para listar investimentos |
| | |  |
| `pagina`      | `int` | Número da página desejada (opcional, padrão: 1) |
| | |  |
| `itens_por_pagina`      | `int` | Número de itens por página (opcional, padrão: 10)|


### Adicionar Investimento para um Proprietário

```http
  POST /proprietario/investimento/{proprietarioId}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `proprietarioId`      | `int` | Obrigatório. ID do proprietário |
| | |  |
| `valorInicial`      | `string` | Formato: 1000.00 |
| | |  |
| `criadoEm`      | `DateTime` | Formato: 2024-01-01 00:00:00 |

### Sacar um Investimento

```http
  GET /proprietario/{proprietarioId}/investimento/{investimentoId}/sacar
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `proprietarioId`      | `int` | Obrigatório. ID do proprietário |
| | |  |
| `investimentoId`      | `int` | Obrigatório. ID do investimento |

                                                                                          





## Referência

 - [Symfony - Mapeamento de Dados de Solicitação para Objetos Tipados (Symfony 6.3)](https://symfony.com/blog/new-in-symfony-6-3-mapping-request-data-to-typed-objects)
 - [Componente Brick/Math - BigDecimal](https://github.com/brick/math/blob/0.12.0/src/BigDecimal.php)
 - [Métodos HTTP - Mozilla Developer Network (MDN)](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Methods)

