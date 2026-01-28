```markdown
# 📚 LivroLivre API - Gerenciamento de Biblioteca

Esta é uma API RESTful desenvolvida em **Laravel** para gerenciar livros e o fluxo de empréstimos e devoluções. O projeto utiliza as melhores práticas do framework, incluindo Resources, Form Requests e Factories.

## 🛠️ Tecnologias Utilizadas

* **PHP 8.2+**
* **Laravel Framework**
* **SQLite** (Banco de dados)
* **Composer** (Gerenciador de dependências)

---

## 🚀 Instalação e Configuração

Siga os passos abaixo para rodar o projeto localmente no seu sistema (ex: Pop!_OS):

```
### 1. Clonar o repositório

```bash
git clone [https://github.com/vitoria-fsdev/PHP-ApiRestFul.git](https://github.com/vitoria-fsdev/PHP-ApiRestFul.git)
cd PHP-ApiRestFul

```

### 2. Instalar dependências

```bash
composer install

```

### 3. Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate

```

*Certifique-se de que o `DB_CONNECTION` no seu `.env` está configurado para `sqlite`.*

### 4. Migrações e Dados Fictícios (Seeding)

Para criar as tabelas e já popular a biblioteca com dados de teste:

```bash
php artisan migrate:fresh --seed

```

### 5. Rodar o servidor

```bash
php artisan serve

```

A API estará disponível em: `http://localhost:8000/api`

---

### Endpoints do projeto

| Método | Endpoint | Descrição |
| --- | --- | --- |
| **GET** | `/api/books` | Lista todos os livros cadastrados. |
| **POST** | `/api/books` | Cadastra um novo livro (Requer validação). |
| **POST** | `/api/books/{id}/borrow` | Realiza o empréstimo de um livro para um usuário. |
| **POST** | `/api/books/{id}/return` | Realiza a devolução e libera o livro no estoque. |

---

## 🧠 O que foi aplicado neste projeto?

* **ORM Eloquent:** Gerenciamento de dados e relacionamentos.
* **API Resources:** Formatação padronizada das respostas JSON.
* **Form Requests:** Validação de dados isolada da lógica de negócio.
* **Artisan CLI:** Automação de criação de arquivos e gestão de banco.
* **Mass Assignment:** Proteção de colunas com `$fillable`.
* **Try/Catch & Logging:** Tratamento de erros robusto.

---

## 👩‍💻 Autora

**Maria Vitória** - *Desenvolvedora em treinamento*

* [GitHub](https://github.com/vitoria-fsdev)

```
