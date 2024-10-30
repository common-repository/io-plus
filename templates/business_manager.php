<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

$post = get_post(get_the_ID());


/*$users = array();

$count_posts = wp_count_posts('io_plus_employee');
$count = $count_posts->publish;
$post_id = get_the_ID();
$employees = get_posts(array(
    'numberposts' => $count,
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
                'format_date' => date('F d, Y ', $result['time']),
                'time' => date('g:i A', $result['time']),
                'unix_time' => $result['time'],
            );

        }


    }


}*/


?>


<div class="io-plus-manager">
    <div class="iop-view view-manager">


        <div class="nau-135">
            <div class="nau-container p-60-60">
                <h2 class="nau-center mb-60"><?php echo esc_html($business_main->post_title); ?><?php _e('Report', 'io-plus'); ?></h2>
                <h3 class="mb-25 nau-center "><?php echo esc_html($post->post_title); ?></h3>
				

				
                <div class="swiper-container nau-report-slider">
                    <div class="swiper-wrapper">


                        <?php
                        $tabs = array();
                        $tabs['fever'] = array(
                            'class' => 'nau-fever',
                            'name' => __('Fever', 'io-plus'),
                        );
                        $tabs['visit'] = array(
                            'class' => 'nau-visitor',
                            'name' => __('Visitor', 'io-plus'),
                        );
                        $tabs['family_positive'] = array(
                            'class' => 'nau-positive',
                            'name' => __('F. Positive', 'io-plus'),
                        );
                        $hdata = 'data-hash="fever"';
                        foreach ($tabs as $key => $tab) {

                            ?>
                            <div class="swiper-slide jtb-<?php echo $key; ?>" <?php echo esc_html($hdata); ?>>

                                <?php
                                $hdata = '';

                                /*foreach ($users as $user) {

                                    if (array_search($key, $user['interview']) === false) continue;
                                    ?>

                                    <div class="nau-report-card <?php echo esc_html($user['date']); ?>">
                                        <div class="nau-report-top">
                                            <div class="nau-name-and-mail">
                                                <div><?php echo esc_html($user['name']); ?></div>
                                                <span><?php echo esc_html($user['email']); ?></span>
                                            </div>
                                            <div class="nau-badge <?php echo esc_html($tab['class']) ?>">
                                                <span><?php _e($tab['name'], 'io-plus'); ?></span></div>
                                        </div>
                                        <div class="nau-report-bottom">
                                            <div class="nau-time">
                                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M6 9H4V11H6V9ZM10 9H8V11H10V9ZM14 9H12V11H14V9ZM16 2H15V0H13V2H5V0H3V2H2C0.89 2 0.00999999 2.9 0.00999999 4L0 18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM16 18H2V7H16V18Z"
                                                            fill="#333333"/>
                                                </svg>
                                                <span><?php echo esc_html($user['format_date']); ?></span>
                                            </div>
                                            <div class="nau-time">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10.5 5H9V11L14.2 14.2L15 12.9L10.5 10.2V5Z"
                                                          fill="#333333"/>
                                                </svg>
                                                <span><?php echo esc_html($user['time']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                }*/
                                ?>
                            </div>
                            <?php
							
							
							
							
                        }

                        ?>


                    </div>
                </div>
            </div>


            <div class="nau-report-nav">
                <div class="nau-report-nav-top">
                    <div class="nau-report-nav-buttons"></div>
                </div>
                <div class="nau-report-nav-bottom">
                    <div action="" class="nau-form">
                        <div class="nau-group-input nau-group-input-right">
                            <i class="nau-input-icon">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M6 9H4V11H6V9ZM10 9H8V11H10V9ZM14 9H12V11H14V9ZM16 2H15V0H13V2H5V0H3V2H2C0.89 2 0.00999999 2.9 0.00999999 4L0 18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM16 18H2V7H16V18Z"
                                            fill="black"/>
                                </svg>
                            </i>
                            <input type="email" placeholder="<?php echo date('Y-m-d', time()); ?>"
                                   class="nau-input nau-input-border js-input-filter-date" id="flatpickr"
                                   value="<?php echo date('Y-m-d', time()); ?>">
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
	



</div>
