
# 🎵 Harmonia Local

**Harmonia Local** is a platform for local artists to share their music. Users can share videos of their songs, leave comments, and like posts.

## 🚀 Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### 📋 Prerequisites

Make sure you have the following installed on your machine:

- PHP >= 8.0
- Composer
- PostgreSQL
- Node.js with npm
- Git

### 📦 Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/viniciusVitorio/harmonia-local.git
    cd harmonia-local
    ```

2. Install PHP dependencies:

    ```sh
    composer install
    ```

3. Install Node.js dependencies:

    ```sh
    npm install
    ```

4. Copy the `.env.example` file to `.env`:

    ```sh
    cp .env.example .env
    ```

5. Configure the `.env` file with your PostgreSQL database credentials.

6. Generate the application key:

    ```sh
    php artisan key:generate
    ```

7. Run the database migrations:

    ```sh
    php artisan migrate
    ```

8. Start the local server:

    ```sh
    php artisan serve
    ```

### 🎨 Using Tailwind CSS

Make sure Tailwind CSS is properly configured in the project. To compile the assets with Vite, use the command:

```sh
npm run dev
```

### 🎶 Features

- 🎤 **Music Posting**: Artists can upload videos of their songs.
- 👍 **Likes**: Users can like posted songs.
- 💬 **Comments**: Users can comment on music posts.
- 🔐 **Authentication**: User authentication using Laravel Breeze.

### 🛠️ Technologies Used

- Laravel
- PostgreSQL
- Tailwind CSS
