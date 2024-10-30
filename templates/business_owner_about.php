<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>

<div class="iop-view view-owner-about-us">

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


            <h1 class="nau-title mb-50 nau-left "><?php _e('About us', 'io-plus'); ?></h1>
			
			<div class="content">
			<?php 
			$post_id = get_the_ID();
			if(!empty($post_id)){
				$post=get_post($post_id);
				if(!empty($post)){
					echo esc_html($post->post_content);
				}
			}
			?>
			</div>


        </div>
    </div>


</div>


