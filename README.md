
# Loan Management System

This Loan Management System (LMS) allows users to apply for loans, track repayments, and receive notifications. It features a Laravel backend for loan processing and a WordPress plugin for displaying loan packages and managing applications on your website.

## Table of Contents

1. [Installation](#installation)
2. [Laravel Backend Setup](#laravel-backend-setup)
3. [WordPress Plugin Setup](#wordpress-plugin-setup)
4. [Features](#features)
5. [Usage](#usage)
6. [License](#license)

---

## Installation

### 1. Laravel Backend Setup

#### 1.1 Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL or MariaDB

#### 1.2 Clone the Repository

```bash
git clone https://github.com/yourusername/LoanManagementSystem.git
cd LoanManagementSystem/Laravel
```

#### 1.3 Install Dependencies

Run the following command to install Laravel dependencies:

```bash
composer install
```

#### 1.4 Configure Environment

- Rename `.env.example` to `.env` and update your database and email configurations.

```bash
cp .env.example .env
```

- Update the `.env` file with the appropriate database settings and mail server details:

```env
APP_NAME=LoanManagementSystem
APP_ENV=production
APP_KEY=your_app_key
APP_DEBUG=false
APP_URL=http://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

#### 1.5 Generate App Key

```bash
php artisan key:generate
```

#### 1.6 Run Migrations

Run the migrations to create the necessary database tables:

```bash
php artisan migrate --seed
```

#### 1.7 File Permissions

Ensure proper permissions for storage and cache:

```bash
chmod -R 775 storage bootstrap/cache
```

#### 1.8 Start the Server

Start the Laravel development server:

```bash
php artisan serve
```

You can now access your Laravel application at [http://localhost:8000](http://localhost:8000).

---

### 2. WordPress Plugin Setup

#### 2.1 Prerequisites

- WordPress installed on your server.
- PHP 7.4 or higher.

#### 2.2 Install the Plugin

1. Navigate to your WordPress plugins directory:

```bash
cd wp-content/plugins
```

2. Upload the plugin directory (from `LoanManagementSystem/WordPressPlugin`) into the plugins directory.

#### 2.3 Activate the Plugin

1. Log into your WordPress admin panel.
2. Go to **Plugins > Installed Plugins**.
3. Find "Loan Management" and click **Activate**.

#### 2.4 Configure the Plugin

- Once activated, the plugin will automatically add loan packages and the loan application form to your WordPress site.
- You can manage the loan packages and applications from the WordPress admin panel.

---

## Features

### Laravel Backend Features
- **Loan Application Management**: Users can apply for loans with different packages.
- **Loan Approval**: Admin can approve or reject loan applications.
- **Repayment Tracking**: Users can track repayments based on loan terms.
- **Interest Calculation**: The system calculates loan interest based on different loan packages.
- **KYC Application**: Users can submit their KYC for approval.
- **Email Notifications**: Users and admins receive notifications for KYC approval, loan status updates, and repayment reminders.
- **Admin Dashboard**: Manage loans, repayments, and user data.

### WordPress Plugin Features
- **Loan Packages Display**: Display loan packages on the WordPress website.
- **Loan Application Form**: Allows users to apply for loans.
- **User Dashboard**: View loan application status and repayment schedule.
- **KYC Integration**: Manage KYC application status directly through WordPress.

---

## Usage

### Laravel API Endpoints
1. **POST /api/loans/apply**: Submit a loan application.
2. **GET /api/loans/{id}**: Get loan details (e.g., status, repayment schedule).
3. **POST /api/loans/repay**: Make a repayment for an active loan.
4. **GET /api/kyc/{user_id}**: Get KYC application status.

### WordPress Shortcodes
The plugin provides the following shortcodes:
- **[loan_packages]**: Displays available loan packages.
- **[loan_application_form]**: Displays the loan application form for users.

Example usage:
```php
[loan_packages]
[loan_application_form]
```

### Admin Panel
- **Loan Packages**: Admin can add, edit, or remove loan packages.
- **User Management**: View and manage user loan applications.
- **KYC Approval**: Approve or reject KYC applications.

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Contact

If you have any questions or need further assistance, feel free to reach out at:

- **Email**: support@yourdomain.com
- **GitHub**: [LoanManagementSystem GitHub](https://github.com/yourusername/LoanManagementSystem)
