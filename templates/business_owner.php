<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


$users = array();

$count_posts = wp_count_posts('io_plus_employee');
$ount = $count_posts->publish;
$post_id = get_the_ID();
$employees = get_posts(array(
    'numberposts' => $ount,
    'category' => 0,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'io_plus_employee',
    'suppress_filters' => true,
));

foreach ($employees as $employee) {

    $employee_business = get_post_meta($employee->ID, 'business_id');
    $email = get_post_meta($employee->ID, 'user_email', true);
    $name = get_post_meta($employee->ID, 'user_name', true);
    $user_client = get_post_meta($employee->ID, 'user_client', true);
    //$visit_id=get_post_meta($employee->ID, 'visit_id', true );
    if (array_search($post_id, $employee_business) !== false) {
        $interview = get_post_meta($employee->ID, 'interview');
        //krsort($interview);
        foreach ($interview as $result) {
            if ($result['business'] != $post_id) continue;
            $users[] = array(
                'name' => $name,
                'email' => $email,
                'interview' => $result['interview'],
                'date' => date('Y-m-d ', $result['time']),
                'time' => date('H:i', $result['time']),
                'unix_time' => $result['time'],
            );

        }


    }


}


?>


<div class="io-plus-owner">


    <div class="iop-view owner-main" style="background: #F3F5FB;">
        <!--<div class="iop-view view-owner">
		<div class="photo-owner"></div>
		<div class="photo-name"></div>
		<div class="occupancy"><?php echo esc_html($occupancy_progress); ?> %</div>-->

        <div class="view-business-list">
            <div class="nau-115">


                <div class="nau-container p-60-60">
                    <div class="nau-frame">
                        <div class="nau-hello mb-25"><span class="js-greeting-text"></span>, <b class="photo-name"></b>
                        </div>
                        <div class="mb-50">
                            <div class="nau-custom-select owner-business-list">
                                <select>

                                </select>
                            </div>
                            <div class="business-no-data"
                                 style="display: none;"><?php _e('No Data', 'io-plus'); ?></div>
                        </div>


                        <div class="nau-progressbar">
                            <div class="nau-sup-text nau-left">
                                <span><?php echo esc_html($occupancy_progress); ?></span>% <?php _e('Occupancy for the last hour', 'io-plus'); ?>
                            </div>
                            <div class="nau-progress nau-white-bar">
                                <div class="nau-bar"
                                     style="width: <?php echo esc_html($occupancy_progress); ?>%;"></div>
                            </div>
                            <div class="nau-people">
                                ( <?php echo esc_html($occupancy_visitor_count); ?> <?php _e('visitor', 'io-plus'); ?> <?php echo esc_html($occupancy_employee_count); ?> <?php _e('emploee are currently signed in', 'io-plus'); ?>
                                )
                            </div>
                        </div>

                        <!--<div class="oip-button js-show-owner-questionary">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 8H8V0H0V8ZM2 2H6V6H2V2ZM0 18H8V10H0V18ZM2 12H6V16H2V12ZM10 0V8H18V0H10ZM16 6H12V2H16V6ZM16 16H18V18H16V16ZM10 10H12V12H10V10ZM12 12H14V14H12V12ZM10 14H12V16H10V14ZM12 16H14V18H12V16ZM14 14H16V16H14V14ZM14 10H16V12H14V10ZM16 12H18V14H16V12Z" fill="white" fill-opacity="0.75"/>
</svg>


						<?php _e('I.O Plus Covid Check', 'io-plus'); ?></div>-->

                        <div class="nau-section-title mt-50">
                            <div> <?php _e('Latest’s Check-In', 'io-plus'); ?></div>
                            <a href="#." class="js-see-all"><?php _e('SEE ALL', 'io-plus'); ?></a>
                        </div>

                        <div class="nau-check-list-frame mb-50">
                            <ul class="nau-check-list">


                            </ul>
                        </div>


                        <div class="swiper-container nau-number-card-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="nau-number-card">
                                        <div class="nau-card-title"
                                             style="color: #EB5757;"><?php _e('FEVER', 'io-plus'); ?></div>
                                        <div class="nau-card-number js-fever">0</div>
                                        <div class="nau-card-text"><?php _e('Total Check-ins', 'io-plus'); ?></div>
                                        <a href="#." class="js-show-surveys-list" data="0">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"
                                                      fill="#2F80ED"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="nau-number-card">
                                        <div class="nau-card-title"
                                             style="color: #F2994A;"><?php _e('F. POSITIVE', 'io-plus'); ?></div>
                                        <div class="nau-card-number js-positive">0</div>
                                        <div class="nau-card-text"><?php _e('Total Check-ins', 'io-plus'); ?></div>
                                        <a href="#." class="js-show-surveys-list" data="2">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"
                                                      fill="#2F80ED"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="nau-number-card">
                                        <div class="nau-card-title"
                                             style="color: #F2C94C;"><?php _e('Visitor', 'io-plus'); ?></div>
                                        <div class="nau-card-number js-visitor">0</div>
                                        <div class="nau-card-text"><?php _e('Total Check-ins', 'io-plus'); ?></div>
                                        <a href="#." class="js-show-surveys-list" data="1">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"
                                                      fill="#2F80ED"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <ul class="nau-accordion" id="accordion">
                            <li class="nau-accordion-list">
                                <div class="nau-accordion-link"><span><?php _e('QR Code', 'io-plus'); ?></span><i
                                            class="fa fa-chevron-down"></i></div>
                                <div class="nau-acordion-content" style="display: none;">
                                    <div class="nau-loc-item nau-with-code">
                                        <div class="list-qrcode"></div>


                                    </div>
                                </div>
                            </li>
                        </ul>


                        <div class="nau-section-title mt-50">
                            <div><?php _e('Employees', 'io-plus'); ?></div>
                            <a href="#." class="js-see-all"><?php _e('SEE ALL', 'io-plus'); ?></a>
                        </div>


                        <div class="swiper-container nau-employee-slider">
                            <div class="swiper-wrapper">


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="iop-bottom-menu">
        <div class="menu-row">
            <div class="but-menu m-activ js-show-owner-main">

                <div class="icon-active">
                    <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.1176 3.79765L21.1765 10.1506V21.1765H18.3529V12.7059H9.88235V21.1765H7.05882V10.1506L14.1176 3.79765ZM14.1176 0L0 12.7059H4.23529V24H12.7059V15.5294H15.5294V24H24V12.7059H28.2353L14.1176 0Z"
                              fill="#2F80ED"/>
                    </svg>
                </div>

                <div class="icon-norval">
                    <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.1176 3.79765L21.1765 10.1506V21.1765H18.3529V12.7059H9.88235V21.1765H7.05882V10.1506L14.1176 3.79765ZM14.1176 0L0 12.7059H4.23529V24H12.7059V15.5294H15.5294V24H24V12.7059H28.2353L14.1176 0Z"
                              fill="#BDBDBD"/>
                    </svg>

                </div>

                <div class="mnu-label"><?php _e('Home', 'io-plus'); ?></div>
            </div>
            <div class="but-menu js-show-surveys">
                <div class="icon-active">
                    <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.2727 0H2.18182C0.981818 0 0 0.981818 0 2.18182V17.4545H2.18182V2.18182H15.2727V0ZM14.1818 4.36364H6.54545C5.34545 4.36364 4.37455 5.34545 4.37455 6.54545L4.36364 21.8182C4.36364 23.0182 5.33454 24 6.53454 24H18.5455C19.7455 24 20.7273 23.0182 20.7273 21.8182V10.9091L14.1818 4.36364ZM6.54545 21.8182V6.54545H13.0909V12H18.5455V21.8182H6.54545Z"
                              fill="#2F80ED"/>
                    </svg>

                </div>
                <div class="icon-norval">
                    <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.2727 0H2.18182C0.981818 0 0 0.981818 0 2.18182V17.4545H2.18182V2.18182H15.2727V0ZM14.1818 4.36364H6.54545C5.34545 4.36364 4.37455 5.34545 4.37455 6.54545L4.36364 21.8182C4.36364 23.0182 5.33454 24 6.53454 24H18.5455C19.7455 24 20.7273 23.0182 20.7273 21.8182V10.9091L14.1818 4.36364ZM6.54545 21.8182V6.54545H13.0909V12H18.5455V21.8182H6.54545Z"
                              fill="#B3B9C5"/>
                    </svg>
                </div>
                <div class="mnu-label"><?php _e('Surveys', 'io-plus'); ?></div>
            </div>
            <div class="but-menu js-show-check-ins">
                <div class="icon-active">
                    <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.4 0C3.756 0 0 3.756 0 8.4C0 14.7 8.4 24 8.4 24C8.4 24 16.8 14.7 16.8 8.4C16.8 3.756 13.044 0 8.4 0ZM2.4 8.4C2.4 5.088 5.088 2.4 8.4 2.4C11.712 2.4 14.4 5.088 14.4 8.4C14.4 11.856 10.944 17.028 8.4 20.256C5.904 17.052 2.4 11.82 2.4 8.4Z"
                              fill="#2F80ED"/>
                    </svg>

                </div>
                <div class="icon-norval">
                    <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.4 0C3.756 0 0 3.756 0 8.4C0 14.7 8.4 24 8.4 24C8.4 24 16.8 14.7 16.8 8.4C16.8 3.756 13.044 0 8.4 0ZM2.4 8.4C2.4 5.088 5.088 2.4 8.4 2.4C11.712 2.4 14.4 5.088 14.4 8.4C14.4 11.856 10.944 17.028 8.4 20.256C5.904 17.052 2.4 11.82 2.4 8.4Z"
                              fill="#B3B9C5"/>
                        <path d="M8.40002 11.4C10.0569 11.4 11.4 10.0568 11.4 8.39999C11.4 6.74314 10.0569 5.39999 8.40002 5.39999C6.74317 5.39999 5.40002 6.74314 5.40002 8.39999C5.40002 10.0568 6.74317 11.4 8.40002 11.4Z"
                              fill="#B3B9C5"/>
                    </svg>
                </div>
                <div class="mnu-label"><?php _e('Check-ins', 'io-plus'); ?></div>
            </div>
        </div>
    </div>

    <?php include(__DIR__ . '/business_owner_search.php'); ?>

    <?php include(__DIR__ . '/business_owner_view_employee.php'); ?>
    <div class="iop-view view-schedule" style="background: #F3F5FB;">


        <div class="nau-container p-60-60">
            <div class="nau-top-nav nau-back-btn">
                <a href="#." class="js-btn-back">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 10.5V13.5H5.99999L14.25 21.75L12.12 23.88L0.23999 12L12.12 0.119995L14.25 2.25L5.99999 10.5H24Z"
                              fill="#000"/>
                    </svg>
                </a>
                <span>Schedule</span>
                <a href="#." class="nau-menu-btn">
                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M18 3C18 2.20435 18.3161 1.44129 18.8787 0.87868C19.4413 0.316071 20.2044 0 21 0C21.7956 0 22.5587 0.316071 23.1213 0.87868C23.6839 1.44129 24 2.20435 24 3C24 3.79565 23.6839 4.55871 23.1213 5.12132C22.5587 5.68393 21.7956 6 21 6C20.2044 6 19.4413 5.68393 18.8787 5.12132C18.3161 4.55871 18 3.79565 18 3ZM9 3C9 2.20435 9.31607 1.44129 9.87868 0.87868C10.4413 0.316071 11.2044 0 12 0C12.7956 0 13.5587 0.316071 14.1213 0.87868C14.6839 1.44129 15 2.20435 15 3C15 3.79565 14.6839 4.55871 14.1213 5.12132C13.5587 5.68393 12.7956 6 12 6C11.2044 6 10.4413 5.68393 9.87868 5.12132C9.31607 4.55871 9 3.79565 9 3ZM0 3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.316071 2.20435 0 3 0C3.79565 0 4.55871 0.316071 5.12132 0.87868C5.68393 1.44129 6 2.20435 6 3C6 3.79565 5.68393 4.55871 5.12132 5.12132C4.55871 5.68393 3.79565 6 3 6C2.20435 6 1.44129 5.68393 0.87868 5.12132C0.31607 4.55871 0 3.79565 0 3Z"
                                fill="#000"/>
                    </svg>
                </a>
            </div>
            <ul class="nau-search-employee-list">
                <li>
                    <div class="nau-employee nau-employee-shadow">
                        <div class="nau-avatar"><img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg" alt="employee">
                        </div>
                        <div class="nau-name-and-mail">
                            <div class="nau-name js-user-name"></div>
                            <div class="nau-mail js-user-email"></div>
                        </div>
                        <i></i>
                    </div>
                </li>
            </ul>
            <form action="" class="nau-form">
                <div class="nau-group-input nau-group-input-right">
                    <input type="email" placeholder="Today (March 14, 2016)"
                           class="nau-input nau-input-border nau-clalendar" id="flatpickr2"
                           value="<?php echo date('Y-m-d', time()); ?>">
                </div>
            </form>
            <div class="nau-check-list-item">
                <div class="nau-left">
                    <div class="nau-avatar"><img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg" alt="employee">
                    </div>
                    <div class="nau-name js-user-name"></div>
                    <span class="js-icon-status"><div class="nau-badge nau-badge-sm nau-normal"></div></span>

                </div>
                <div class="nau-right js-datetime"></div>
            </div>
        </div>
    </div>

    <?php include(__DIR__ . '/business_owner_settings.php'); ?>
    <?php include(__DIR__ . '/business_owner_about.php'); ?>
    <?php include(__DIR__ . '/business_owner_surveys.php'); ?>
    <?php include(__DIR__ . '/business_owner_check_ins.php'); ?>
    <?php include(__DIR__ . '/business_owner_questionary.php'); ?>


    <div class="nau-menu-frame">
        <div class="nau-menu-bg"></div>
        <div class="nau-menu">
            <a href="#." class="nau-close-menu-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.5 2.615L19.385 0.5L11 8.885L2.615 0.5L0.5 2.615L8.885 11L0.5 19.385L2.615 21.5L11 13.115L19.385 21.5L21.5 19.385L13.115 11L21.5 2.615Z"
                          fill="white"/>
                </svg>
            </a>
            <ul>
                <li><a href="#" class="show-view-settings"><?php _e('Settings', 'io-plus'); ?></a></li>
                <li><a href="#" class="show-view-about-us"><?php _e('About Us', 'io-plus'); ?></a></li>
                <li><a href="#" class="io-plus-logout"><?php _e('Logout', 'io-plus'); ?></a></li>
            </ul>
        </div>
    </div>

</div>
