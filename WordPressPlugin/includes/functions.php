<?php

// Function to retrieve loan packages from the database
function lms_get_loan_packages() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'loan_packages';
    return $wpdb->get_results( "SELECT * FROM $table_name" );
}

// Function to calculate loan interest
function lms_calculate_loan_interest( $amount, $rate, $term ) {
    // Simple interest calculation
    return ($amount * $rate * $term) / 100;
}
