# BanneeManage

BanneeManage is a robust, modern, and scalable Laravel 12.x application built to manage Categories, Products, and Blog Posts. It features a premium, responsive UI powered by **Tailwind CSS v4** and **Alpine.js**, along with enterprise-level backend practices including Soft Deletes, automated Garbage Collection, and secure Error Logging.

## 🚀 Key Features

- **Modern Tech Stack:** Laravel 12.x, PHP 8.2+, Tailwind CSS v4, and Alpine.js.
- **Complete CRUD Systems:** Manage Categories, Products (with image uploads), and Posts.
- **Internationalization (i18n):** Full dual-language support (English / Thai) with session persistence.
- **High-Performance Pagination:** Implements Cursor-based (Keyset) Pagination globally with dynamic limits for massive scalability.
- **Soft Deletes & Data Recovery:** Accidental deletions can be recovered. Data integrity is maintained.
- **Automated Garbage Collection:** Includes a scheduled background task (`CleanDeletedProducts`) to automatically clean up orphaned product images 30 days after deletion.
- **Premium Frontend Architecture:** Clean, minimalist Shadcn-inspired Light UI with component-based Blade architecture eliminating Tailwind class duplication.
- **Security & Performance:** N+1 Query prevention, secure logging mechanisms, and defensive programming against soft-deleted relations.

---

## 🛠️ Requirements

Before starting, ensure your local environment meets the following requirements:

- **PHP:** 8.2 or higher
- **Composer:** Version 2.x
- **Node.js & NPM:** Latest LTS version
- **Database:** SQLite (Default) or MySQL

---

## 💻 Installation Guide

Choose one of the following methods to install and run the project:

### Option A: Using Docker (Laravel Sail) - Recommended
This is the easiest method and does not require PHP or Composer installed on your host machine.

**1. Clone the repository and configure `.env`**
```bash
cp .env.example .env
```
*(Make sure to keep `DB_CONNECTION=mysql` and `DB_HOST=mysql` etc. in `.env` to match the Docker configuration).*

**2. Start Docker Desktop**
Ensure your Docker Desktop is running.

**3. Install PHP Dependencies**
If you have Composer installed locally:
```bash
composer install
```
If you **do not** have Composer installed, run this temporary Docker container to install PHP dependencies:
```bash
docker run --rm \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

**4. Start the Containers**
```bash
./vendor/bin/sail up -d
# Or using docker compose directly:
docker compose up -d
```

**5. Generate Application Key**
```bash
./vendor/bin/sail artisan key:generate
# Or: docker compose exec laravel.test php artisan key:generate
```

**6. Install Frontend Dependencies (Crucial for Windows users)**
Always run `npm install` **inside the Linux container** to ensure that Linux-compatible binaries (such as Rollup/esbuild) are downloaded, preventing `ViteManifestNotFoundException` or `native.js` errors:
```bash
docker compose exec laravel.test npm install
# Or: ./vendor/bin/sail npm install
```

**7. Run Migrations & Seeders**
```bash
docker compose exec laravel.test php artisan migrate --seed
# Or: ./vendor/bin/sail artisan migrate --seed
```

**8. Create Storage Link**
```bash
docker compose exec laravel.test php artisan storage:link
# Or: ./vendor/bin/sail artisan storage:link
```

The application will be accessible at:
- **Web App:** [http://localhost](http://localhost)
- **phpMyAdmin:** [http://localhost:8080](http://localhost:8080)

---

### Option B: Local Installation (Requires PHP 8.2+ & Node.js)

**1. Install PHP Dependencies**
```bash
composer install
```

**2. Install Frontend Dependencies**
```bash
npm install
```

**3. Configure Environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Configure Database**
By default, the local installation uses SQLite. Make sure your `.env` contains:
```env
DB_CONNECTION=sqlite
```

**5. Run Migrations & Seeders**
```bash
php artisan migrate --seed
```

**6. Create Storage Link**
```bash
php artisan storage:link
```

**7. Compile Frontend Assets & Start Servers**
Run Vite dev server:
```bash
npm run dev
```
In a separate terminal, start Laravel dev server:
```bash
php artisan serve
```

The application will be accessible at [http://localhost:8000](http://localhost:8000).

---

## ⚙️ Maintenance & Background Tasks

### Garbage Collection (Clean Deleted Products)

This project uses Soft Deletes for Products. When a product is deleted, its image remains on the disk for 30 days. To clean up old images and permanently delete the database records, a custom Artisan command is scheduled.

You can run this cleanup manually at any time:

```bash
php artisan app:clean-deleted-products
```

_(In a production environment, ensure you have configured Laravel's Scheduler by adding `php artisan schedule:run` to your server's Cron tab)._

---

## 🛡️ License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
