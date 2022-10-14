# Projeto teste

Um projeto desenvolvido para um teste

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/MarcelloMonteiro/projeto-teste.git
```

Entre no diretório do projeto

```bash
  cd projeto-teste
```

Instale as dependências

```bash
  composer install
```

Migrates

```bash
  php artisan migrate
```

Inicie o servidor

```bash
  php artisan serve
```

## Documentação da API

#### Cadastro de usuarios

```http
  POST /products
```

| Parâmetro    | Tipo     | Descrição                           |
| :----------- | :------- | :---------------------------------- |
| `nome`       | `string` | **Obrigatório**. A chave da sua API |
| `cpf`        | `string` | **Obrigatório**. A chave da sua API |
| `endereco`   | `string` | **Obrigatório**. A chave da sua API |
| `nascimento` | `date`   | **Obrigatório**. A chave da sua API |
| `sexo`       | `string` | **Obrigatório**. A chave da sua API |
| `estado`     | `date`   | **Obrigatório**. A chave da sua API |
| `cidade`     | `date`   | **Obrigatório**. A chave da sua API |

#### Retorna todos ou um usuario buscando por ID ou EMAIL

```http
  GET /search
```

| Parâmetro    | Tipo     | Descrição                                                   |
| :----------- | :------- | :---------------------------------------------------------- |
| `nome`       | `string` | Não são **Obrigatório**. O nome do item que você quer       |
| `cpf`        | `string` | Não são **Obrigatório**. O cpf do item que você quer        |
| `nascimento` | `date`   | Não são **Obrigatório**. O nascimento do item que você quer |
| `sexo`       | `string` | Não são **Obrigatório**. O sexo do item que você quer       |
| `estado`     | `date`   | Não são **Obrigatório**. O estado do item que você quer     |
| `cidade`     | `date`   | Não são **Obrigatório**. O cidade do item que você quer     |
