<?php
namespace IO_Plus;
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Template Name: IO Plus
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage IO Plus
 * @since IO Plus 1.0
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>

</head>
<body>
<?php
    the_content();
    the_post();
?>
<?php wp_footer(); ?>
</body>
</html>

