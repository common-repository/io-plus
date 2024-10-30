<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>

<div class="iop-view view-owner-check-ins" style="background: #F3F5FB;">

    <div class="nau-115">
        <div class="nau-container p-60-60">

            <form action="" class="nau-form mtop-50">
                <div class="nau-group-input nau-group-input-right">
                    <input type="email" placeholder="<?php _e('Today (March 14, 2016)', 'io-plus'); ?>"
                           class="nau-input nau-input-border nau-clalendar" id="flatpickr_cs"
                           value="<?php echo date('Y-m-d', time()); ?>">
                </div>
            </form>
            <div class="list-check-ins"></div>

        </div>
    </div>

    <!--<div class="iop-bottom-menu">
        <div class="menu-row">
            <div class="but-menu js-show-owner-main">
                <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.1176 3.79765L21.1765 10.1506V21.1765H18.3529V12.7059H9.88235V21.1765H7.05882V10.1506L14.1176 3.79765ZM14.1176 0L0 12.7059H4.23529V24H12.7059V15.5294H15.5294V24H24V12.7059H28.2353L14.1176 0Z" fill="#BDBDBD" />
                </svg>

                <div class="mnu-label"><?php _e('Home', 'io-plus'); ?></div>
            </div>
            <div class="but-menu js-show-surveys">
                <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2727 0H2.18182C0.981818 0 0 0.981818 0 2.18182V17.4545H2.18182V2.18182H15.2727V0ZM14.1818 4.36364H6.54545C5.34545 4.36364 4.37455 5.34545 4.37455 6.54545L4.36364 21.8182C4.36364 23.0182 5.33454 24 6.53454 24H18.5455C19.7455 24 20.7273 23.0182 20.7273 21.8182V10.9091L14.1818 4.36364ZM6.54545 21.8182V6.54545H13.0909V12H18.5455V21.8182H6.54545Z" fill="#B3B9C5" />
                </svg>

                <div class="mnu-label"><?php _e('Surveys', 'io-plus'); ?></div>
            </div>
            <div class="but-menu m-activ">
                <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.4 0C3.756 0 0 3.756 0 8.4C0 14.7 8.4 24 8.4 24C8.4 24 16.8 14.7 16.8 8.4C16.8 3.756 13.044 0 8.4 0ZM2.4 8.4C2.4 5.088 5.088 2.4 8.4 2.4C11.712 2.4 14.4 5.088 14.4 8.4C14.4 11.856 10.944 17.028 8.4 20.256C5.904 17.052 2.4 11.82 2.4 8.4Z" fill="#2F80ED" />
                    <path d="M8.3999 11.4C10.0568 11.4 11.3999 10.0568 11.3999 8.39999C11.3999 6.74314 10.0568 5.39999 8.3999 5.39999C6.74305 5.39999 5.3999 6.74314 5.3999 8.39999C5.3999 10.0568 6.74305 11.4 8.3999 11.4Z" fill="#2F80ED" />
                </svg>
                <div class="mnu-label"><?php _e('Check-ins', 'io-plus'); ?></div>
            </div>
        </div>
    </div>-->
</div>
