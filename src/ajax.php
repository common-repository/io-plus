<?php
/**
 * Ajax
 */

namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

use Fpdf;
use chillerlan\QRCode\{QRCode, QROptions};

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Ajax
{


    public function __construct()
    {


    }


    public function init()
    {

        add_action('wp_ajax_oi_plus_add_business', array($this, 'add_business'));
        add_action('wp_ajax_nopriv_oi_plus_add_business', array($this, 'add_business'));

        add_action('wp_ajax_oi_plus_add_employees', array($this, 'add_employees'));
        add_action('wp_ajax_nopriv_oi_plus_add_employees', array($this, 'add_employees'));

        add_action('wp_ajax_oi_plus_add_pin_code', array($this, 'add_pin_code'));
        add_action('wp_ajax_nopriv_oi_plus_add_pin_code', array($this, 'add_pin_code'));

        add_action('wp_ajax_oi_plus_is_employee', array($this, 'is_employee'));
        add_action('wp_ajax_nopriv_oi_plus_is_employee', array($this, 'is_employee'));

        add_action('wp_ajax_oi_plus_client_id', array($this, 'client_id'));
        add_action('wp_ajax_nopriv_oi_plus_client_id', array($this, 'client_id'));

        add_action('wp_ajax_oi_plus_save_settings_business', array($this, 'save_settings_business'));
        add_action('wp_ajax_nopriv_oi_plus_save_settings_business', array($this, 'save_settings_business'));

        add_action('wp_ajax_oi_plus_get_settings_business', array($this, 'get_settings_business'));
        add_action('wp_ajax_nopriv_oi_plus_get_settings_business', array($this, 'get_settings_business'));

        add_action('wp_ajax_oi_plus_interview', array($this, 'interview'));
        add_action('wp_ajax_nopriv_oi_plus_interview', array($this, 'interview'));

        add_action('wp_ajax_oi_plus_get_employee', array($this, 'get_employee'));
        add_action('wp_ajax_nopriv_oi_plus_get_employee', array($this, 'get_employee'));

		add_action('wp_ajax_oi_plus_logout', array($this, 'logout'));
        add_action('wp_ajax_nopriv_oi_plus_logout', array($this, 'logout'));


    }

    public function add_business()
    {
	    check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

	    if ( empty( $_POST['business'] ) ) {
		    return false;
	    }
	    if ( is_array( $_POST['business'] ) === false ) {
		    return false;
	    }

	    $result = array();

	    if ( ! empty( $_POST['user'] ) && is_array( $_POST['user'] ) ) {

		    $user_id = $this->update_user( $_POST['user'] );
		    update_post_meta( $user_id, 'user_type', 'owner' );

		    $time_cookie = time() + 3600 * 24 * 30;
		    setcookie( 'io_plus_user_gid', sanitize_text_field( $_POST['user']['id'] ), $time_cookie );

	    }

	    $user_business_id = array();
	    foreach ( $_POST['business'] as $item ) {

		    if ( empty( $item['business'] ) || empty( $item['address'] ) ) {
			    continue;
		    }

		    $business = get_var( $item['business'] );
		    $address  = get_var( $item['address'] );
		    $rating   = get_var( $item['rating'] );
		    $phone    = get_var( $item['phone'] );
		    $website  = get_var( $item['website'] );

		    $business_post = get_page_by_path( $business, OBJECT, 'io_plus_business' );

		    if ( empty( $business_post ) ) {

			    //$title = $business . ' ' . $address;
			    $post = array(
				    'post_type'    => 'io_plus_business',
				    'post_title'   => $business,
				    'post_status'  => 'publish',
				    'post_content' => '',
				    'post_author'  => get_current_user_id()
			    );

			    $business_id = wp_insert_post( $post );

		    } else {
			    $business_id = $business_post->ID;
		    }

		    $adress_post = get_page_by_path( $address, OBJECT, 'io_plus_business' );

		    if ( empty( $adress_post ) || $business_id !== $adress_post->post_parent ) {
			    //$title = $business . ' ' . $address;
			    $adress_post = array(
				    'post_type'    => 'io_plus_business',
				    'post_title'   => $address,
				    'post_status'  => 'publish',
				    'post_content' => '',
				    'post_parent'  => $business_id,
				    'post_author'  => get_current_user_id()
			    );

			    $adress_post_id = wp_insert_post( $adress_post );
		    } else {
			    $adress_post_id = $adress_post->ID;
		    }


		    //************************************************************
		    //Send to server
		    $host_user = '';
		    if ( iop_option_partner() ) {
			    $host_user = post_variables( 'user' );
		    }
		    $data = array(
			    'user'                    => $host_user,
			    'host_user_id'            => $user_id,
			    'business'                => $item,
			    'host_business_id'        => $adress_post_id,
			    'host_business_id_parent' => $business_id,
		    );

		    $api          = new Query;
		    $iop_business = $api->api( 'add_business', $data );


		    //************************************************************
		    if ( ! empty( $iop_business ) ) {
			    $iop_business_id = $iop_business['id'];
			    update_post_meta( $adress_post_id, 'io_plus_business_id', $iop_business_id );
		    }


		    add_post_meta( $user_id, 'business_id', $adress_post_id, false );


		    $result[] = array(
			    'id'     => $adress_post_id,
			    'link'   => get_the_permalink( $adress_post_id ),
			    'name'   => $business,
			    'owner'  => $user_id,
			    'rating' => $rating,
		    );

	    }

	    echo json_encode( $result );


	    exit;
    }

	public function add_employees() {

		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		$j = 0;
		if ( ! empty( $_POST['employees'] ) ) {
			if ( is_array( $_POST['employees'] ) == true ) {
				if ( count( $_POST['employees'] ) > 0 ) {
					$employees_host = array();
					foreach ( $_POST['employees'] as $mail ) {
						$employees_id = $this->is_user( $mail );
						if ( $employees_id === false ) {

							$post = array(
								'post_type'    => 'io_plus_employee',
								'post_title'   => get_var( $mail ),
								'post_status'  => 'publish',
								'post_content' => get_var( $mail ),
								'post_author'  => 1
							);

							$employees_id = wp_insert_post( $post );
						}

						$employees_host[] = array(
							'email' => $mail,
							'id'    => $employees_id,
						);

						update_post_meta( $employees_id, 'user_email', $mail );
						update_post_meta( $employees_id, 'user_type', 'employee' );
						if ( ! empty( $_POST['business'] ) ) {
							add_post_meta( $employees_id, 'business_id', sanitize_text_field( $_POST['business']['id'] ) );

							$this->send_mail( $mail, sanitize_text_field( $_POST['business']['id'] ) );
						}


					}


					//************************************************************
					//Send to server
					if ( iop_option_partner() ) {
						$host_business = '';
						if ( ! empty( $_POST['business']['id'] ) ) {
							$host_business = get_var( $_POST['business']['id'] );
						}
						$data = array(
							'employees' => $employees_host,
							'business'  => $host_business,
						);

						$api          = new Query;
						$iop_business = $api->api( 'add_employees', $data );

					}
					//************************************************************


				}
			}
		} else {
			exit;
		}

		echo json_encode( post_variables( 'business' ) );

		exit;
	}


	//Get user type
	public function is_employee() {
		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty($_POST['email'])) {
			return false;
		}

		if ( empty($_POST['business'])  ) {
			return false;
		}


		$email         = post_variables( 'email' );
		$client        = post_variables( 'client' );
		$this_business = post_variables( 'business' );

		$info = array();


		$post_id = false;


		$result_post = self::get_employee_by_meta_key( 'user_email', $email );
		if ( ! empty( $result_post ) ) {
			$post_id = $result_post[0]->ID;
		}
		$options = iop_options();
		if ( $post_id !== false ) {
		
			
			$business_id = get_post_meta( $post_id, 'business_id' );
			//owner , manager, employee
			if ( array_search( $this_business, $business_id ) !== false ) {


				$user_type = get_post_meta( $post_id, 'user_type', true );
				if ( empty( $user_type ) ) {
					$user_type = 'employee';
				}
				
				

				$info = array( 'role' => $user_type, 'id' => $post_id , 'business_type' => $options['business_type' ] );


				//**************************************************
				//Update Visit
				$id_visit = get_page_by_title( $client, 'OBJECT', 'io_plus_visitor' );


				update_post_meta( $id_visit->ID, 'employee_id', $post_id );
				update_post_meta( $post_id, 'user_client', $client );
				update_post_meta( $post_id, 'user_name', post_variables( 'name' ) );
				update_post_meta( $post_id, 'user_given_name', post_variables( 'given_name' ) );
				update_post_meta( $post_id, 'user_family_name', post_variables( 'family_name' ) );
				update_post_meta( $post_id, 'user_img', post_variables( 'img' ) );
				update_post_meta( $post_id, 'user_id', post_variables( 'user_id' ) );
				update_post_meta( $post_id, 'visit_id', $id_visit->ID );
				//**************************************************
				$time_cookie = time() + 3600 * 24 * 30;
				setcookie( 'io_plus_user_gid', post_variables( 'user_id' ), $time_cookie );
				//**************************************************


				if ( $user_type == 'employee' ) {
					//Get interview
					$employee_interview = get_post_meta( $post_id, 'interview' );
					if ( is_array( $employee_interview ) ) {
						$employee_interview = array_pop( $employee_interview );
						if ( ! empty( $employee_interview['time'] ) ) {
							if ( date( 'Y-n-d', $employee_interview['time'] ) != date( 'Y-n-d', time() ) ) {
								$info['interview'] = true;
							} else {
								$info['interview'] = true;
								//$info['interview']=false;

							}
							$info['interview'] = true;
						}


					}

				}
				//**************************************************
				//Info owner
				//**************************************************
				if ( $user_type == 'owner' ){ 

					
					//List business

					$business_list = array();
					$business = array();
					$business_sort = array();
					if (!empty($business_id)) {
						foreach ($business_id as $item) {


							$worker = array();
							$emp_users = get_posts(array(
								'post_type' => 'io_plus_employee',
								'meta_query' => array(
									array(
										'key' => 'business_id',
										'value' => $item,
										'compare' => 'LIKE'
									)
								),
							));

							if (!empty($emp_users)) {
								//Add employee
								foreach ($emp_users as $euser) {
									//$bid = get_post_meta( $euser->ID, 'business_id' );
									//if ( array_search( $item, $bid ) !== false ) {
									$worker_email = get_post_meta($euser->ID, 'user_email', true);
									$worker_name = get_post_meta($euser->ID, 'user_name', true);
									$worker_img = get_post_meta($euser->ID, 'user_img', true);
									$worker_interview = get_post_meta($euser->ID, 'interview');
									$worker_type = get_post_meta($euser->ID, 'user_type', true);
									$worker[] = array(
										'id' => $euser->ID,
										'name' => $worker_name,
										'email' => $worker_email,
										'img' => $worker_img,
										'type' => $worker_type,
										'interview' => $worker_interview
									);
									//}

								}
							}
							$business_post = get_post($item);
							if (!empty($business_post)) {
								$business_main_id = $business_post->post_parent;
								$business_main    = get_post( $business_main_id );
								if ( ! empty( $business_main ) ) {
									$business_list[ $item ] = array(
										'id'               => $item,
										'business_name'    => $business_main->post_title,
										'business_address' => $business_post->post_title,
										//'post'=>$business_post,
										'employee'         => $worker,
										'link'             => get_the_permalink( $item ),
									);
									$business_sort[ $item ] = sanitize_text_field( $business_main->post_title );
								}
							}


						}

					}

					asort( $business_sort, SORT_STRING );
					foreach ( $business_sort as $k => $v ) {
						$business[] = $business_list[ $k ];
					}
					$info['business'] = $business;
				}
				
				
				//**************************************************
				//Info manager
				//**************************************************
				if ( $user_type == 'manager' ){
					
					$users = array();

					$count_posts = wp_count_posts('io_plus_employee');
					$count = $count_posts->publish;
					$post_id = $this_business;
					$employees = get_posts(array(
						'numberposts' => $count,
						'category' => 0,
						'orderby' => 'date',
						'order' => 'DESC',
						'post_type' => 'io_plus_employee',
						'suppress_filters' => true,
					));

					foreach ($employees as $employee) {

						$employee_business = get_post_meta($employee->ID, 'business_id');
						$email = get_post_meta($employee->ID, 'user_email', true);
						$name = get_post_meta($employee->ID, 'user_name', true);
						$user_client = get_post_meta($employee->ID, 'user_client', true);
						$user_img = get_post_meta($employee->ID, 'user_img', true);
						//$visit_id=get_post_meta($employee->ID, 'visit_id', true );
						if (array_search($post_id, $employee_business) !== false) {
							$interview = get_post_meta($employee->ID, 'interview');
							//krsort($interview);
							foreach ($interview as $result) {
								if ($result['business'] != $post_id) continue;
								$users[] = array(
									'name' => $name,
									'email' => $email,
									'img' => $user_img,
									'interview' => $result['interview'],
									'date' => date('Y-m-d ', $result['time']),
									'format_date' => date('F d, Y ', $result['time']),
									'time' => date('g:i A', $result['time']),
									'unix_time' => $result['time'],
								);
								


							}


						}


					}
					
					$info['users']=$users;

					
				}

				//**************************************************
				echo json_encode( $info );
				exit;


			}


		}
		
		
		
		//**************************************************************
		//Info for Visitor
		$this_business = post_variables( 'business' );
		$satus         = '';
		$key           = "business_visit_" . $this_business;
		if ( empty( $_COOKIE[ $key ] ) ) {
			setcookie( $key, 'enter', time() + 3600 * 3 );
			$satus = 'enter';
		} else {
			setcookie( $key, '' );
			$satus = 'exit';

		}

		echo json_encode( array( 'role' => 'visitor', 'id' => 0, 'status' => $satus , 'business_type' => $options['business_type' ]  ) );
		exit;


	}

	public function add_pin_code() {

		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty( $_POST['pin'] ) ) {
			return false;
		}
		if ( is_array( $_POST['pin'] ) === false ) {
			return false;
		}
		if ( count( $_POST['pin'] ) === 0 ) {
			return false;
		}

		foreach ( $_POST['pin'] as $item ) {
			if ( empty( $item['id'] ) or empty( $item['pin'] ) ) {
				continue;
			}
			//************************************************************
			//Send to server
			$iop_post_id = get_post_meta( get_var( $item['id'] ), 'io_plus_business_id', true );
			if ( empty( $iop_post_id ) ) {
				continue;
			}
			$data = array(
				'pin' => get_var( $item['pin'] ),
				'id'  => get_var( $iop_post_id ),
			);

			$api = new Query;
			$api->api( 'pin_code', $data );

			//************************************************************


		}
		if ( ! empty( $_POST['mail'] ) and ! empty( $_POST['business'] ) ) {
			$business = get_var( $_POST['business'] );


			$this->send_mail( post_variables( 'mail' ), get_var( $business[0]['id'] ) );
		}


		echo json_encode( array( 'OK' ) );
		exit;
	}

	public function update_user( $arg, $type = 'employee' ) {
		if ( is_array( $arg ) === false ) {
			return false;
		}

		$user_id = $this->is_user( get_var( $arg['email'] ) );
		if ( $user_id === false ) {
			$title     = get_var( $arg['name'] ) . ' - ' . get_var( $arg['email'] );
			$post_type = 'io_plus_' . $type;
			$post      = array(
				'post_type'    => $post_type,
				'post_title'   => $title,
				'post_status'  => 'publish',
				'post_content' => $title,
				'post_author'  => get_current_user_id()
			);

			$user_id = wp_insert_post( $post );
		}

		update_post_meta( $user_id, 'user_id',  get_var( $arg['id'] ) );
		update_post_meta( $user_id, 'user_name', get_var( $arg['name'] ) );
		update_post_meta( $user_id, 'user_given_name',  get_var( $arg['given_name'] ) );
		update_post_meta( $user_id, 'user_family_name',   get_var( $arg['family_name'] ) );
		update_post_meta( $user_id, 'user_email', get_var( $arg['email'] ) );
		update_post_meta( $user_id, 'user_img', sanitize_text_field( get_var( $arg['img'] ) ) );
		update_post_meta( $user_id, 'user_client',  get_var( $arg['client'] ) );

		return $user_id;
	}

	public function is_user( $mail, $type = 'employee' ) {
		$count_posts = wp_count_posts( 'io_plus_employee' );
		$posts       = get_posts( array(

			'post_type'      => 'io_plus_' . $type,
			'posts_per_page' => - 1,
			'meta_query'     => array(
				array(
					'key'     => 'user_email',
					'value'   => $mail,
					'compare' => 'LIKE'
				)
			),
		) );

		foreach ( $posts as $post ) {
			$post_email = get_post_meta( $post->ID, 'user_email', true );

			if ( $post_email == $mail ) {
				return $post->ID;
				break;

			}
		}

		return false;//Not user
	}


	public function client_id() {

		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( ! isset( $_SESSION ) ) {
			session_start();
		}

		$returned = 'new';
		if ( empty( $_POST['client_id'] ) ) {
			return false;
		}
		$client_id                 = sanitize_text_field( $_POST['client_id'] );
		$_SESSION['iop_client_id'] = $client_id;

		$is_post = get_page_by_title( $client_id, 'OBJECT', 'io_plus_visitor' );
		if ( is_null( $is_post ) ) {
			$post    = array(
				'post_type'    => 'io_plus_visitor',
				'post_title'   => $client_id,
				'post_status'  => 'publish',
				'post_content' => $client_id,
				'post_author'  => get_current_user_id()
			);
			$post_id = wp_insert_post( $post );
			add_post_meta( $post_id, 'client_id', $client_id, true );

		} else {
			$post_id  = $is_post->ID;
			$returned = 'returned';
		}

		//business visit
		if ( ! empty( $_POST['business'] ) ) {


			$business = post_variables( 'business' );
			$visit    = array(
				'business' => $business,
				'time'     => time()
			);
			add_post_meta( $post_id, 'business_id', $business, false );
			add_post_meta( $post_id, 'visit', $visit, false );
		}


        $client = array();

        $client['business_returned'] = $returned;


        $user_gid = '-';
        if (!empty($_COOKIE['io_plus_user_gid'])) {
            $user_gid = $_COOKIE['io_plus_user_gid'];


        } else {
            /*$cid_users   = get_posts( array(

                'post_type'        => 'io_plus_employee',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                       'key'     => 'user_client',
                       'value'   => $client_id,
                       'compare' => 'LIKE'
                    )
                ),
            ) );
            if ( count( $cid_users ) > 0 ){
                $user_gid = get_post_meta( $cid_users[0]->ID, 'user_id', true );
            }*/
        }

		if ( ! empty( $_POST['user_gid'] ) ) {
			$user_gid = post_variables( 'user_gid' );
		}


		$emp_users = get_posts( array(

			'post_type'      => 'io_plus_employee',
			'posts_per_page' => - 1,
			'meta_query'     => array(
				array(
					'key'     => 'user_id',
					'value'   => $user_gid,
					'compare' => 'LIKE'
				)
			),
		) );


        if (count($emp_users) > 0) {

            $time_cookie = time() + 3600 * 24 * 30;
            setcookie('io_plus_user_gid', $user_gid, $time_cookie);

            foreach ($emp_users as $euser) {
                $post_user_id = get_post_meta($euser->ID, 'user_id', true);
                if ($post_user_id == $user_gid) {
                    $business_list = array();
                    $all_business = get_post_meta($euser->ID, 'business_id');
                    if (count($all_business) > 0) {
	                    foreach ( $all_business as $bs ) {

		                    $bs_post = get_post( $bs );
		                    if ( empty( $bs_post ) ) {
			                    continue;
		                    }
		                    $bs_post_main = get_post( $bs_post->post_parent );
		                    if ( empty( $bs_post_main ) ) {
			                    continue;
		                    }
		                    $name            = $bs_post_main->post_title;
		                    $address         = $bs_post->post_title;
		                    $business_list[] = array(
			                    'id'      => $bs,
			                    'link'    => get_the_permalink( $bs ),
			                    'name'    => $name,
			                    'address' => $address,
		                    );
	                    }

                    }
	                $user_client                = get_post_meta( $euser->ID, 'user_client', true );
	                $client['user_client']      = $user_client;
	                $client['user_name']        = get_post_meta( $euser->ID, 'user_name', true );
	                $client['user_given_name']  = get_post_meta( $euser->ID, 'user_given_name', true );
	                $client['user_family_name'] = get_post_meta( $euser->ID, 'user_family_name', true );
	                $client['user_img']         = get_post_meta( $euser->ID, 'user_img', true );
	                $client['user_id']          = get_post_meta( $euser->ID, 'user_id', true );
	                $client['user_email']       = get_post_meta( $euser->ID, 'user_email', true );
	                $client['user_type']        = get_post_meta( $euser->ID, 'user_type', true );
	                $client['business_list']    = $business_list;
	                break;
                }
            }

        }


		echo json_encode( $client );
		//************************************************************
		//Send to server
		$business = '';
		if ( ! empty( $_POST['business'] ) ) {
			$business = get_var( $_POST['business'] );
		}
		$data = array(
			'client_id' => $client_id,
			'business'  => $business,
		);

		$api = new Query;
		$api->api( 'client_id', $data );

		//************************************************************

		exit;

	}


	public function save_settings_business() {

		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty( $_POST['id'] ) ) {
			return false;
		}

		$post_id = get_var( $_POST['id'] );

		$iop_post_id = get_post_meta( $post_id, 'io_plus_business_id', true );

		if ( empty( $iop_post_id ) ) {
			return false;
		}

		$data = array(
			'id' => get_var( $iop_post_id ),
		);

		if ( ! empty( $_POST['occupancy'] ) ) {
			$data['occupancy'] = post_variables( 'occupancy' );
		}
		if ( ! empty( $_POST['emergency_number'] ) ) {
			$data['emergency_number'] = post_variables( 'emergency_number' );
		}
		if ( ! empty( $_POST['visitors_count'] ) ) {
			$data['visitors_count'] = post_variables( 'visitors_count' );
		}

		$api = new Query;
		$api->api( 'save_settings_business', $data );

	}

	public function get_settings_business() {

		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty( $_POST['id'] ) ) {
			return false;
		}
		$post_id = post_variables( 'id' );

		$api = new Query;

		$business_metabox = $api->get_business( $post_id );

		$result = array();
		if ( ! empty( $business_metabox ) ) {
			$result['occupancy']        = $business_metabox['occupancy'];
			$result['emergency_number'] = $business_metabox['emergency_number'];
			$result['visitors_count']   = $business_metabox['visitors_count'];
		}


		echo json_encode( $result );
		exit;
	}


	public function interview() {
		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty( $_POST['business'] ) or empty( $_POST['interview'] ) or empty( $_POST['user'] ) ) {
			return false;
		}


		$options = iop_options();

		$consumer_key      = $options['twitter_api_key'];
		$consumer_secret   = $options['twitter_api_secret'];
		$accessToken       = $options['twitter_access_token'];
		$accessTokenSecret = $options['twitter_access_token_secret'];

		$business_id = post_variables( 'business' );
		$user_id     = post_variables( 'user' );

		$interview = array();


		$result = array(
			'interview' => $_POST['interview'],
			'business'  => get_var( $business_id ),
			'time'      => time(),
			'datetime'  => date( 'Y-m-d H:i:s', time() ),
		);
		add_post_meta( $user_id, 'interview', $result, false );

		if ( array_search( 'Normal', $_POST['interview'] ) === false ) {
			$visitors = get_posts( array(
				'post_type'      => 'io_plus_visitor',
				'posts_per_page' => - 1,
				'meta_query'     => array(
					array(
						'key'     => 'business_id',
						'value'   => $business_id,
						'compare' => 'LIKE'
					)
				),
			) );
			$infected = array();
			$time     = time() - ( 3600 * 24 * 14 ); // 14 days ago
			if ( ! empty( $visitors ) ) {
				foreach ( $visitors as $visitor ) {
					$user_email     = get_post_meta( $visitor->ID, 'user_email', true );
					$visit_list     = get_post_meta( $visitor->ID, 'visit' );
					$employee_id    = get_post_meta( $visitor->ID, 'employee_id', true );
					$tw_id          = get_post_meta( $visitor->ID, 'tw_id', true );
					$tw_name        = get_post_meta( $visitor->ID, 'tw_name', true );
					$employee_email = '';
					if ( ! empty( $employee_id ) ) {
						$employee_email = get_post_meta( $employee_id, 'user_email', true );
					}
					$infected_positive = false;
					foreach ( $visit_list as $val ) {
						if ( $val['business'] != $business_id ) {
							continue;
						}
						if ( $val['time'] > $time ) {
							$infected_positive = true;
							break;
						}
					}


					$infected[] = array(
						'vid'                => $visitor->ID,
						'visitor_user_email' => $user_email,
						'employee_id'        => $employee_id,
						'employee_email'     => $employee_email,
						'infected_positive'  => $infected_positive,
						'tw_id'              => $tw_id,
						'tw_name'            => $tw_name,
					);

					if ( ! empty( $tw_id ) and ! empty( $consumer_key ) and ! empty( $consumer_secret ) and ! empty( $accessToken ) and ! empty( $accessTokenSecret ) ) {


						$oauth = new \Abraham\TwitterOAuth\TwitterOAuth( $consumer_key, $consumer_secret, $accessToken, $accessTokenSecret );

						$send_str   = 'You had contact with Covid two weeks ago.';
						$parameters = array(
							'event' => array(
								'type'           => 'message_create',
								'message_create' => array(
									'target'       => array(
										"recipient_id" => $tw_id,

									),
									'message_data' => array(
										'text' => $send_str
									),
								),
							),
						);


						$method = 'direct_messages/events/new';

						$re = $oauth->post( $method, $parameters, true );
						//print_r($re);
					}
				}


			}
			//print_r($infected);
		}

		//************************************************************
		//Send to server
		if ( iop_option_partner() ) {
			$data = array(
				'user'      => post_variables( 'user' ),
				'business'  => post_variables( 'business' ),
				'interview' => post_variables( 'interview' )

			);

			$api          = new Query;
			$iop_business = $api->api( 'interview', $data );

		}
		//************************************************************

		echo 'ok';
		exit;
	}


	public function get_employee() {
		check_ajax_referer( 'iop-ajax-nonce', 'nonce' );//verify nonce code

		if ( empty( $_POST['id'] ) ) {
			return false;
		}
		$info_user = array();
		$post_id   = post_variables( 'id' );
		/*$employee=get_post($post_id);
		if(!empty($employee)){
			$info_user['post']=$employee;

		}*/
		$info_user['id']               = $post_id;
		$info_user['user_name']        = get_post_meta( $post_id, 'user_name', true );
		$info_user['user_id']          = get_post_meta( $post_id, 'user_id', true );
		$info_user['user_given_name']  = get_post_meta( $post_id, 'user_given_name', true );
		$info_user['user_family_name'] = get_post_meta( $post_id, 'user_family_name', true );
		$info_user['user_email']       = get_post_meta( $post_id, 'user_email', true );
		$info_user['user_img']         = get_post_meta( $post_id, 'user_img', true );
		$info_user['user_client']      = get_post_meta( $post_id, 'user_client', true );


		$interview = get_post_meta( $post_id, 'interview' );
		if ( ! empty( $_POST['business'] ) ) {
			$business_id = post_variables( 'business' );
			if ( count( $interview ) > 0 ) {
				$interview_new = array();
				foreach ( $interview as $key => $item ) {
					if ( $business_id == $item['business'] ) {
						$interview_new[] = $item;
					}
				}
				$interview = $interview_new;
			}

		}

		$info_user['interview'] = $interview;

		echo json_encode( $info_user );
		exit;
	}

	public function send_mail( $to, $business_id ) {

		$business_info = self::business_info( $business_id );

		if ( empty( $business_info ) ) {
			return false;
		}
		$business_users = self::business_users( $business_id );
		if ( empty( $business_users ) ) {
			return false;
		}
		$user_name = '';

		foreach ( $business_users as $user ) {
			if ( $user['user_type'] == 'owner' ) {
				$user_name = $user['user_name'];
				break;
			}
		}
		$business_link_text = $business_info['link'];
		if ( strlen( $business_link_text ) > 22 ) {
			$business_link_text = mb_substr( $business_link_text, 0, 22 );
		}


		$location  = $business_info['business_name'];
		$address   = $business_info['business_address'];
		$post_link = $business_info['link'];

		$api = new Query;

		$business_metabox = $api->get_business( $business_id );
		if ( empty( $business_metabox ) ) {
			$business_metabox = array();
		}
		$phone   = get_var( $business_metabox['phone'] );
		$website = get_var( $business_metabox['website'] );


		$image_mail       = IO_PLUS_URL . "assets/img/email_img.jpg";
		$image_logo       = IO_PLUS_URL . "assets/img/email_logo.png";
		$image_logo_white = IO_PLUS_URL . "assets/img/email_logo_white.png";

		//include(IO_PLUS_PATH . "lib/phpqrcode/qrlib.php");
		//include(IO_PLUS_PATH . "lib/fpdf/fpdf.php");

		$p_location  = $location;
		$p_post_link = $post_link;

		$p_location  = iconv( 'utf-8', 'windows-1251', $location );
		$p_post_link = iconv( 'utf-8', 'windows-1251', $post_link );

		$qr_name       = time() . '.png';
		$filename      = get_temp_dir() . $qr_name;
		$cid_qr        = 'cid:' . $qr_name;
		$filename_logo = IO_PLUS_PATH . 'assets/img/mail_logo.png';
		$filename_pdf  = get_temp_dir() . time() . '.pdf';

		( new QRCode )->render( $post_link, $filename, "L", 4, 4 );


		$textColour = array( 0, 0, 0 );
		$logoXPos   = 50;
		$logoYPos   = 108;
		$logoWidth  = 110;
		//define('FPDF_FONTPATH',IO_PLUS_PATH."lib/fpdf/font/");
		$pdf = new Fpdf\Fpdf( 'P', 'mm', 'A4' );

		$pdf->AddFont( 'ArialMT', '', "arial.php" );
		$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
		$pdf->AddPage();


		$pdf->SetFont( 'ArialMT', '', 24 );

		$pdf->Cell( 0, 15, $p_location, 0, 0, 'C' );


		$pdf->Image( $filename, $logoXPos, 30, $logoWidth );
		$pdf->Image( $filename_logo, 95, 150, 20 );
		$pdf->Ln( 160 );
		$pdf->SetFont( 'ArialMT', '', 18 );
		$pdf->Cell( 0, 25, 'IOPLUS.ORG', 0, 0, 'C' );


		$pdf->Output( $filename_pdf, "F" );

		$subject   = 'IO Plus - ' . $location;
		$file_path = IO_PLUS_PATH . 'templates/email/email.php';
		ob_start();
		include( $file_path );
		$message = ob_get_clean();


		$file = '/path/to/file.jpg'; //phpmailer will load this file
		$uid  = 'image-qr-code'; //will map it to this UID
		$name = basename( $filename ); //this will be the file name for the attachment

		global $phpmailer;

		if ( ! empty( $phpmailer ) ) {
			add_action( 'phpmailer_init', function ( &$phpmailer ) use ( $filename, $uid, $name ) {
				$phpmailer->SMTPKeepAlive = true;
				$phpmailer->AddEmbeddedImage( $filename, $uid, $name );
			} );
		}


		$headers = array(
			'from:COVID Notification Alert System',
			'Content-type: text/html; charset=utf-8'
		);
		wp_mail( $to, $subject, $message, $headers, array( $filename_pdf ) );

		unlink( $filename );
		unlink( $filename_pdf );

	}


    public static function get_employee_by_meta_key($meta_key, $meta_value)
    {
        $post = get_posts(array(
            'post_type' => 'io_plus_employee',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => $meta_key,
                    'value' => $meta_value,
                    'compare' => 'LIKE'
                )
            ),
        ));
        if (!empty($post)) {
            return $post;
        } else {
            return false;
        }

    }

    public function business_info($id)
    {
        $business_post = get_post($id);
        if (empty($business_post)) return false;
        $business_main_id = $business_post->post_parent;
        $business_main = get_post($business_main_id);
        if (empty($business_main)) return false;

        $info = array();
        $info['id'] = $id;
        $info['business_name'] = $business_main->post_title;
        $info['business_address'] = $business_post->post_title;
        $info['link'] = get_the_permalink($id);
        return $info;

    }

    public function business_users($id)
    {
        $users = array();
        $emp_users = get_posts(array(
            'post_type' => 'io_plus_employee',
            'meta_query' => array(
                array(
                    'key' => 'business_id',
                    'value' => $id,
                    'compare' => 'LIKE'
                )
            ),
        ));
        if (!empty($emp_users)) {
            foreach ($emp_users as $euser) {
                $users[] = array(
                    'user_email' => get_post_meta($euser->ID, 'user_email', true),
                    'user_name' => get_post_meta($euser->ID, 'user_name', true),
                    'user_given_name' => get_post_meta($euser->ID, 'user_given_name', true),
                    'user_family_name' => get_post_meta($euser->ID, 'user_family_name', true),
                    'user_type' => get_post_meta($euser->ID, 'user_type', true),
                    'user_img' => get_post_meta($euser->ID, 'user_img', true),
                    'user_id' => get_post_meta($euser->ID, 'user_id', true),
                    'user_client' => get_post_meta($euser->ID, 'user_client', true),
                    'interview' => get_post_meta($euser->ID, 'interview', true),
                );
            }

        }
        return $users;

    }


    public static function get_post_id_by_meta_key_and_value($meta_key, $meta_value)
    {
        global $wpdb;


        $post_id = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %s",
                $meta_key,
                $meta_value
            )
        );


        if (!empty($post_id)) {
            return $post_id;
        } else {
            return false;
        }
    }


	public static function logout(){
		setcookie('io_plus_user_gid', '', time());
		exit;
	}


}












