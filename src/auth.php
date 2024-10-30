<?php


namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

use Hybridauth;

class Auth
{

    /**
     * Enqueue constructor.
     *
     * @since  1.0.0
     * @access public
     */
    public function __construct()
    {

    }

    /**
     * Run all hooks.
     */
    public function init()
    {
        add_action('init', array($this, 'init_auth'));
    }

    public function init_auth()
    {


        if (isset($_GET['iop_auth']) or !empty($_GET['code']) or !empty($_GET['oauth_token'])) {
            $options = iop_options();
			if(empty($options['twitter_api_key']) OR empty($options['linkedIn_client_id'])){
				wp_redirect(home_url());
				exit;
			}
            // start a new session (required for Hybridauth)
			if(empty($_SESSION)){
				session_start();
			}

            if (!empty($_GET['iop_auth'])) {

                $_SESSION['iop_return_url'] = urldecode($_GET['iop_return_url']);
                $_SESSION['iop_auth_type'] = $_GET['iop_auth'];


            }
            if (empty($_SESSION['iop_auth_type']) or empty($_SESSION['iop_auth_type'])) return false;
            $callback = home_url();
            if ($_SESSION['iop_auth_type'] == 'Twitter') $callback = home_url() . '/';
            $config = [
                //Location where to redirect users once they authenticate with Facebook
                //For this example we choose to come back to this same script
                'callback' => $callback,
                'base_url' => $callback,
                //Facebook application credentials
                'providers' => [

                    'Twitter' => [
                        'enabled' => true,
                        //Optional: indicates whether to enable or disable Twitter adapter. Defaults to false
                        'keys' => [
                            'key' => $options['twitter_api_key'],
                            //Required: your Twitter consumer key
                            'secret' => $options['twitter_api_secret']
                            //Required: your Twitter consumer secret
                        ]
                    ],
                    'LinkedIn' => [
                        'enabled' => true,
                        //Optional: indicates whether to enable or disable Twitter adapter. Defaults to false
                        'keys' => [
                            'key' => $options['linkedIn_client_id'],
                            //Required: your Twitter consumer key
                            'secret' => $options['linkedIn_client_secret']
                            //Required: your Twitter consumer secret
                        ]
                    ],

                ]
            ];


            try {

                // create an instance for Hybridauth with the configuration file path as parameter
                $hybridauth = new Hybridauth\Hybridauth($config);

                // try to authenticate the user with twitter,
                // user will be redirected to Twitter for authentication,
                // if he already did, then Hybridauth will ignore this step and return an instance of the adapter
                if ($_SESSION['iop_auth_type'] == 'Twitter') {
                    if (!empty($_GET['oauth_token'])) {
                        setcookie('oauth_token', $_GET['oauth_token'], 3600);
                    } else {
                        if (!empty($_COOKIE['oauth_token'])) {
                            $_GET['oauth_token'] = $_COOKIE['oauth_token'];
                        }
                    }
                    $twitter = $hybridauth->authenticate('Twitter');


                    // get the user profile
                    $twitter_user_profile = $twitter->getUserProfile();


                } else {
                    $twitter = $hybridauth->authenticate('LinkedIn');


                    // get the user profile
                    $twitter_user_profile = $twitter->getUserProfile();

                }


                if (!empty($twitter_user_profile)) {

                    $_SESSION['iop_aouth_user_info'] = $twitter_user_profile;

                    $client_id = $_SESSION['iop_client_id'];
                    $is_post = get_page_by_title($client_id, 'OBJECT', 'io_plus_visitor');
                    if (is_null($is_post)) {
                        $post = array(
                            'post_type' => 'io_plus_visitor',
                            'post_title' => $client_id,
                            'post_status' => 'publish',
                            'post_content' => $client_id,
                            'post_author' => get_current_user_id()
                        );
                        $post_id = wp_insert_post($post);


                    } else {
                        $post_id = $is_post->ID;

                    }
                    if (!empty($post_id)) {


                        update_post_meta($post_id, 'user_email', sanitize_text_field($twitter_user_profile->email));
                        update_post_meta($post_id, 'user_name', sanitize_text_field($twitter_user_profile->displayName));
                        update_post_meta($post_id, 'user_given_name', sanitize_text_field($twitter_user_profile->firstName));
                        update_post_meta($post_id, 'user_family_name', sanitize_text_field($twitter_user_profile->lastName));
                        update_post_meta($post_id, 'user_img', sanitize_text_field($twitter_user_profile->photoURL));
                        update_post_meta($post_id, 'sn_type', sanitize_text_field($_SESSION['iop_auth_type']));
                        update_post_meta($post_id, 'user_info', $twitter_user_profile);

                        if ($_SESSION['iop_auth_type'] == 'Twitter') {
                            update_post_meta($post_id, 'tw_id', sanitize_text_field($twitter_user_profile->identifier));
                            update_post_meta($post_id, 'tw_name', sanitize_text_field($twitter_user_profile->displayName));
                        }
                    }


                    $iop_return_url = $_SESSION['iop_return_url'];
                    $_SESSION['iop_return_url'] = '';
                    $_SESSION['iop_auth_type'] = '';


                    wp_redirect($iop_return_url);

                }

                // debug the user profile
                //print_r( $twitter_user_profile );


                exit;
            } catch (Exception $e) {
                // Display the recived error,
                // to know more please refer to Exceptions handling section on the userguide
                switch ($e->getCode()) {
                    case 0 :
                        echo __("Unspecified error.", 'io-plus');
                        break;
                    case 1 :
                        echo __("Hybriauth configuration error.", 'io-plus');
                        break;
                    case 2 :
                        echo __("Provider not properly configured.", 'io-plus');
                        break;
                    case 3 :
                        echo __("Unknown or disabled provider.", 'io-plus');
                        break;
                    case 4 :
                        echo __("Missing provider application credentials.", 'io-plus');
                        break;
                    case 5 :
                        echo __("Authentification failed. ", 'io-plus')
                            . __("The user has canceled the authentication or the provider refused the connection.", 'io-plus');
                        break;
                    case 6 :
                        echo __("User profile request failed. Most likely the user is not connected ", 'io-plus')
                            . __("to the provider and he should authenticate again.", 'io-plus');
                        $twitter->logout();
                        break;
                    case 7 :
                        echo __("User not connected to the provider.", 'io-plus');
                        $twitter->logout();
                        break;
                    case 8 :
                        echo __("Provider does not support this feature.", 'io-plus');
                        break;
                }

                // well, basically your should not display this to the end user, just give him a hint and move on..
                echo "<br /><br /><b>".__('Original error message', 'io-plus').":</b> " . $e->getMessage();

            }
            exit;
        }
    }


}
