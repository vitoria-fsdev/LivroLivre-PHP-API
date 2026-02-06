```markdown
# 📚 LivroLivre API - Gerenciamento de Biblioteca

Esta é uma API RESTful desenvolvida em **Laravel** para gerenciar livros e o fluxo de empréstimos e devoluções. O projeto foi atualizado para rodar em um ambiente de contêineres, garantindo que o banco de dados e o servidor sejam idênticos em qualquer máquina.

## 🛠️ Tecnologias Utilizadas

* **PHP 8.3**
* **Laravel Framework**
* **PostgreSQL** (Banco de dados principal)
* **Docker & Laravel Sail** (Ambiente de desenvolvimento)
* **Composer** (Gerenciador de dependências)

---

## 🚀 Instalação e Configuração (com Docker/Sail)

Siga os passos abaixo para rodar o projeto utilizando o ambiente Docker:

### 1. Clonar o repositório

```bash
git clone [https://github.com/vitoria-fsdev/PHP-ApiRestFul.git](https://github.com/vitoria-fsdev/PHP-ApiRestFul.git)
cd PHP-ApiRestFul

```

### 2. Instalar dependências locais

Como o projeto usa o Sail, primeiro instalamos as dependências para gerar a pasta `vendor`:

```bash
composer install

```

### 3. Configurar ambiente

Copie o arquivo de exemplo e ajuste as portas se necessário (o padrão está configurado para a porta **8080** para evitar conflitos no Linux/Pop!_OS):

```bash
cp .env.example .env

```

### 4. Subir os Contêineres

Agora, inicie o servidor e o banco de dados PostgreSQL:

```bash
./vendor/bin/sail up -d

```

> **Dica:** Se você configurou o alias no seu `~/.bashrc`, pode usar apenas `sail up -d`.

### 5. Migrações e Chaves

Com o Docker rodando, prepare o banco de dados:

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed

```

A API estará disponível em: `http://localhost:8080/api`

---

## 🐳 Comandos Úteis do Docker/Sail

| Comando | Descrição |
| --- | --- |
| `sail up -d` | Sobe os contêineres em segundo plano. |
| `sail stop` | Para os contêineres sem removê-los. |
| `sail down` | Para e remove os contêineres e redes. |
| `sail artisan {comando}` | Executa comandos do Artisan dentro do Docker. |
| `sail logs -f` | Acompanha os logs em tempo real. |

---

## 🧠 Arquitetura e Funcionalidades

* **Ambiente Dockerizado:** Isolamento total com PostgreSQL e PHP-FPM via Sail.
* **API Resources:** Transformação de dados para respostas JSON consistentes.
* **PostgreSQL:** Utilização de um banco de dados relacional robusto para gerenciar livros e empréstimos.
* **Relacionamentos Eloquent:** Vínculo entre livros e registros de empréstimo.
* **Form Requests:** Validações customizadas para garantir integridade nos dados dos livros.

---

### Endpoints da API

| Método | Endpoint | Descrição |
| --- | --- | --- |
| **GET** | `/api/books` | Lista todos os livros. |
| **POST** | `/api/books` | Cadastra um novo livro. |
| **POST** | `/api/books/{id}/borrow` | Realiza o empréstimo de um livro. |
| **POST** | `/api/books/{id}/return` | Realiza a devolução de um livro. |

---

## 👩‍💻 Autora

**Maria Vitória** - *Desenvolvedora em treinamento*

* [GitHub](https://github.com/vitoria-fsdev)
* [LinkedIn](https://www.google.com/search?q=https://www.linkedin.com/in/seu-perfil)

```



**Gostaria que eu criasse uma descrição de projeto bem chamativa para você colocar no seu perfil do LinkedIn sobre esse sistema de biblioteca?**

```
