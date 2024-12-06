# Filament CMS Boilerplate

This project is a custom Laravel-based CMS leveraging **FilamentPHP** for managing resources like blog posts, users, roles, and more. It includes rich text editing, media management, and other features for building powerful admin panels.

## Features

-   Pages with block-based and layout builder
-   Blog Post Management (CRUD) with categories, tags, and author
-   User and Role Management
-   Media Upload and Organization
-   SEO Metadata Support
-   Dashboard Widgets
-   Manage settings
-   API-ready with Laravel

---

## Plugins used

-   :construction: User Roles & Permissions - Shield by Bezhan Salleh
-   Media Library - Curator by Adam Weston
-   Page Builder Block-Based - Fabricator by ZedoX
-   Tags - Spatie Tags by Filament
-   Settings - Spatie Settings by Filamen
-   :construction: Menu - Tree by Solution Forest

## Installation Guide

### Prerequisites

Ensure you have the following installed on your system:

-   PHP 8.1 or higher
-   Composer
-   Laravel 11.x
-   Node.js and npm (for assets)
-   MySQL or other supported database
-   A web server like Apache or Nginx

### Step 1: Clone the Repository

```bash
git clone https://github.com/kfernandez-mesasix/filament-cms.git
cd filament-cms
```

---

### Step 2: Install Dependencies

Backend Dependencies

```bash
composer install
```

Frontend Dependencies

```bash
npm install
npm run dev
```

---

### Step 3: Set Up the Environment File

Create a .env file by copying the example file:

```bash
cp .env.example .env
```

Edit the .env file to configure your database and other environment variables:

```bash
APP_NAME="FilamentCMS"
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=filament_cms
DB_USERNAME=root
DB_PASSWORD=your_password
```

---

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

---

### Step 5: Run Migrations and Seed Database

```bash
php artisan migrate --seed
```

---

### Step 6: Install FilamentPHP

```bash
php artisan make:filament-user
```

Follow the prompts to create an admin user.

---

Step 7: Start the Development Server

```bash
php artisan serve
```

Access the application at http://localhost:8000.

The Filament Admin Panel is available at /admin. Log in using the admin credentials you created earlier.

---

### Build Assets for Production

```bash
npm run build
```

---

### Contributing

If you'd like to contribute, feel free to fork the repository and submit a pull request. Ensure your code adheres to Laravel and FilamentPHP best practices.

---

### License

This project is licensed under the MIT License.
