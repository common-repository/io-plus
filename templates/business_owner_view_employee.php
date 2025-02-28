<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>


<div class="iop-view view-employee-detail">
    <div class="nau-115">

        <div class="nau-container">
            <div class="nau-top-nav nau-back-btn">
                <a href="#." class="js-btn-back">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 10.5V13.5H5.99999L14.25 21.75L12.12 23.88L0.23999 12L12.12 0.119995L14.25 2.25L5.99999 10.5H24Z"
                              fill="white"/>
                    </svg>
                </a>
                <a href="#." class="nau-menu-btn">
                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M18 3C18 2.20435 18.3161 1.44129 18.8787 0.87868C19.4413 0.316071 20.2044 0 21 0C21.7956 0 22.5587 0.316071 23.1213 0.87868C23.6839 1.44129 24 2.20435 24 3C24 3.79565 23.6839 4.55871 23.1213 5.12132C22.5587 5.68393 21.7956 6 21 6C20.2044 6 19.4413 5.68393 18.8787 5.12132C18.3161 4.55871 18 3.79565 18 3ZM9 3C9 2.20435 9.31607 1.44129 9.87868 0.87868C10.4413 0.316071 11.2044 0 12 0C12.7956 0 13.5587 0.316071 14.1213 0.87868C14.6839 1.44129 15 2.20435 15 3C15 3.79565 14.6839 4.55871 14.1213 5.12132C13.5587 5.68393 12.7956 6 12 6C11.2044 6 10.4413 5.68393 9.87868 5.12132C9.31607 4.55871 9 3.79565 9 3ZM0 3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.316071 2.20435 0 3 0C3.79565 0 4.55871 0.316071 5.12132 0.87868C5.68393 1.44129 6 2.20435 6 3C6 3.79565 5.68393 4.55871 5.12132 5.12132C4.55871 5.68393 3.79565 6 3 6C2.20435 6 1.44129 5.68393 0.87868 5.12132C0.31607 4.55871 0 3.79565 0 3Z"
                                fill="white"/>
                    </svg>
                </a>
            </div>
            <div class="nau-avatar-frame">
                <span class="js-badge"><div class="nau-badge nau-normal"><span>Normal</span></div></span>

                <img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg" alt="employee">
            </div>
        </div>
        <div class="nau-container p-30-30">
            <div class="nau-employee-name-and-mail">
                <div class="js-user-name"></div>
                <span class="js-user-email"></span>
            </div>
            <div class="nau-check-list-frame">
                <div class="nau-top">
                    <div>Latest’s Check-In</div>
                    <a href="#.">SEE ALL</a>
                </div>
                <ul class="nau-check-list">
                    <li class="nau-check-list-item">
                        <div class="nau-left">
                            <div class="nau-avatar"><img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg"
                                                         alt="employee"></div>
                            <div class="nau-name">John Doe</div>
                            <div class="nau-badge nau-badge-sm nau-normal">Normal</div>
                        </div>
                        <div class="nau-right">Today</div>
                    </li>
                    <li class="nau-check-list-item">
                        <div class="nau-left">
                            <div class="nau-avatar"><img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg"
                                                         alt="employee"></div>
                            <div class="nau-name">John Doe</div>
                            <div class="nau-badge nau-badge-sm nau-normal">Yesterday</div>
                        </div>
                        <div class="nau-right">Today</div>
                    </li>
                    <li class="nau-check-list-item">
                        <div class="nau-left">
                            <div class="nau-avatar"><img src="<?php echo IO_PLUS_URL; ?>assets/img/man.jpg"
                                                         alt="employee"></div>
                            <div class="nau-name">John Doe</div>
                            <div class="nau-badge nau-badge-sm nau-normal">Normal</div>
                        </div>
                        <div class="nau-right">02 Ago</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nau-container p-0-60">
        <div class="see-schedule oip-button"><?php _e('See Schedule', 'io-plus'); ?></div>
    </div>

</div>





