<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# SportsBet Live Laravel React

A web application for live soccer scores and sports betting, built with Laravel (API backend) and React (frontend).

---

## Clone the Repository

**SSH:**
```bash
git clone git@github.com:sashokrist/sportsbet-live-laravel-react.git
```

**HTTPS:**
```bash
git clone https://github.com/sashokrist/sportsbet-live-laravel-react.git
```

---

## Installation & Running

### 1. Backend (API - Laravel)

```bash
cd sportsbet-live-laravel-react
composer install
cp .env.example .env
php artisan key:generate
# Set up your database credentials in .env
php artisan migrate --seed
php artisan serve
```

API will be available at: `http://127.0.0.1:8000`

---

### 2. Frontend (React + Vite)

```bash
npm install
npm run dev
```

Frontend will be available at: `http://localhost:5173` (or as configured in Vite)

---

## Functionality

- Live soccer scores
- User authentication (register/login)
- Place and manage bets
- View match details and statistics

---

## Main Routes

### API Routes (`routes/api.php`)
- `POST /api/register` — Register user
- `POST /api/login` — Login user
- `GET /api/matches` — List matches
- `GET /api/matches/{id}` — Match details
- `POST /api/bets` — Place bet

### Web Routes (`routes/web.php`)
- `/` — Home (React app)
- `/login` — Login page
- `/register` — Register page

---

## Project Structure

```
sportsbet-live-laravel-react/
├── app/                # Laravel backend code
├── resources/
│   ├── js/             # React frontend (Vite)
│   └── views/          # Blade templates
├── routes/
│   ├── api.php         # API routes
│   └── web.php         # Web routes
├── public/
├── database/
├── .env
├── package.json
├── vite.config.js
└── README.md
```

---

## Author

**sasho_dev**
