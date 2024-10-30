<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>

<div class="iop-view view-login">
    <div class="pos-center">
        <div class="iop-body">
            <div class="iop-dn">
                <div id="google-button-signin"></div>
            </div>
            <div class="nau-135">
                <div class="nau-container p-60-60">
                    <!--
					<div id="google-button-signin"></div>

					<div class="g-user-name"></div>-->
                    <h1 class="nau-title mb-100"><?php _e('Setup Outbreak Notification Alert for your business', 'io-plus'); ?></h1>
                    <div class="nau-btn but-google-signin">

                        <svg width="20px" height="20px" viewBox="0 0 349 357" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
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

                    <?php $return_url = urlencode(home_url() . $_SERVER['REQUEST_URI']);
                    $url = home_url() . '/?iop_return_url=' . esc_url($return_url) . '&iop_auth=';
                    ?>
                    <div class="swiper-container nau-sign-in-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url($url); ?>Twitter">
                                    <div class="nau-sign-in-item" style="background-color: #1DA1F2;"><i
                                                class="fab fa-twitter"></i></div>
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
                    <?php //buttons_sn();
                    ?>

                </div>
            </div>

        </div>
    </div>

    <div class="iop-link-feedback"><a href="/feedback/">Feedback ioplus.org</a></div>

    <div class="iop-footer">
        <div class="nau-footer-logo">
            <svg width="100" height="21" viewBox="0 0 100 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.118677 16.0584H3.27845V4.66548H0.118677V16.0584ZM1.70598 3.19686C2.64798 3.19686 3.41937 2.47738 3.41937 1.59472C3.41937 0.719479 2.64798 0 1.70598 0C0.771399 0 0 0.719479 0 1.59472C0 2.47738 0.771399 3.19686 1.70598 3.19686Z"
                      fill="#828282"/>
                <path d="M10.9572 16.281C14.4137 16.281 16.5647 13.9149 16.5647 10.4065C16.5647 6.87584 14.4137 4.51713 10.9572 4.51713C7.50074 4.51713 5.34973 6.87584 5.34973 10.4065C5.34973 13.9149 7.50074 16.281 10.9572 16.281ZM10.972 13.8333C9.37732 13.8333 8.56142 12.3721 8.56142 10.3842C8.56142 8.39638 9.37732 6.92776 10.972 6.92776C12.5371 6.92776 13.353 8.39638 13.353 10.3842C13.353 12.3721 12.5371 13.8333 10.972 13.8333Z"
                      fill="#828282"/>
                <path d="M18.6193 20.3308H21.779V14.2338H21.8755C22.3131 15.1832 23.2699 16.2439 25.1094 16.2439C27.7055 16.2439 29.7304 14.1893 29.7304 10.3768C29.7304 6.46047 27.6165 4.51713 25.1168 4.51713C23.2106 4.51713 22.2983 5.65198 21.8755 6.57914H21.7345V4.66548H18.6193V20.3308ZM21.7123 10.362C21.7123 8.32963 22.5727 7.0316 24.1081 7.0316C25.6731 7.0316 26.5039 8.38896 26.5039 10.362C26.5039 12.3498 25.6583 13.7294 24.1081 13.7294C22.5875 13.7294 21.7123 12.3943 21.7123 10.362Z"
                      fill="#828282"/>
                <path d="M34.9967 0.867824H31.8369V16.0584H34.9967V0.867824Z" fill="#828282"/>
                <path d="M44.8339 11.2075C44.8413 12.7355 43.7954 13.5366 42.6606 13.5366C41.4664 13.5366 40.695 12.6984 40.6876 11.3559V4.66548H37.5278V11.9196C37.5352 14.5824 39.0929 16.2068 41.3848 16.2068C43.0982 16.2068 44.3295 15.3241 44.8413 13.989H44.9599V16.0584H47.9936V4.66548H44.8339V11.2075Z"
                      fill="#828282"/>
                <path d="M60.0004 7.91426C59.7185 5.81516 58.0274 4.51713 55.1495 4.51713C52.2345 4.51713 50.3134 5.86708 50.3208 8.0626C50.3134 9.76858 51.3889 10.8738 53.6141 11.3188L55.5871 11.7119C56.581 11.9122 57.0335 12.2756 57.0483 12.8468C57.0335 13.5217 56.2991 14.0039 55.194 14.0039C54.0665 14.0039 53.3174 13.5217 53.1245 12.5946L50.0167 12.7578C50.3134 14.9384 52.1677 16.281 55.1865 16.281C58.1386 16.281 60.2526 14.7753 60.26 12.5278C60.2526 10.8812 59.1771 9.89467 56.9667 9.44222L54.9047 9.02685C53.844 8.79692 53.4509 8.43347 53.4583 7.88459C53.4509 7.2022 54.2223 6.75716 55.2014 6.75716C56.2991 6.75716 56.9519 7.35796 57.1076 8.09227L60.0004 7.91426Z"
                      fill="#828282"/>
                <path d="M64.0966 16.2513C65.046 16.2513 65.8693 15.4576 65.8767 14.4711C65.8693 13.4995 65.046 12.7058 64.0966 12.7058C63.1175 12.7058 62.309 13.4995 62.3164 14.4711C62.309 15.4576 63.1175 16.2513 64.0966 16.2513Z"
                      fill="#828282"/>
                <path d="M73.6185 16.281C77.075 16.281 79.226 13.9149 79.226 10.4065C79.226 6.87584 77.075 4.51713 73.6185 4.51713C70.1621 4.51713 68.0111 6.87584 68.0111 10.4065C68.0111 13.9149 70.1621 16.281 73.6185 16.281ZM73.6334 13.8333C72.0386 13.8333 71.2227 12.3721 71.2227 10.3842C71.2227 8.39638 72.0386 6.92776 73.6334 6.92776C75.1984 6.92776 76.0143 8.39638 76.0143 10.3842C76.0143 12.3721 75.1984 13.8333 73.6334 13.8333Z"
                      fill="#828282"/>
                <path d="M81.2806 16.0584H84.4404V9.61282C84.4404 8.21095 85.464 7.2467 86.8584 7.2467C87.296 7.2467 87.8968 7.32087 88.1935 7.4173V4.61356C87.9117 4.5468 87.5185 4.5023 87.1996 4.5023C85.9238 4.5023 84.878 5.24403 84.4626 6.65332H84.3439V4.66548H81.2806V16.0584Z"
                      fill="#828282"/>
                <path d="M94.4296 20.494C97.6858 20.494 100 19.0105 100 16.1697V4.66548H96.8625V6.57914H96.7438C96.321 5.65198 95.3939 4.51713 93.4876 4.51713C90.988 4.51713 88.8741 6.46047 88.8741 10.3397C88.8741 14.13 90.9286 15.8953 93.495 15.8953C95.3123 15.8953 96.3284 14.9829 96.7438 14.0409H96.8773V16.1252C96.8773 17.6161 95.876 18.2243 94.5038 18.2243C93.1093 18.2243 92.4047 17.6161 92.1451 17.0004L89.2227 17.3936C89.601 19.1144 91.3588 20.494 94.4296 20.494ZM94.4964 13.5217C92.9461 13.5217 92.1006 12.2905 92.1006 10.3249C92.1006 8.38896 92.9313 7.0316 94.4964 7.0316C96.0317 7.0316 96.8922 8.32963 96.8922 10.3249C96.8922 12.335 96.0169 13.5217 94.4964 13.5217Z"
                      fill="#828282"/>
            </svg>

        </div>
        <div class="nau-footer-copy"><?php _e('© 2020', 'io-plus'); ?>
            &#160;<span><?php _e('KI Social™', 'io-plus'); ?></span>. <?php _e('All Rights Reserved', 'io-plus'); ?>
        </div>
    </div>

</div>
<?php

/*function buttons_sn(){
		$return_url=urlencode(home_url().$_SERVER['REQUEST_URI']);
		$url = home_url().'/?return_url='.esc_url($return_url).'&iop_auth=';
		?>
		 <div class="swiper-container nau-sign-in-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
           <a href="<?php echo esc_url($url); ?>Twitter"> <div class="nau-sign-in-item" style="background-color: #1DA1F2;"><i class="fab fa-twitter"></i></div></a>
          </div>
          <div class="swiper-slide">
            <div class="nau-sign-in-item nau-no-active" style="background-color: #3B5998;"><i class="fab fa-facebook"></i></div>
          </div>
          <div class="swiper-slide">
            <div class="nau-sign-in-item nau-no-active" style="background-color: #FF4500;"><i class="fab fa-reddit"></i></div>
          </div>
          <div class="swiper-slide">
            <a href="<?php echo esc_url($url); ?>Linkedin"><div class="nau-sign-in-item" style="background-color: #0077B5;"><i class="fab fa-linkedin-in"></i></div></a>
          </div>
          <div class="swiper-slide">
            <div class="nau-sign-in-item nau-no-active" style="background-color: #6BBDEB"><i class="fab fa-vimeo-v"></i></div>
          </div>
        </div>
      </div>
		<?php
	}*/

?>
