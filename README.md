# Simple Learning Management System (LMS)

A Laravel-based Learning Management System with instructor and student roles.

## Features

- User authentication (Instructor & Student roles)
- Course creation and management (Instructors)
- Course browsing and viewing (Students)
- Instructor dashboard
- Course CRUD operations

## Installation

1. Clone the repository
```bash
git clone https://github.com/brylle60/Learning-Management-System.git
cd Learning-Management-System
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`

5. Run migrations
```bash
php artisan migrate
```

6. Start development server
```bash
php artisan serve
npm run dev
```

## Test Accounts

- Instructor: instructor@test.com / password
- Student: student@test.com / password

## Tech Stack

- Laravel 11
- MySQL
- Tailwind CSS
- Blade Templates

## Group Members

1. [Name] - Leader
2. [Name] - Developer
3. [Name] - Developer
4. [Name] - Developer
5. [Name] - Developer

## Live Demo

[Your deployed URL here]