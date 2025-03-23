# Tentang SPBE

SPBE merupakan singkatan dari Sistem Pemerintahan Berbasis Elektronik, Sistem Pemerintahan Berbasis Elektronik (SPBE) adalah penyelenggaraan pemerintahan yang memanfaatkan teknologi informasi dan komunikasi untuk memberikan layanan kepada Pengguna SPBE.

### Application Features

-   Evaluasi Penilaian SPBE
-   Data Aplikasi
-   Portal CMS

### Technology Features

-   Laravel 11
-   Template Stisla
-   Breeze
-   Bootstrap 4
-   Sweetalert
-   Spatie

## Installation Guide

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js
-   NPM

### Installation Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/putuokky/spbe-lara-v3.git
    ```

2. Navigate into the project directory:

    ```bash
    cd spbe-lara-v3
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install && npm run dev
    ```

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations then use seeder `--seed`:

    ```bash
    php artisan migrate
    ```

    ```bash
    php artisan migrate:refresh --seed
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```
