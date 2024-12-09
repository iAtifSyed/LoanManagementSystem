<?php
/*
Plugin Name: Loan Management System
Plugin URI: https://envisionlab.github.io
Description: A system for managing loan applications, repayments, and KYC processing.
Version: 1.0
Author: Atif Syed
Author URI: https://iatifsyed.github.io
License: MIT
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Enqueue CSS and JS
function lms_enqueue_scripts() {
    wp_enqueue_style( 'lms-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_enqueue_script( 'lms-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'lms_enqueue_scripts' );

// Create custom database tables on plugin activation
function lms_create_tables() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'loan_applications';
    $sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(255) NOT NULL,
        user_email VARCHAR(255) NOT NULL,
        loan_amount FLOAT NOT NULL,
        status VARCHAR(50) DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'lms_create_tables' );

// Shortcode for Loan Packages
function lms_loan_packages_shortcode() {
    return '<div class="loan-packages">Loan Packages List</div>';
}
add_shortcode( 'loan_packages', 'lms_loan_packages_shortcode' );

// Shortcode for Loan Application Form
function lms_loan_application_form_shortcode() {
    ob_start();
    ?>
    <form method="POST" action="">
        <?php wp_nonce_field('lms_loan_application', 'lms_nonce'); ?>
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" required />

        <label for="user_email">Email:</label>
        <input type="email" name="user_email" required />

        <label for="loan_amount">Loan Amount:</label>
        <input type="number" name="loan_amount" required />

        <input type="submit" value="Apply for Loan" />
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'loan_application_form', 'lms_loan_application_form_shortcode' );

// Handle Loan Application Form Submission
function lms_handle_loan_application() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lms_nonce']) && wp_verify_nonce($_POST['lms_nonce'], 'lms_loan_application')) {
        global $wpdb;

        $name = sanitize_text_field( $_POST['user_name'] );
        $email = sanitize_email( $_POST['user_email'] );
        $amount = floatval( $_POST['loan_amount'] );

        $table_name = $wpdb->prefix . 'loan_applications';
        $result = $wpdb->insert(
            $table_name,
            array(
                'user_name' => $name,
                'user_email' => $email,
                'loan_amount' => $amount,
                'status' => 'pending'
            )
        );

        if ($result === false) {
            wp_die('There was an error processing your application. Please try again.');
        }

        echo '<p>Your loan application has been submitted successfully.</p>';
    }
}
add_action('wp_head', 'lms_handle_loan_application');
