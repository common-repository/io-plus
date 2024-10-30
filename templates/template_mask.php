<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>


<div class="io-plus-mask" style="display: none;">
    <div class="mask-view-invite-employees">
        <div class="iop-view view-invite-employees loc-#location-id#  iop-gen-view" data="#location-id#">

            <div class="iop-body">
                <div class="nau-115">

                    <div class="nau-container p-60-60">

                        <div class="nau-top-nav nau-back-btn">
                            <a href="#." class="js-prev-view">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 10.5V13.5H5.99999L14.25 21.75L12.12 23.88L0.23999 12L12.12 0.119995L14.25 2.25L5.99999 10.5H24Z"
                                          fill="#000"/>
                                </svg>
                            </a>
                        </div>


                        <h1 class="nau-title mb-50"><?php _e('Invite', 'io-plus'); ?>
                            #business-name# <?php _e('employees', 'io-plus'); ?></h1>
                        <div class="row-invite envelope">
                            <div class="nau-form" action="">
                                <div class="nau-group-input">
                                    <i class="nau-input-icon">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                                  fill="#333333"/>
                                        </svg>
                                    </i>
                                    <input type="email" placeholder="<?php _e('Add employees', 'io-plus'); ?>"
                                           class="input-mail-employees nau-input nau-input-shadow">
                                    <i class="fa fa-plus add-email"></i>

                                </div>
                            </div>


                        </div>

                        <div class="mail-employees">
                            <ul class="nau-employees-list list-mail"></ul>
                        </div>

                        <button class="nau-btn nau-btn-2 nau-copy-link">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M1.9 5C1.9 3.29 3.29 1.9 5 1.9H9V0H5C2.24 0 0 2.24 0 5C0 7.76 2.24 10 5 10H9V8.1H5C3.29 8.1 1.9 6.71 1.9 5ZM6 6H14V4H6V6ZM15 0H11V1.9H15C16.71 1.9 18.1 3.29 18.1 5C18.1 6.71 16.71 8.1 15 8.1H11V10H15C17.76 10 20 7.76 20 5C20 2.24 17.76 0 15 0Z"
                                        fill="#333333"/>
                            </svg>
                            <span><?php _e('Copy Location Manager Link', 'io-plus'); ?></span>
                        </button>
                        <div class="copy-alert"><?php _e('Your link has been copied', 'io-plus'); ?></div>
                        <div class="list-invite-link">
                            <input type="text" id="link_copy_#location-id#" readonly="readonly" value="#location-link#">

                        </div>


                    </div>


                </div>
            </div>
            <div class="nau-container p-0-60">
                <div class="invite-employees oip-button"><?php _e('Invite employees', 'io-plus'); ?></div>
            </div>
        </div>

    </div>

    <div class="mask-view-settings">

        <div class="iop-view view-settings loc-#location-id# iop-gen-view" data="#location-id#">

            <div class="nau-115">
                <div class="nau-container p-60-60">


                    <div class="nau-top-nav nau-back-btn">
                        <a href="#." class="js-prev-view">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 10.5V13.5H5.99999L14.25 21.75L12.12 23.88L0.23999 12L12.12 0.119995L14.25 2.25L5.99999 10.5H24Z"
                                      fill="#000"/>
                            </svg>
                        </a>
                    </div>


                    <h1 class="nau-title mb-50 nau-left "><?php _e('Set Occupancy', 'io-plus'); ?></h1>

                    <div class="nau-loc-item">
                        <div class="nau-loc-name">#business-name#</div>
                        <div class="nau-loc-rating"><span class="nau-number">#business-rating#</span><span
                                    class="nau-stars">#business-stars#</span></div>
                        <div class="nau-loc-address">#business-address#</div>
                    </div>
                    <!--<div class="nau-progressbar">
				<div class="nau-sup-text nau-left"><span>0</span>% </div>
				<div class="nau-progress">
				  <div class="nau-bar" style="width: 0%;"></div>
				</div>
				<div class="nau-people">(50 <?php _e('people are currently signed in', 'io-plus'); ?>)</div>
			  </div>-->
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
                <div class="save-settings oip-button">#button-setting#</div>
            </div>
            <div class="nau-footer-copy">
                <ul class="quest-progress">
                    #setting-progress#
                </ul>
            </div>

        </div>
    </div>

    <div class="svg-gear">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.52 14.2533C22.5733 13.8533 22.6 13.44 22.6 13C22.6 12.5733 22.5733 12.1467 22.5067 11.7467L25.2133 9.64C25.33 9.54387 25.4097 9.41026 25.4388 9.26196C25.468 9.11365 25.4449 8.95982 25.3733 8.82667L22.8133 4.4C22.738 4.26609 22.6176 4.16317 22.4736 4.10948C22.3297 4.05579 22.1713 4.05479 22.0267 4.10667L18.84 5.38667C18.1733 4.88 17.4667 4.45333 16.68 4.13333L16.2 0.746667C16.1764 0.594041 16.0988 0.454944 15.9814 0.354636C15.864 0.254328 15.7145 0.199462 15.56 0.200001H10.44C10.12 0.200001 9.86668 0.426667 9.81334 0.746667L9.33335 4.13333C8.54668 4.45333 7.82668 4.89333 7.17335 5.38667L3.98668 4.10667C3.69335 4 3.36001 4.10667 3.20001 4.4L0.653347 8.82667C0.493347 9.10667 0.54668 9.45333 0.813346 9.64L3.52001 11.7467C3.45335 12.1467 3.40001 12.5867 3.40001 13C3.40001 13.4133 3.42668 13.8533 3.49335 14.2533L0.78668 16.36C0.670045 16.4561 0.590351 16.5897 0.561176 16.738C0.532002 16.8864 0.555151 17.0402 0.62668 17.1733L3.18668 21.6C3.34668 21.8933 3.68001 21.9867 3.97335 21.8933L7.16001 20.6133C7.82668 21.12 8.53335 21.5467 9.32001 21.8667L9.80001 25.2533C9.86668 25.5733 10.12 25.8 10.44 25.8H15.56C15.88 25.8 16.1467 25.5733 16.1867 25.2533L16.6667 21.8667C17.4533 21.5467 18.1733 21.12 18.8267 20.6133L22.0133 21.8933C22.3067 22 22.64 21.8933 22.8 21.6L25.36 17.1733C25.52 16.88 25.4533 16.5467 25.2 16.36L22.52 14.2533ZM13 17.8C10.36 17.8 8.20001 15.64 8.20001 13C8.20001 10.36 10.36 8.2 13 8.2C15.64 8.2 17.8 10.36 17.8 13C17.8 15.64 15.64 17.8 13 17.8Z"
                  fill="#B3B9C5"/>
        </svg>
    </div>

</div>
