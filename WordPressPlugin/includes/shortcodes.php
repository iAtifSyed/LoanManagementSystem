<?php

// Shortcode to display loan packages
function lms_display_loan_packages() {
    $loan_packages = lms_get_loan_packages();
    if (empty($loan_packages)) {
        return 'No loan packages available at the moment.';
    }
    ob_start();
    ?>
    <div class="loan-packages">
        <h2>Available Loan Packages</h2>
        <ul>
            <?php foreach ($loan_packages as $package): ?>
                <li>
                    <h3><?php echo esc_html($package->package_name); ?></h3>
                    <p>Interest Rate: <?php echo esc_html($package->interest_rate); ?>%</p>
                    <p>Max Amount: <?php echo esc_html($package->max_amount); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'loan_packages', 'lms_display_loan_packages' );
