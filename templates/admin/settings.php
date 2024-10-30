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
$business_type = get_var($options['business_type']);
?>
<div class="oi_plus_options_page_settings">

    <h1>
        <?php _e('IO Plus General Settings', 'io-plus'); ?>
    </h1>
    <?php /*if(empty($main_page_id)):?>
		<div class=""><a href="<?php echo esc_url($_SERVER['REQUEST_URI']) ?>&iop_settings_main_page=create" class="button button-primary">Create page</a></div>
		<?php endif;*/
    ?>

    <div class="iop_tabs">
        <div class="iop_tab active" data="settings"><?php _e('Settings', 'io-plus'); ?></div>
        <div class="iop_tab" data="business"><?php _e('Business', 'io-plus'); ?></div>
    </div>
    <div class="iop_tabs_view settings active">

        <form method="post" action="options.php">
            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('Google', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>

                                    <tr valign="top">
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Client id', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['client_id'])); ?>"
                                                   id="client_id"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[client_id]"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Secret key', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['secret_key'])); ?>"
                                                   id="secret_key"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[secret_key]"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('API KEY', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['api_key'])); ?>"
                                                   id="api_key" name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[api_key]"/>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>

            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('Twitter', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>

                                    <tr valign="top">
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('API KEY', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['twitter_api_key'])); ?>"
                                                   id="twitter_api_key"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[twitter_api_key]"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('API Secret ', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['twitter_api_secret'])); ?>"
                                                   id="twitter_api_secret"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[twitter_api_secret]"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Token', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['twitter_access_token'])); ?>"
                                                   id="twitter_access_token"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[twitter_access_token]"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Token Secret', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['twitter_access_token_secret'])); ?>"
                                                   id="twitter_access_token_secret"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[twitter_access_token_secret]"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Callback', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php echo home_url(); ?>/

                                        </td>
                                    </tr>


                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>

            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('LinkedIn', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>


                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Client ID', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['linkedIn_client_id'])); ?>"
                                                   id="linkedIn_client_id"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[linkedIn_client_id]"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Client Secret', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php //$client_id = Settings::get_option( 'client_id' );
                                            ?>
                                            <input type="text"
                                                   value="<?php echo esc_attr(get_var($options['linkedIn_client_secret'])); ?>"
                                                   id="linkedIn_client_secret"
                                                   name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[linkedIn_client_secret]"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Callback', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php echo home_url(); ?>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>


            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('Main page', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>


                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Main Page', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php
                                            $page_count = wp_count_posts('page');
                                            $posts = get_posts(array(
                                                'numberposts' => $page_count->publish,
                                                'orderby' => 'date',
                                                'order' => 'DESC',
                                                'post_type' => 'page',
                                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                            ));
                                            ?>

                                            <select name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[main_page]">
                                                <option value=""></option>
                                                <?php
                                                if (!empty($posts)) {
                                                    foreach ($posts as $post) {
                                                        echo '<option value="' . $post->ID . '" ' . selected($post->ID, $main_page_id) . '>' . $post->post_title . '</option>';
                                                    }
                                                }
                                                ?>
                                                <select>

                                        </td>
                                    </tr>


                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>


            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('Type business', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>


                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Business', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php
                                            $lst_business_type = array(
                                                'restaurant',
                                                'corporate',
                                                'retail',
                                            );

                                            if (empty($business_type)) {
                                                $business_type = rget('business_type');
                                            }
                                            ?>

                                            <select name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[business_type]">
                                                <?php

                                                foreach ($lst_business_type as $val) {
                                                    echo '<option value="' . esc_html($val) . '" ' . selected($val, $business_type) . '>' . esc_html($val) . '</option>';
                                                }

                                                ?>

                                                <select>

                                        </td>
                                    </tr>


                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>

            <div class="resp-vtabs">
                <div class="resp-tabs-container">
                    <div>
                        <h2><?php _e('Partner IO Plus', 'io-plus'); ?>
                            <h2>
                                <table class="" style="margin-top:10px; border:none;">
                                    <tbody>


                                    <tr>
                                        <th colspan="1">
                                            <label class="option-title"><?php _e('Send user data to ioplus', 'oi-plus'); ?></label>
                                        </th>
                                        <td>
                                            <?php

                                            ?>

                                            <input name="<?php echo IO_PLUS_SLUG_OPTIONS; ?>[partner]"
                                                   type="checkbox" <?php echo checked(get_var($options['partner']), "yes") ?>
                                                   value="yes"/>

                                        </td>
                                    </tr>


                                    </tbody>
                                </table>


                    </div>
                </div>
            </div>

            <table class="form-table wc-form-table">
                <tbody>
                <tr valign="top">
                    <td>
                        <p class="submit">
                            <input type="submit" class="button button-primary"
                                   value="<?php esc_attr_e('Save Changes', 'ki-live-video-conferences'); ?>">
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php settings_fields(IO_PLUS_SLUG_OPTIONS); ?>
        </form>

    </div>

    <div class="iop_tabs_view business">
		<?php if(!empty($options['client_id'])){?>
        <iframe src="<?php echo home_url('?io_plus_page_settings=yes'); ?>"
                style="width: 100%; height: 600px;"></iframe>
		<?php }else{ ;?>
		<center><?php _e('No key', 'io-plus'); ?></center>

		<?php };?>
    </div>


</div>
