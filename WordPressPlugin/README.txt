
# Loan Management System Plugin

This is a WordPress plugin for managing loan applications, repayments, and KYC processing. It works in conjunction with a Laravel backend to handle loan processing and interest calculations. The plugin displays loan packages, allows users to apply for loans, and provides features for tracking loan status and repayments.

## Features

- **Loan Packages**: Display available loan packages.
- **Loan Application Form**: Allows users to apply for loans.
- **KYC Integration**: Submit and approve KYC applications.
- **Loan Approval**: Admin can approve or reject loan applications.
- **Repayment Tracking**: Users can track repayments based on loan terms.
- **Interest Calculation**: Calculate loan interest for different packages.
- **Email Notifications**: Notify users about the status of their loan application.

## Installation

### Prerequisites

- WordPress installed on your server.
- PHP 7.4 or higher.

### 1. Install the Plugin

1. Download the plugin ZIP file.
2. Go to your WordPress admin panel.
3. Navigate to **Plugins > Add New > Upload Plugin**.
4. Upload the ZIP file and click **Install Now**.
5. Activate the plugin.

### 2. Configure the Plugin

- The plugin will automatically add loan packages and the loan application form to your WordPress site.
- Manage loan packages and user applications through the WordPress admin panel.

## Shortcodes

The plugin provides the following shortcodes:

- **[loan_packages]**: Displays available loan packages.
- **[loan_application_form]**: Displays the loan application form for users.

Example usage:
```php
[loan_packages]
[loan_application_form]
```

## Admin Panel Features

- **Loan Packages**: Admin can add, edit, or remove loan packages.
- **Loan Applications**: View and manage loan applications.
- **KYC Approval**: Approve or reject KYC applications.

## Usage

- **Loan Application Form**: Users submit loan applications, which are processed and stored in the database.
- **Repayment Tracking**: Users can track their loan repayment schedule and make payments.
- **Interest Calculation**: Interest is calculated based on the loan amount, term, and package interest rate.

## License

This project is licensed under the MIT License.

## Contact

For support or inquiries, contact us at support@yourdomain.com.
