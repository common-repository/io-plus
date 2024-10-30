<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit();
}

$options = iop_options();


if (empty($options) || !is_array($options)) {
    $options = array();
}
$main_page_id = get_var($options['main_page']);
?>
<div class="oi_plus_options_page_start">
    <h1>
        <?php _e('IO Plus Start', 'io-plus'); ?>
    </h1>

    <div class="buttons_business_type">
        <a href="<?php echo esc_url($_SERVER['REQUEST_URI']) ?>&business_type=restaurant"
           class="button button-primary"><?php _e('Restaurant', 'io-plus'); ?></a>
        <a href="<?php echo esc_url($_SERVER['REQUEST_URI']) ?>&business_type=corporate"
           class="button button-primary"><?php _e('Corporate', 'io-plus'); ?></a>
        <a href="<?php echo esc_url($_SERVER['REQUEST_URI']) ?>&business_type=retail"
           class="button button-primary"><?php _e('Retail', 'io-plus'); ?></a>
    </div>

</div>
