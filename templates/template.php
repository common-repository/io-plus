<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

$options = iop_options();
$client_id = get_var($options['client_id']);


if (!empty($client_id)):
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="google-signin-client_id" content="<?php echo esc_attr($client_id); ?>">
    <script>var _post_business = '';</script>
<div class="io-plus">
    <div class="io-plus-views">

        <?php include(__DIR__ . '/template_start.php'); ?>

        <!-- Google auth -->

        <?php include(__DIR__ . '/template_sign_in.php'); ?>

        <!-- Search Locations -->

        <?php include(__DIR__ . '/template_search_location.php'); ?>

        <!-- Choose Locations -->

        <div class="iop-view view-choose-locations">

            <div class="pos-center">
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

                            <h1 class="nau-title mb-100"><?php _e('Please, choose the location', 'io-plus'); ?></h1>
                            <div class="nau-locations-list locations-list"></div>

                        </div>
                    </div>
                </div>
                <div class="nau-container p-0-60">
                    <div class="select-locations oip-button"><?php _e('Register Location', 'io-plus'); ?></div>
                </div>


            </div>

        </div>

        <!-- QR Code-->

        <div class="iop-view view-qrcode">
            <div class="iop-body">
                <div class="nau-193">
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

                        <h1 class="nau-title mb-50 js-title-first-business"></h1>
                        <div class="qrcode-list"></div>
                    </div>
                </div>

            </div>

            <div class="nau-container p-0-60">

                <div class="next-email oip-button-white mb-25"><?php _e('Send to email', 'io-plus'); ?></div>
                <div class="next-invite-employees oip-button"><?php _e('Invite Employees', 'io-plus'); ?></div>

            </div>
            <div class="icon-eye" style="display: none;">
                <i class="nau-input-icon">
                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M11 5C11.7956 5 12.5587 5.31607 13.1213 5.87868C13.6839 6.44129 14 7.20435 14 8C14 8.79565 13.6839 9.55871 13.1213 10.1213C12.5587 10.6839 11.7956 11 11 11C10.2044 11 9.44129 10.6839 8.87868 10.1213C8.31607 9.55871 8 8.79565 8 8C8 7.20435 8.31607 6.44129 8.87868 5.87868C9.44129 5.31607 10.2044 5 11 5ZM11 0.5C16 0.5 20.27 3.61 22 8C20.27 12.39 16 15.5 11 15.5C6 15.5 1.73 12.39 0 8C1.73 3.61 6 0.5 11 0.5ZM2.18 8C2.98825 9.65031 4.24331 11.0407 5.80248 12.0133C7.36165 12.9858 9.1624 13.5013 11 13.5013C12.8376 13.5013 14.6383 12.9858 16.1975 12.0133C17.7567 11.0407 19.0117 9.65031 19.82 8C19.0117 6.34969 17.7567 4.95925 16.1975 3.98675C14.6383 3.01424 12.8376 2.49868 11 2.49868C9.1624 2.49868 7.36165 3.01424 5.80248 3.98675C4.24331 4.95925 2.98825 6.34969 2.18 8Z"
                                fill="#BDBDBD"/>
                    </svg>
                </i>
            </div>
        </div>


        <!-- Sucessful -->

        <div class="iop-view view-sucessful">


            <div class="nau-container">
                <div class="nau-success-frame">
                    <div class="nau-success">
                        <h1><?php _e('Sucessful!', 'io-plus'); ?></h1>
                        <p><?php _e('Please, setup your business now', 'io-plus'); ?></p>
                        <img src="<?php echo IO_PLUS_URL; ?>assets/img/success.png" alt="success">
                        <div class="add-more-site oip-button"><?php _e('Add More Sites', 'io-plus'); ?></div>

                        <div class="setup-finish oip-button-white"><?php _e('Finish', 'io-plus'); ?></div>
                    </div>
                </div>


            </div>


        </div>


        <?php else:
            ?>
            <div class="io-plus">
                <div class="iop-view view-not-key active">
                    <div class="title"><?php _e('No keys', 'io-plus'); ?></div>
                </div>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>

<?php include(__DIR__ . '/template_mask.php'); ?>
<?php include(__DIR__ . '/text.php'); ?>
