<?php
/**
 *
 * @package IO-PLUS/Shortcodes
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Shortcodes of WP
 *
 * @since  1.0.0
 */
class Shortcodes
{

    /**
     * Shortcodes constructor.
     *
     * @since  1.0.0
     * @access public
     */
    public function __construct()
    {


    }

    /**
     * Init.
     */
    public function init()
    {
        if (is_admin()) return false;

        add_shortcode('io_plus', array($this, 'start_io_plus'));

        add_filter('wp', array($this, 'business_page'));

        add_filter('the_content', array(&$this, 'main_page'));


    }

    public function start_io_plus()
    {
        ob_start();
        inc_template('template');

        return ob_get_clean();
    }


    public function business_page($wp)
    {


        //Page business
        if (iop_is_business_page() == true) {

            ?>
            <!DOCTYPE html>
        <html <?php language_attributes(); ?> class="no-js">
        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="shortcut icon" type="image/png" href="<?php echo IO_PLUS_URL; ?>/assets/img/success.png"/>
            <?php wp_head(); ?>
        </head>
            <?php

            echo '<body class="io-plus-main-body"  >';
            inc_template('business');

            wp_footer();
            echo '</body>';
            echo '</html>';
            exit;
        }


    }

    public function main_page($content)
    {

        //Main Page & Setting tab
        if (iop_is_main_page() == true) {
            $content = $this->start_io_plus();
        }


		//Protection this plugin posts
		/*if(is_admin()==false){
			$protection_post_type=array(
				'io_plus_employee',
				'io_plus_business',
				'io_plus_visitor'
			);

			foreach($protection_post_type as $post_type){
				if (strpos($_SERVER['REQUEST_URI'], '/'.$post_type)!==false)exit;
			}
		}*/




        return $content;
    }


}



