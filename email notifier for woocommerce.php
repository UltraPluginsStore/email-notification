<?php
function notify_customers_on_product_update_wc($product) {
    $excluded_product_ids = array(46, 1060, 1062, 1064);
    $product_id = $product->get_id();

    if (in_array($product_id, $excluded_product_ids)) {
        return;
    }

    // Get previous downloadable files
    $previous_files = get_post_meta($product_id, '_previous_downloadable_files', true);
    $current_files = $product->get_downloads();

    if ($previous_files && array_keys($previous_files) == array_keys($current_files)) {
        return;
    }

    // Update stored downloadable files
    update_post_meta($product_id, '_previous_downloadable_files', array_keys($current_files));

    // Get the latest added downloadable file
    $latest_download = end($current_files);
    $latest_file_name = $latest_download ? $latest_download['name'] : 'New Update';

    $product_title = $product->get_name();
    $subject = "New Update Available for $product_title at UltraPlugins Store";
    $message = "
        <p>Hello,</p>
        <p>A new update for <strong>$product_title</strong> is available for downloads at UltraPlugins 🎉.</p>
        <p>Latest file: <strong>$latest_file_name</strong></p>
        <p>Visit UltraPlugin to Download</p>
        <p>Because you are an old customer!  🚀 Use Code <strong style=\"color: #6D62E6;\">ULTRA20</strong> to Enjoy Discount on ALL Membership Plans</p>
        <p>Thank you for being a valued part of the UltraPlugins family.</p>
        <p>Warm regards,<br>The UltraPlugins Team</p>
    ";

    notify_customers_of_product_update($product_id, $subject, $message);
}

add_action('woocommerce_product_object_updated_props', 'notify_customers_on_product_update_wc', 10, 1);

function notify_customers_of_product_update($product_id, $subject, $message) {
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $customer_query = new WP_User_Query(array(
        'role__in'  => array('customer', 'subscriber'),
        'fields'    => array('ID', 'user_email')
    ));
    
    $customers = $customer_query->get_results();
    $emails = array();

    foreach ($customers as $customer) {
        if (wc_customer_bought_product('', $customer->ID, $product_id)) {
            $emails[] = $customer->user_email;
        }
    }

    $emails = array_unique($emails);
    foreach ($emails as $email) {
        wp_mail($email, $subject, $message, $headers);
    }
}
