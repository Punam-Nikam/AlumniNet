
<div align="center">

# 🎓 AlumniNet

### College Alumni Network & Job Referral Platform

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)

*A full-stack web application that connects college alumni, enables job referrals, and fosters professional networking.*


</div>

---

## 📌 Project Overview

**AlumniNet** is a college alumni network and job referral platform built with Laravel 12. It bridges the gap between graduating students and working professionals from the same institution — enabling alumni to connect, refer jobs, and grow together professionally.

> Think of it as a LinkedIn — but exclusively for your college alumni community.

### 🎯 Problem It Solves
- Students struggle to find job referrals from alumni at top companies
- Alumni have no centralized platform to stay connected with their college network
- College administrations lack tools to manage and verify alumni registrations

### ✅ How AlumniNet Solves It
- Alumni register and get verified by admin before accessing the platform
- Verified alumni can browse the directory, connect with peers, and post job referrals
- Students can request referrals directly from alumni working at their dream companies

---

## ✨ Features

### 👤 Authentication & Authorization
- Alumni registration with **admin approval workflow**
- Secure login with **bcrypt password hashing**
- Role-based access control (**Admin** vs **Alumni**)
- Session-based authentication using Laravel Auth

### 🗂️ Alumni Directory
- Browse all verified alumni in a responsive card grid
- **Real-time search** by name, company, or role
- **Filter** by branch, batch year, and company
- Eloquent Query Builder with chained `where()` conditions

### 🤝 Connection System
- Send connection requests to fellow alumni
- Accept or reject incoming requests
- View all sent and received connection requests
- **Email notification** sent automatically on new connection request

### 💼 Job Referral Board
- Alumni post job openings at their companies
- Full job details with location, type, and description
- **Request referral via email** directly from job detail page
- Job poster can delete their own listings
- Supports full-time, part-time, and internship types

### 🛡️ Admin Panel
- Dedicated admin dashboard with live statistics
- Approve or reject pending alumni registrations
- View all approved alumni in a sortable table
- Stats: Total, Approved, Pending, Rejected alumni counts

### 📧 Email Notifications
- Laravel Mailable classes for structured emails
- Connection request email with sender profile details
- Job alert email with full job information
- Configured with log driver for development (swap to SMTP for production)

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | Laravel 12 (PHP 8.2) |
| **Frontend** | HTML5, Bootstrap 5.3, Bootstrap Icons |
| **Database** | MySQL 8.0 with Eloquent ORM |
| **Authentication** | Laravel Auth (session-based) |
| **Email** | Laravel Mail with Mailable classes |
| **Template Engine** | Laravel Blade |
| **Package Manager** | Composer 2.x |
| **Version Control** | Git + GitHub |
| **Local Server** | XAMPP (Apache + MySQL) |
| **Deployment** | AWS EC2 (Ubuntu 22.04) | future scope

---

## 🗄️ Database Design

### Tables

#### `alumni`
#### `job_posts`
#### `connections`
#### `messages`


## 📁 Project Structure

```
alumninet/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AlumniController.php        # Directory + search + filters
│   │       ├── AdminController.php         # Admin dashboard + approvals
│   │       ├── JobPostController.php       # Job CRUD + applications
│   │       ├── ConnectionController.php    # Connect + accept/reject
│   │       └── Auth/
│   │           ├── LoginController.php     # Login + logout
│   │           └── RegisterController.php  # Registration flow
│   ├── Mail/
│   │   ├── ConnectionRequestMail.php       # Connection email
│   │   └── JobAlertMail.php               # Job alert email
│   └── Models/
│       ├── Alumni.php                      # Auth model + relationships
│       ├── JobPost.php                     # Job model
│       ├── Connection.php                  # Connection model
│       └── Message.php                     # Message model
│
├── database/
│   ├── migrations/                         # All table schemas
│   └── seeders/
│       ├── AlumniSeeder.php               # Sample alumni data
│       └── JobPostSeeder.php              # Sample job data
│
├── resources/
│   └── views/
│       ├── alumni/
│       │   └── index.blade.php            # Alumni directory
│       ├── auth/
│       │   ├── login.blade.php            # Login page
│       │   └── register.blade.php         # Registration page
│       ├── jobs/
│       │   ├── index.blade.php            # Job listings
│       │   ├── create.blade.php           # Post job form
│       │   └── show.blade.php             # Job detail + apply
│       ├── connections/
│       │   └── index.blade.php            # My connections
│       ├── admin/
│       │   ├── dashboard.blade.php        # Admin panel
│       │   └── alumni.blade.php           # All alumni table
│       └── emails/
│           ├── connection_request.blade.php  # Connection email template
│           └── job_alert.blade.php           # Job alert email template
│
└── routes/
    └── web.php                             # All application routes
```

---

## 🚀 Installation & Setup

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Git

### Step 1 — Clone the repository
```bash
git clone https://github.com/Punam-Nikam/AlumniNet.git
cd AlumniNet
```

### Step 2 — Install dependencies
```bash
composer install
```

### Step 3 — Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4 — Configure database
Open `.env` and update:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alumninet
DB_USERNAME=your_username
DB_PASSWORD=your_password

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

### Step 5 — Run migrations and seed data
```bash
php artisan migrate
php artisan db:seed with data 
```

### Step 6 — Start the server
```bash
php artisan serve
```

Visit **http://127.0.0.1:8000** 🎉

---

**Built with using Laravel 12 & Bootstrap 5**

⭐ Star this repo if you found it helpful!


