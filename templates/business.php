<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} //1 Exit if accessed directly


$api = new Query;

$options = get_option(IO_PLUS_SLUG_OPTIONS, array());
$client_id = $options['client_id'];
$post_id = get_the_ID();
$post = get_post($post_id);

$business_main_id = $post->post_parent;
$business_main = get_post($business_main_id);


$occupancy_progress = '0';
$occupancy_pcount = '0';
$occupancy_employee_count = '0';
$occupancy_visitor_count = '0';
$occupancy_max = '';

$business_metabox = $api->get_business($post_id);
if (!empty($business_metabox)) {
    $occupancy_max = $business_metabox['occupancy'];
}


if (empty($occupancy_max)) $occupancy_max = 10;
$count_posts = wp_count_posts('io_plus_visitor');
$count = $count_posts->publish;
$posts_visitor = get_posts(array(
    'numberposts' => $count,
    'category' => 0,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'io_plus_visitor',
    'suppress_filters' => true,
));


if (count($posts_visitor) > 0) {
    foreach ($posts_visitor as $post_visitor) {

        $visits = get_post_meta($post_visitor->ID, 'visit');
		$employee_id = get_post_meta($post_visitor->ID, 'employee_id', true);
        $user_type = get_post_meta($employee_id, 'user_type', true);
		

		
		if($user_type=='owner' )continue;

        if (is_array($visits)) {

            $visit = array_pop($visits);
            if (empty($visit)) continue;


            if ($visit['business'] != $post_id) continue;

			if($user_type=='employee' OR $user_type=='manager'){
				if (intval($visit['time']) > (time() - (60 * 60 * 8))) $occupancy_employee_count++;
			}else{
				if (intval($visit['time']) > (time() - (60 * 60))) $occupancy_visitor_count++;
			}
                


        }

    }
}

$occupancy_pcount=$occupancy_visitor_count+$occupancy_employee_count;
$occupancy_progress = $occupancy_pcount / $occupancy_max * 100;
$occupancy_progress = intval($occupancy_progress);
?>
<script>var _post_business = '<?php echo get_the_ID(); ?>';</script>
<script>var _post_business_main = '<?php echo esc_html($business_main->ID); ?>';</script>
<meta name="google-signin-client_id" content="<?php echo esc_html($client_id); ?>">
<div class="io-plus">
    <div class="iop-view view-start-business active">

        <div class="nau-135">
            <div class="nau-container p-60-60">
                <div class="nau-subtitle"><?php _e('Welcome to', 'io-plus'); ?>
                    <span class="js-welcome-user-name"></span>
                    <div>
                        <h1 class="nau-titlemb-50 nau-left "><?php echo esc_html($business_main->post_title); ?> </h1>
                        <!--<h3 class="mb-25 nau-left "><?php echo esc_html($post->post_title); ?></h3>-->
                        <div class="nau-container">
                            <div class="nau-progressbar">
                                <div class="nau-sup-text nau-left">
                                    <span><?php echo esc_html($occupancy_progress); ?></span>% <?php _e('Occupancy for the last hour', 'io-plus'); ?>
                                </div>
                                <div class="nau-progress">
                                    <div class="nau-bar"
                                         style="width: <?php echo esc_url($occupancy_progress); ?>%;"></div>
                                </div>
                                <div class="nau-people">
                                    (<?php echo esc_html($occupancy_pcount); ?> <?php _e('people are currently signed in', 'io-plus'); ?>
                                    )
                                </div>
                            </div>


                            <div class="iop-dn">
                                <div id="google-button-signin"></div>
                            </div>
                            <div class="iop-dn"></div>
                            <div class="nau-btn but-google-signin">

                                <svg width="20px" height="20px" viewBox="0 0 349 357" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 64 (93537) - https://sketch.com -->
                                    <title><?php _e('google-favicon', 'io-plus'); ?></title>
                                    <desc><?php _e('Created with Sketch.', 'io-plus'); ?></desc>
                                    <defs>
                                        <path d="M170.902,36.57 C170.902,23.948 169.77,11.81 167.665,0.159 L0.011,0.159 L0.011,69.017 L95.814,69.017 C91.687,91.268 79.145,110.122 60.293,122.744 L60.293,167.409 L117.822,167.409 C151.483,136.418 170.902,90.783 170.902,36.57 L170.902,36.57 Z"
                                              id="path-1"></path>
                                        <path d="M160.011,144.536 C208.074,144.536 248.37,128.596 277.822,101.409 L220.293,56.744 C204.352,67.425 183.962,73.736 160.011,73.736 C113.647,73.736 74.403,42.422 60.406,0.346 L0.934,0.346 L0.934,46.468 C30.225,104.646 90.424,144.536 160.011,144.536 L160.011,144.536 Z"
                                              id="path-3"></path>
                                        <path d="M78.406,114.346 C74.845,103.666 72.822,92.257 72.822,80.524 C72.822,68.792 74.845,57.383 78.406,46.702 L78.406,0.582 L18.934,0.582 C6.878,24.613 0,51.8 0,80.524 C0,109.249 6.878,136.437 18.934,160.468 L78.406,114.346 L78.406,114.346 Z"
                                              id="path-5"></path>
                                        <path d="M160.011,71.313 C186.146,71.313 209.612,80.295 228.06,97.934 L279.117,46.877 C248.288,18.153 207.993,0.513 160.011,0.513 C90.424,0.513 30.225,40.404 0.934,98.582 L60.406,144.702 C74.403,102.627 113.647,71.313 160.011,71.313 L160.011,71.313 Z"
                                              id="path-7"></path>
                                    </defs>
                                    <g id="Website-desktop" stroke="none" stroke-width="1" fill="none"
                                       fill-rule="evenodd">
                                        <g id="google-favicon">
                                            <g id="Group-17" transform="translate(178.000000, 146.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <g id="Clip-16"></g>
                                                <polygon id="Fill-15" fill="#5070A8" mask="url(#mask-2)"
                                                         points="0.011 167.409 170.902 167.409 170.902 0.159 0.011 0.159"></polygon>
                                            </g>
                                            <g id="Group-20" transform="translate(18.000000, 212.000000)">
                                                <mask id="mask-4" fill="white">
                                                    <use xlink:href="#path-3"></use>
                                                </mask>
                                                <g id="Clip-19"></g>
                                                <polygon id="Fill-18" fill="#2F9E4F" mask="url(#mask-4)"
                                                         points="0.934 144.536 277.822 144.536 277.822 0.346 0.934 0.346"></polygon>
                                            </g>
                                            <g id="Group-23" transform="translate(0.000000, 98.000000)">
                                                <mask id="mask-6" fill="white">
                                                    <use xlink:href="#path-5"></use>
                                                </mask>
                                                <g id="Clip-22"></g>
                                                <polygon id="Fill-21" fill="#EFB529" mask="url(#mask-6)"
                                                         points="0 160.468 78.406 160.468 78.406 0.582 0 0.582"></polygon>
                                            </g>
                                            <g id="Group-26" transform="translate(18.000000, 0.000000)">
                                                <mask id="mask-8" fill="white">
                                                    <use xlink:href="#path-7"></use>
                                                </mask>
                                                <g id="Clip-25"></g>
                                                <polygon id="Fill-24" fill="#D53E36" mask="url(#mask-8)"
                                                         points="0.934 144.702 279.117 144.702 279.117 0.513 0.934 0.513"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg> <?php _e('Sign in with Google', 'io-plus'); ?>
                            </div>


                            <div class="nau-sup-text nau-center"><?php _e('Or sign in with social account:', 'io-plus'); ?></div>

                            <?php buttons_sn(); ?>


                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="iop-footer">
            <div class="nau-footer-logo">
                <svg width="100" height="27" viewBox="0 0 100 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.36018 0.908264V19.1879H0V0.908264H2.36018Z" fill="#828282"/>
                    <path
                            d="M19.0962 1.868C20.4504 2.66155 21.5584 3.8145 22.2976 5.1991C23.0651 6.69543 23.4654 8.35297 23.4654 10.0347C23.4654 11.7164 23.0651 13.3739 22.2976 14.8702C21.5584 16.2548 20.4504 17.4078 19.0962 18.2013C17.7064 19.0054 16.1245 19.4175 14.519 19.3937C12.906 19.4155 11.3167 19.0037 9.91725 18.2013C8.55121 17.4142 7.43291 16.2603 6.68906 14.8702C5.92295 13.3735 5.52344 11.7161 5.52344 10.0347C5.52344 8.35323 5.92295 6.69586 6.68906 5.1991C7.43291 3.80904 8.55121 2.65509 9.91725 1.868C11.3171 1.06662 12.9061 0.654888 14.519 0.675611C16.1244 0.652806 17.706 1.06483 19.0962 1.868ZM11.1365 3.7472C10.1344 4.33426 9.32397 5.19911 8.80315 6.23713C8.24784 7.42412 7.96001 8.7186 7.96001 10.0291C7.96001 11.3395 8.24784 12.634 8.80315 13.821C9.32167 14.8635 10.1324 15.7326 11.1365 16.3221C12.1654 16.9106 13.334 17.2104 14.519 17.1901C15.697 17.2076 16.8574 16.9028 17.8747 16.3087C18.8753 15.7149 19.685 14.847 20.2081 13.8076C20.7636 12.623 21.0516 11.3307 21.0516 10.0224C21.0516 8.71401 20.7636 7.42169 20.2081 6.23713C19.6866 5.19955 18.8763 4.33486 17.8747 3.7472C16.8545 3.16149 15.6953 2.86163 14.519 2.87919C13.334 2.85889 12.1654 3.15877 11.1365 3.7472Z"
                            fill="#828282"/>
                    <path d="M28.3893 16.4139V19.1879H25.5392V16.4139H28.3893Z" fill="#828282"/>
                    <path
                            d="M42.953 5.43623C43.9264 6.06369 44.7021 6.95417 45.1902 8.00446C45.7303 9.25039 46.009 10.5939 46.009 11.9519C46.009 13.3099 45.7303 14.6534 45.1902 15.8993C44.7042 16.9539 43.9283 17.8485 42.953 18.4787C41.9942 19.0806 40.8814 19.3914 39.7494 19.3736C38.747 19.4013 37.7577 19.1404 36.8993 18.6219C36.1183 18.1392 35.5099 17.422 35.1611 16.5727V26.085H30.7226V4.72034H35.1566V7.3378C35.5061 6.4895 36.1144 5.77316 36.8949 5.29082C37.7535 4.77311 38.7427 4.51298 39.745 4.54138C40.8783 4.52356 41.9925 4.83437 42.953 5.43623ZM36.0179 9.37359C35.4213 10.0045 35.123 10.8643 35.123 11.953C35.123 13.0417 35.4213 13.8978 36.0179 14.5212C36.6251 15.13 37.4483 15.4742 38.3081 15.4788C39.168 15.4834 39.9948 15.1481 40.6085 14.5458C41.1857 13.9239 41.475 13.0596 41.4765 11.953C41.478 10.8464 41.1887 9.98209 40.6085 9.36017C40.3149 9.04959 39.958 8.80561 39.5621 8.64468C39.1661 8.48376 38.7402 8.40962 38.3132 8.42728C37.8854 8.4135 37.4596 8.49074 37.0639 8.65387C36.6682 8.81701 36.3117 9.06233 36.0179 9.37359Z"
                            fill="#828282"/>
                    <path d="M52.736 0V19.1879H48.302V0H52.736Z" fill="#828282"/>
                    <path
                            d="M70.1834 4.72037V19.1879H65.7248V16.5682C65.3153 17.4053 64.6708 18.1049 63.8702 18.5817C63.0046 19.0947 62.0126 19.3551 61.0066 19.3333C59.3467 19.3333 58.0283 18.7808 57.0514 17.6756C56.0745 16.5705 55.5861 15.0492 55.5861 13.1119V4.72037H59.9955V12.575C59.9955 13.5608 60.2505 14.3259 60.7606 14.8703C61.0261 15.1452 61.3472 15.3603 61.7026 15.5011C62.0579 15.6419 62.4392 15.7052 62.821 15.6868C63.7158 15.6868 64.4242 15.4019 64.9462 14.8322C65.4682 14.2625 65.7277 13.4497 65.7248 12.3937V4.72037H70.1834Z"
                            fill="#828282"/>
                    <path
                            d="M82.9015 5.91273C84.0029 6.83472 84.7345 8.12319 84.9619 9.54137H80.8143C80.7175 8.99597 80.4276 8.50363 79.9977 8.15434C79.5402 7.80702 78.9767 7.62842 78.4027 7.64875C77.9962 7.62091 77.5927 7.73561 77.2617 7.97313C77.1307 8.08677 77.0274 8.22896 76.96 8.38875C76.8925 8.54853 76.8625 8.72166 76.8725 8.89483C76.8725 9.34226 77.1096 9.68007 77.5861 9.90602C78.3069 10.2057 79.0565 10.4306 79.8232 10.5772C80.748 10.7836 81.6588 11.0481 82.5503 11.3691C83.2658 11.6419 83.8996 12.0932 84.3915 12.6801C84.9105 13.2766 85.17 14.0887 85.17 15.1163C85.1833 15.9031 84.9485 16.6741 84.4988 17.3199C84.0048 17.9945 83.3301 18.5157 82.5525 18.8232C81.5979 19.208 80.5748 19.3938 79.5458 19.3691C77.5921 19.3691 76.0261 18.9366 74.8478 18.0716C73.6696 17.2065 72.956 15.9709 72.7069 14.3646H76.9866C77.0057 14.6458 77.0864 14.9194 77.2229 15.166C77.3593 15.4126 77.5482 15.6263 77.7763 15.7919C78.3017 16.139 78.9234 16.3113 79.5525 16.2841C79.9634 16.3139 80.3705 16.1885 80.6935 15.9329C80.8219 15.8176 80.9234 15.6755 80.9907 15.5166C81.058 15.3576 81.0894 15.1858 81.0827 15.0134C81.0916 14.7819 81.0275 14.5534 80.8994 14.3603C80.7714 14.1672 80.5858 14.0192 80.3691 13.9373C79.6189 13.6367 78.8422 13.4067 78.0492 13.2505C77.1466 13.074 76.2583 12.831 75.3915 12.5235C74.6979 12.263 74.082 11.8303 73.6018 11.2662C73.1006 10.6875 72.8501 9.89707 72.8501 8.89483C72.8332 8.29075 72.9582 7.69113 73.215 7.1441C73.4718 6.59707 73.8533 6.11786 74.3288 5.74495C75.3132 4.93958 76.7047 4.53764 78.5033 4.53913C80.3363 4.54062 81.8024 4.99849 82.9015 5.91273Z"
                            fill="#828282"/>
                    <path d="M100 12.1611H95.5258V16.7248H91.2372V12.1611H86.7517V8.08949H91.2372V3.50113H95.5258V8.08949H100V12.1611Z"
                          fill="#828282"/>
                </svg>

            </div>
            <div class="nau-footer-copy"><?php _e('© 2020', 'io-plus'); ?>
                &#160;<span><?php _e('KI Social™', 'io-plus'); ?></span>. <?php _e('All Rights Reserved', 'io-plus'); ?>
            </div>
        </div>
    </div>
    <?php

    include(__DIR__ . '/business_employee_questionary.php');
    include(__DIR__ . '/business_owner.php');
    include(__DIR__ . '/business_manager.php');
    include(__DIR__ . '/business_visitor_corporate.php');
    include(__DIR__ . '/business_visitor_restaurant.php');
    include(__DIR__ . '/business_visitor_retail.php');
    include(__DIR__ . '/business_mask.php');
    include(__DIR__ . '/text.php');

    function buttons_sn()
    {
        $return_url = urlencode(home_url() . $_SERVER['REQUEST_URI']);
        $url = home_url() . '/?iop_return_url=' . esc_url($return_url) . '&iop_auth=';
        ?>
        <div class="swiper-container nau-sign-in-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="<?php echo esc_url($url); ?>Twitter">
                        <div class="nau-sign-in-item" style="background-color: #1DA1F2;"><i class="fab fa-twitter"></i>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <div class="nau-sign-in-item nau-no-active" style="background-color: #3B5998;"><i
                                class="fab fa-facebook"></i></div>
                </div>
                <div class="swiper-slide">
                    <div class="nau-sign-in-item nau-no-active" style="background-color: #FF4500;"><i
                                class="fab fa-reddit"></i></div>
                </div>
                <div class="swiper-slide">
                    <a href="<?php echo esc_url($url); ?>Linkedin">
                        <div class="nau-sign-in-item" style="background-color: #0077B5;"><i
                                    class="fab fa-linkedin-in"></i></div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <div class="nau-sign-in-item nau-no-active" style="background-color: #6BBDEB"><i
                                class="fab fa-vimeo-v"></i></div>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>
