# ☕ Coffee-Ko Ordering & Admin System

A full-stack coffee shop system with **Customer Ordering** and **Admin Dashboard**.  
Built with **Laravel + MySQL (Backend)** and **React Native (Admin Frontend)**.

---

## 🚀 Features

### Customer Side
- Product Catalog (Espresso, Fruit Tea, Frappes, Snacks, etc.)
- Add to Cart (with size & temperature options)
- Checkout & Order Confirmation
- Voucher System

### Admin Side
- Dashboard with Sales Today, Products, Deliveries, Inventory
- Manage Products & Ingredients
- Track Orders in Real-Time
- Sales Reports

---

## 🛠️ Tech Stack
- **Backend:** Laravel 10, MySQL  
- **Frontend (Customer):** Laravel Blade + Bootstrap  
- **Frontend (Admin):** React Native + Axios  
- **Authentication:** Laravel Sanctum  
- **API:** REST (JSON-based)

---

## ⚙️ Installation Guide

### Backend (Laravel)
```bash
# Clone project
git clone https://github.com/your-org/coffee-ko-backend.git
cd coffee-ko-backend

# Install dependencies
composer install
cp .env.example .env

# Configure database in .env
php artisan key:generate
php artisan migrate --seed

# Run server (default port 8000)
php artisan serve --port=8000
