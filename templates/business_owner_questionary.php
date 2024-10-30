<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>

<div class="iop-view view-owner-questionary">

    <div class="nau-115">
        <div class="nau-container p-60-60">


            <div class="nau-top-nav nau-back-btn">
                <a href="#." class="js-prev-view">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 10.5V13.5H5.99999L14.25 21.75L12.12 23.88L0.23999 12L12.12 0.119995L14.25 2.25L5.99999 10.5H24Z"
                              fill="#000"/>
                    </svg>
                </a>
            </div>


            <h1 class="mb-100"><?php _e('Do you have contact with Covid?', 'io-plus'); ?></h1>


            <div class="iop-options-button">
                <div class="iop-opt-but" data="fever"><?php _e('Yes', 'io-plus'); ?></div>
                <div class="iop-opt-but"><?php _e('No', 'io-plus'); ?></div>
            </div>

        </div>
        <div class="nau-footer-copy">
            <ul class="quest-progress">
                <li class="nau-active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>


    </div>


</div>


