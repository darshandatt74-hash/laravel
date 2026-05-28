# MYSHOP

Luxury Ecommerce Platform built with Laravel & Tailwind CSS.

---

# Overview

MYSHOP is a premium dark-themed ecommerce web application inspired by luxury fashion brands and modern shopping experiences.

The platform includes:

- User Authentication
- Admin Dashboard
- Product Management
- Shopping Cart
- Orders System
- Profile Management
- Live Product Listings
- Category System
- Responsive UI
- Luxury Dark Theme

---

# Tech Stack

| Technology | Usage |
|------------|-------|
| Laravel | Backend Framework |
| Tailwind CSS | UI Design |
| Blade | Frontend Templates |
| MySQL | Database |
| Vite | Asset Bundler |

---

# Features

## User Side

- Premium Home Page
- Register/Login
- User Dashboard
- Product Browsing
- Add To Cart
- Quantity Increase/Decrease
- Place Orders
- Profile Management
- Order History

---

## Admin Side

- Admin Dashboard
- Add Products
- Edit/Delete Products
- Manage Orders
- Manage Users
- Settings Panel
- Revenue Overview

---

# Installation

## Clone Repository

```bash
git clone https://github.com/darshandatt74-hash/laravel.git
```

---

## Open Project

```bash
cd laravel
```

---

## Install Dependencies

```bash
composer install
```

```bash
npm install
```

---

## Environment Setup

```bash
cp .env.example .env
```

---

## Generate App Key

```bash
php artisan key:generate
```

---

## Database Migration

```bash
php artisan migrate
```

---

## Run Development Server

```bash
npm run dev
```

```bash
php artisan serve
```

---

# Admin Credentials

## Admin Login

| Email | Password |
|------|------|
| admin@gmail.com | darshan123 |

---

# User Credentials

| Email | Password |
|------|------|
| user@gmail.com | 12345678 |

---

# Project Screenshots

## Home Page

![Home](screenshots/Screenshot%20(725).png)

---

## Login Page

![Login](screenshots/Screenshot%20(723).png)

---

## Register Page

![Register](screenshots/Screenshot%20(724).png)

---

## User Dashboard

![Dashboard](screenshots/Screenshot%20(726).png)

---

## Shop Page

![Shop](screenshots/Screenshot%20(727).png)

---

## Cart Page

![Cart](screenshots/Screenshot%20(728).png)

---

## Orders Page

![Orders](screenshots/Screenshot%20(729).png)

---

## Profile Page

![Profile](screenshots/Screenshot%20(730).png)

---

## Admin Dashboard

![Admin Dashboard](screenshots/Screenshot%20(732).png)

---

## Product Management

![Products](screenshots/Screenshot%20(733).png)

---

## Orders Management

![Orders](screenshots/Screenshot%20(734).png)

---

## Patrons Management

![Patrons](screenshots/Screenshot%20(735).png)

---

## Settings Management

![Settings](screenshots/Screenshot%20(736).png)

---


# Folder Structure

```bash
screenshots/
├── home.png
├── login.png
├── register.png
├── dashboard.png
├── shop.png
├── cart.png
├── orders.png
├── profile.png
├── admin-dashboard.png
├── admin-products.png
├── admin-orders.png
```

---

# Build Commands

## Development

```bash
npm run dev
```

---

## Production

```bash
npm run build
```

---

# Deployment

## Render Build Command

```bash
composer install && npm install && npm run build
```

---

## Render Start Command

```bash
php artisan serve --host=0.0.0.0 --port=$PORT
```

---

# Environment Variables

```env
APP_NAME=MYSHOP
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.onrender.com
ASSET_URL=https://yourdomain.onrender.com
SESSION_DRIVER=file
```

---

# Force HTTPS

## AppServiceProvider.php

```php
use Illuminate\Support\Facades\URL;

public function boot(): void
{
    if(env('APP_ENV') === 'production'){
        URL::forceScheme('https');
    }
}
```

---

# Cache Clear

```bash
php artisan optimize:clear
```

---

# Storage Link

```bash
php artisan storage:link
```

---

# Upcoming Features

- Razorpay Integration
- Stripe Payments
- Wishlist
- Reviews & Ratings
- Email Verification
- Forgot Password
- Search Filters
- Product Variants
- Analytics Dashboard
- Invoice System
- Notifications

---

# Author

## Darshan Datt

Premium Laravel Ecommerce Project

---

# License

MIT License
