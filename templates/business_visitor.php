<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>


<div class="io-plus-visitor">
    <div class="iop-view view-visitor">

        <div class="nau-115">


            <div class="nau-container p-60-60">
                <div class="iop-header">
                    <span><?php _e('Restaurant', 'io-plus'); ?></span>
                </div>
                <div class="mt-60">
                    <div class="iop-business-name"><?php _e('Heylan’s Restaurant', 'io-plus'); ?></div>
                    <div class="iop-business-description">
                        <?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus pretium dictum.', 'io-plus'); ?>
                    </div>
                    <div class="iop-business-info"><?php _e('Pizza • 50-60min • 1.11km • $$$$$', 'io-plus'); ?></div>
                    <div class="iop-business-selivery-fee"><?php _e('Delivery fee $5.90', 'io-plus'); ?></div>


                    <div class="select-table">
                        <div class="nau-custom-select">
                            <select>
                                <option value="0"><?php _e('Select your table', 'io-plus'); ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                            </select>
                        </div>
                    </div>


                    <div class="iop-title-trending"><?php _e('Trending', 'io-plus'); ?></div>

                    <div class="iop-products">
                        <div class="swiper-wrapper">
							<?php 
							$products_count = wp_count_posts('product')->publish;
							
							$products = get_posts( array(
								'numberposts' => $products_count,
								'category'    => 0,
								'orderby'     => 'date',
								'order'       => 'ASC',
								'include'     => array(),
								'exclude'     => array(),
								'meta_key'    => '',
								'meta_value'  =>'',
								'post_status'  =>'publish',
								'post_type'   => 'product',
							) );
							if(!empty($posts)){
								foreach($products as $product){
									
									$wc_product=wc_get_product($product->ID);
									
			

									?>
									 <div class="iop-product">
										<div class="iop-product-photo">
											<img src="<?php echo IO_PLUS_URL . 'assets/img/product_1.png' ?>">
										</div>
										<div class="iop-product-wrp-onfo">
											<div class="iop-product-name"><?php echo $product->post_title; ?></div>
											<div class="iop-product-description"><?php echo $product->post_content; ?></div>
											<div class="iop-product-price"><?php echo $wc_product->get_price() ; ?></div>
										</div>
									</div>
									<?php
								}
							}

							?>



                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<div class="iop-view view-visitor-exit">


    <div class="nau-153">
        <div class="nau-container p-60-60">
            <div class="nau-subtitle"><?php _e('See you soon...', 'io-plus'); ?>

                <div>
                    <h1 class="nau-titlemb-50 nau-left "><?php echo esc_html($business_main->post_title); ?> </h1>
                    <h3 class="mb-25 nau-left "><?php echo esc_html($post->post_title); ?></h3>
                    <div class="nau-container">
                        <div class="nau-progressbar">
                            <div class="nau-sup-text nau-left">
                                <span><?php echo esc_html($occupancy_progress); ?></span>% <?php _e('Occupancy', 'io-plus'); ?>
                            </div>
                            <div class="nau-progress">
                                <div class="nau-bar"
                                     style="width: <?php echo esc_html($occupancy_progress); ?>%;"></div>
                            </div>
                            <div class="nau-people">
                                (<?php echo esc_html($occupancy_max); ?> <?php _e('people are currently signed in', 'io-plus'); ?>
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
                                <g id="Website-desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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


            <div class="footer-subscribe p-0-60">
                <div class="footer-text"><?php _e('Subscribe with:', 'io-plus'); ?></div>
                <div class="subscribe-type">
                    <div class="cell">

                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.18 11.64C2.75817 11.64 3.31266 11.8697 3.72149 12.2785C4.13032 12.6873 4.36 13.2418 4.36 13.82C4.36 15 3.38 16 2.18 16C1 16 0 15 0 13.82C0 13.2418 0.229678 12.6873 0.638507 12.2785C1.04734 11.8697 1.60183 11.64 2.18 11.64ZM0 0.440002C4.12677 0.440002 8.08452 2.07935 11.0026 4.99742C13.9206 7.91549 15.56 11.8732 15.56 16H12.73C12.73 12.6238 11.3888 9.38587 9.00147 6.99853C6.61413 4.61119 3.37621 3.27 0 3.27V0.440002ZM0 6.1C2.62564 6.1 5.14375 7.14303 7.00036 8.99965C8.85697 10.8563 9.9 13.3744 9.9 16H7.07C7.07 14.1249 6.32513 12.3266 4.99924 11.0008C3.67336 9.67488 1.87508 8.93 0 8.93V6.1Z"
                                  fill="#2F80ED"/>
                        </svg>


                        <span><?php _e('RSS', 'io-plus'); ?></span></div>
                    <div class="cell">

                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                  fill="#2F80ED"/>
                        </svg>

                        <span><?php _e('Email', 'io-plus'); ?></span></div>
                </div>
            </div>


        </div>
    </div>
</div>



