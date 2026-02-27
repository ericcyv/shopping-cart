# 🛒 ShopCart — Modern PHP Shopping Cart

A sleek, full-featured shopping cart web application built with **PHP**, **MySQL**, and a **modern dark-mode UI**. Designed to demonstrate a complete e-commerce CRUD workflow with a premium glassmorphism aesthetic.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

---

## ✨ Features

- **Add Products** — Upload product name, price, and image via an intuitive form
- **Browse & Shop** — View all products in a responsive card grid layout
- **Cart Management** — Add items to cart, update quantities, and remove items
- **Product Admin** — View, edit, and delete products from a management dashboard
- **Grand Total** — Automatic subtotal/grand total calculation in the cart
- **Responsive Design** — Fully mobile-friendly with a collapsible navigation menu
- **Dark Mode UI** — Modern dark theme with glassmorphism, gradients, and subtle animations

---

## 📸 Pages Overview

| Page | Description |
|------|-------------|
| `index.php` | Add new products (name, price, image upload) |
| `shop_products.php` | Browse & add products to your cart |
| `cart.php` | View cart, update quantities, remove items, see grand total |
| `view_products.php` | Admin view — manage (edit/delete) all products |
| `update.php` | Edit an existing product's details |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | PHP (vanilla) |
| **Database** | MySQL |
| **Frontend** | HTML5, CSS3, JavaScript |
| **Styling** | Custom CSS with CSS variables, glassmorphism, Inter font |
| **Icons** | Font Awesome 6 |
| **Server** | XAMPP (Apache + MySQL) |

---

## 🚀 Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or any local PHP/MySQL server)

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/eric-cyv/shopping-cart.git
   ```

2. **Move to your server directory**

   Copy or clone the project into your web server's root directory (e.g., `htdocs` for XAMPP):

   ```
   C:\xampp\htdocs\cart\
   ```

3. **Create the database**

   Open [phpMyAdmin](http://localhost/phpmyadmin) and create a database named `shopping_cart`, then run the following SQL:

   ```sql
   CREATE DATABASE IF NOT EXISTS shopping_cart;
   USE shopping_cart;

   CREATE TABLE products (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       price DECIMAL(10,2) NOT NULL,
       image VARCHAR(255) NOT NULL
   );

   CREATE TABLE cart (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       price DECIMAL(10,2) NOT NULL,
       image VARCHAR(255) NOT NULL,
       quantity INT NOT NULL DEFAULT 1
   );
   ```

4. **Configure the database connection**

   The default connection in `connect.php` uses:

   ```php
   mysqli_connect('localhost', 'root', '', 'shopping_cart');
   ```

   Update the credentials if your setup differs.

5. **Start the server & open in browser**

   Start Apache and MySQL from the XAMPP Control Panel, then visit:

   ```
   http://localhost/cart/
   ```

---

## 📂 Project Structure

```
shopping-cart/
├── css/
│   └── style.css          # All styles — dark mode, glassmorphism, responsive
├── images/                 # Uploaded product images
├── js/
│   └── script.js          # Mobile menu toggle & interactions
├── cart.php               # Shopping cart page
├── connect.php            # MySQL database connection
├── delete.php             # Delete product handler
├── header.php             # Shared navigation header
├── index.php              # Add product form
├── shop_products.php      # Product listing / storefront
├── update.php             # Edit product form
├── view_products.php      # Admin product management table
└── .gitignore
```

---

## 🎨 Design Highlights

- **Dark Theme** — Deep navy background (`#0f172a`) with subtle radial gradient overlays
- **Glassmorphism** — Semi-transparent cards with `backdrop-filter: blur()` effects
- **Gradient Accents** — Indigo-to-violet primary palette, cyan accent colors
- **Micro-animations** — Hover lifts, input focus glows, and slide-in toast notifications
- **Google Fonts** — Clean typography using the [Inter](https://fonts.google.com/specimen/Inter) typeface

---

## 📄 License

This project is open source and available for learning and personal use.

---

<p align="center">
  Built with ❤️ by <a href="https://github.com/eric-cyv">eric-cyv</a>
</p>
