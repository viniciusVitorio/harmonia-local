# 🎵 Harmonia Local

**Harmonia Local** é uma plataforma para artistas locais divulgarem suas músicas. Os usuários podem compartilhar vídeos de suas músicas, deixar comentários e dar likes nas publicações.

## 🚀 Começando

Siga estas instruções para obter uma cópia do projeto em funcionamento no seu ambiente local para fins de desenvolvimento e testes.

### 📋 Pré-requisitos

Certifique-se de ter o seguinte instalado na sua máquina:

- PHP >= 8.0
- Composer
- PostgreSQL
- Node.js com npm
- Git

### 📦 Instalação

1. Clone o repositório:

    ```sh
    git clone https://github.com/harmonia-local/harmonia-local.git
    cd harmonia-local
    ```

2. Instale as dependências do PHP:

    ```sh
    composer install
    ```

3. Instale as dependências do Node.js:

    ```sh
    npm install
    ```

4. Copie o arquivo `.env.example` para `.env`:

    ```sh
    cp .env.example .env
    ```

5. Configure o arquivo `.env` com suas credenciais de banco de dados PostgreSQL.

6. Gere a chave da aplicação:

    ```sh
    php artisan key:generate
    ```

7. Execute as migrações do banco de dados:

    ```sh
    php artisan migrate
    ```

8. Inicie o servidor local:

    ```sh
    php artisan serve
    ```

### 🎨 Usando Tailwind CSS

Certifique-se de que o Tailwind CSS está configurado corretamente no projeto. Para compilar os assets com Vite, use o comando:

```sh
npm run dev
```

### 🎶 Funcionalidades

- 🎤 **Publicação de Músicas**: Artistas podem fazer upload de vídeos das suas músicas.
- 👍 **Likes**: Usuários podem curtir as músicas postadas.
- 💬 **Comentários**: Usuários podem comentar nas postagens de música.
- 🔐 **Autenticação**: Autenticação de usuários usando Laravel Breeze.

### 🛠️ Tecnologias Utilizadas

- Laravel
- PostgreSQL
- Tailwind CSS
