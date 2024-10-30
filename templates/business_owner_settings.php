<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

?>

<div class="iop-view view-owner-settings">

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


            <h1 class="nau-title mb-50 nau-left "><?php _e('Settings', 'io-plus'); ?></h1>


            <div class="nau-form">
                <input type="email" placeholder="<?php _e('Number of Occupants', 'io-plus'); ?>"
                       class="nau-input nau-input-border nau-without-icon input-visitors-count">
            </div>

            <br>

            <div class="nau-custom-select">
                <select>
                    <option value="0"><?php _e('Allowed Occupancy Rate', 'io-plus'); ?></option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                    <option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>

                </select>
            </div>


            <div class="nau-form">
                <input type="email" placeholder="<?php _e('Type your emergency number', 'io-plus'); ?>"
                       class="nau-input nau-input-border nau-without-icon input-emergency-number">
            </div>
            <br>

        </div>
    </div>
    <div class="nau-container p-0-60">
		<div class="save-label"><?php _e('Settings have been saved', 'io-plus'); ?></div>
        <div class="owner-save-settings oip-button"><?php _e('Save Settings', 'io-plus'); ?></div>
    </div>


</div>
