jQuery(function ($) {

    let client = new ClientJS();

    let _user = {
        'id': '',
        'name': '',
        'given_name': '',
        'family_name': '',
        'email': '',
        'img': '',
        'client': '',
        'user_type': '',
        'business_list': [],
    };

    let business_select_id = [];
    let business_select = [];
    let business_select_number = 0;
    let _user_post_id = 0;
    let g_ViewStart = true;
    let g_login = false;
    let g_owner_business = {};
    let g_owner_business_selected = 0;
    let g_info_employee = 0;
    let g_load_info = false;
	let all_employee_datetime = '';
	let g_click_utime = 0;
	


    _user.client = client.getFingerprint(); // Calculate Device/Browser Fingerprint

    iop_init_scroll();

    function iop_next(_activate) {
		
		if(iop_click_locked()) return false;
		
        $('html, body').scrollTop(0);
        let _active = $('.io-plus .iop-view.active');
        _active.removeClass('active');
        _active.addClass('prev');
        if (!_activate) {
            _active.next().addClass('active');//Next View
        } else {//Activate is tamplate
            $('.io-plus .io-plus-' + _activate + ' .iop-view:eq(0)').addClass('active');

        }
        iop_init_scroll();
        iop_bottom_menu();

    }

    function iop_next_name(_view) {
		if(iop_click_locked()) return false;
		
        $('html, body').scrollTop(0);
        let _active = $('.io-plus .iop-view.active');
        _active.removeClass('active');
        _active.addClass('prev');
        $('.io-plus .' + _view + '.iop-view').addClass('active');
        iop_init_scroll();
        iop_bottom_menu();

    }

    function iop_prev(view = '') {
        $('html, body').scrollTop(0);
        $('.io-plus .iop-view.active').removeClass('active');
        let _prev;
        if (view !== '') {
            _prev = $('.io-plus .' + view + '.prev');
        } else {

            let _count = $('.io-plus .iop-view.prev').length;
            _count--;
            _prev = $('.io-plus .iop-view.prev:eq(' + _count + ')');
        }

        _prev.removeClass('prev');
        _prev.addClass('active');

        iop_init_scroll();
        iop_bottom_menu();

    }

    function iop_next_pos_start(_class) {
        setTimeout(function () {
            $('.io-plus .' + _class).addClass('pos-start')
                .removeClass('prev')
                .removeClass('pos-start');

            iop_bottom_menu();
        }, 500);
    }
	

	function iop_click_locked(){
		let unix_time = Math.floor(Date.now() / 1000);
		if(unix_time < g_click_utime +2){
			
			return true;
		}else{
			g_click_utime=unix_time;
			
			return false;
		}
	}


    function iop_bottom_menu() {
        let _calss = $('.io-plus .iop-view.active');
        if (_calss.hasClass('owner-main') || _calss.hasClass('view-owner-surveys') || _calss.hasClass('view-owner-check-ins')) {
            $('.io-plus  .iop-bottom-menu').show();
        } else {
            $('.io-plus  .iop-bottom-menu').hide();
        }

    }


    function iop_init_scroll() {

        Scrollbar.use(OverscrollPlugin);
        Scrollbar.init($('.iop-view.active').get(0), {
            damping: 0.05,
            renderByPixel: true,
            continuousScrolling: true,
        });


    }

    function def_img(_url) {
        if (_url === '') {
            _url = io_plus_object.plagin_url + '/assets/img/not_avatar.jpg';
        } else {
            _url = _url.replace('=s96', '=s500');
        }
        return _url;
    }

    function iop_get_mask(_name) {
        let mask = $('.io-plus-mask .' + _name).html();
        return mask;
    }


    function iop_badge_label(_value) {
		
        _value = _value.toLowerCase();
        if (_value == 'visit') _value = 'visitor';
        _value = iop_text(_value);
        return _value;
    }

    function iop_badge_class(_value) {
		 _value = _value.toLowerCase();
        if (_value == 'fever') _value = 'nau-fever';
        if (_value == 'family_positive') _value = 'nau-positive';
        if (_value == 'visit') _value = 'nau-visitor';
        if (_value == 'normal') _value = 'nau-normal';

        return _value;
    }

    function iop_text(_key) {
        return $('.io-plus-text .' + _key).html();
    }

    function iop_replace(_search, _replace, _string) {
        return _string.replace(new RegExp(_search, "g"), _replace);
    }

    //Clear text
    function iop_ctxt(_string) {
        _string = _string.replace(/\\/g, '');
        return _string;
    }


    // date time in text format
    function calcDateText(_datetime) {
        let date1 = new Date();
        let date2 = new Date(_datetime);
        let diff = Math.floor(date1.getTime() - date2.getTime());
        let day = 1000 * 60 * 60 * 24;

        let days = Math.floor(diff / day);
        let months = Math.floor(days / 30);
        let years = Math.floor(months / 12);

        let message = iop_text('Today');

        let res = {
            'days': days,
            'months': months,
            'years': years,
        };

        if (days < 1){
			if(date1.getDate()!=date2.getDate())message = iop_text('Yesterday');
		}
        if (days === 1) message = iop_text('Yesterday');
        if (days > 1) message = days + ' ' + iop_text('DaysAgo');
        if (months === 1) message = iop_text('1MonthAgo');
        if (months > 1) message = months + ' ' + iop_text('MonthsAgo');
        if (years === 1) message = iop_text('1YearAgo');
        if (years > 1) message = years + ' ' + iop_text('YearsAgo');


        return message;
    }


    function iop_fdate(_date) {
        let y = _date.getFullYear();
        let m = _date.getMonth();
        let d = _date.getDate();
        m++;
        if (m < 10) m = '0' + m;
        if (d < 10) d = '0' + d;
        let format = y + '-' + m + '-' + d;
        return format;
    }

    function iop_ftime(_date) {
        let h = _date.getHours();
        let m = _date.getMinutes();
        h++;

        let format = h + ':' + m;
        return format;
    }


    $('.io-plus .js-prev-view').click(function () {
        iop_prev('');
    });


    //Start load info for user
    let _data = {
        'nonce'    : io_plus_object.nonce,
        'action'   : 'oi_plus_client_id',
        'client_id': _user.client,
        'business' : _post_business,
    };

    $.ajax({
        url     : io_plus_object.ajaxurl,
        type    : 'POST',
        dataType: 'json',
        data    : _data,
        success : function (res) {
            console.log(res);
            g_load_info = true;
            if (res.user_name) {
                g_login = true;
                _user.id = res.user_id;
                _user.name = res.user_name;
                _user.given_name = res.user_given_name;
                _user.family_name = res.user_family_name;
                _user.img = res.user_img;
                _user.email = res.user_email;
                _user.user_type = res.user_type;
                _user.business_list = res.business_list;


                if (_user.business_list.length > 0) {
                    $('.io-plus .view-search-locations .list_owner_business .list').html('');
                    $('.io-plus .view-search-locations .list_owner_business').show();
                    let htm = '';
                    for (i in _user.business_list) {
                        htm = '<a href="' + _user.business_list[i].link + '" class="row-bs">' + _user.business_list[i].name + '</a>';
                        $('.io-plus .view-search-locations .list_owner_business .list').append(htm);
                    }
                }else{
					$('.io-plus .view-search-locations .not_business span').html(_user.email);
					$('.io-plus .view-search-locations .not_business').show();
					//$('.io-plus .view-search-locations .list_owner_business .list').html('No locations associated with '+_user.email);
				}

                if ($('.iop-view').hasClass('view-start-business')) {
                    is_employee();

                }


                $('.io-plus .js-welcome-user-name').html(res.user_name);
            } else {
				$('.io-plus .view-search-locations .not_business span').html(_user.email);
				$('.io-plus .view-search-locations .not_business').show();

            }

			renderButton();

        },
        error: function (e, v) {

            console.log(e.responseText);
            console.log(v);
            console.log(e);
        }
    });


    $('.io-plus .but-google-signin').click(function () {
        $('.io-plus .abcRioButtonContentWrapper').click();
    });


    function onSuccess(googleUser) {
        console.log(googleUser);
		if(g_login)return false;
        _user.id = googleUser.getBasicProfile().getId();
        _user.name = googleUser.getBasicProfile().getName();
        _user.given_name = googleUser.getBasicProfile().getGivenName();
        _user.family_name = googleUser.getBasicProfile().getFamilyName();
        _user.img = googleUser.getBasicProfile().getImageUrl();
        _user.email = googleUser.getBasicProfile().getEmail();
		if (_user.business_list.length == 0){
			$('.io-plus .view-search-locations .not_business span').html(_user.email);
			$('.io-plus .view-search-locations .not_business').show();
		}
        $('.io-plus .js-welcome-user-name').html(_user.name);

        g_login = true;


        let _data = {
            'nonce'    : io_plus_object.nonce,
            'action'   : 'oi_plus_client_id',
            'client_id': _user.client,
            'business' : _post_business,
            'user_gid' : _user.id,
        };
        console.log(_data);

        $.ajax({
            url: io_plus_object.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: _data,
            success: function (res) {
                console.log(res);
                g_load_info = true;
                if (res.user_name) {
                    g_login = true;
                    _user.id = res.user_id;
                    _user.name = res.user_name;
                    _user.given_name = res.user_given_name;
                    _user.family_name = res.user_family_name;
                    _user.img = res.user_img;
                    _user.email = res.user_email;
                    _user.user_type = res.user_type;
                    _user.business_list = res.business_list;


                    if (_user.business_list.length > 0) {
                        $('.io-plus .view-search-locations .list_owner_business .list').html('');
                        $('.io-plus .view-search-locations .list_owner_business').show();
                        let htm = '';
                        for (i in _user.business_list) {
                            htm = '<a href="' + _user.business_list[i].link + '" class="row-bs">' + _user.business_list[i].name + '</a>';
                            $('.io-plus .view-search-locations .list_owner_business .list').append(htm);
                        }
                    }


                    $('.io-plus .js-welcome-user-name').html(res.user_name);
                    onSuccess_next();
                } else {
                    onSuccess_next();
                }

            },
            error: function (e, v) {

                console.log(e.responseText);
                console.log(v);
                console.log(e);
            }
        });


    }

    function onSuccess_next() {
        if ($('.iop-view').hasClass('view-start-business')) {
            is_employee();

        } else {
            if (g_ViewStart == false) {
                iop_next();
            }
        }
    }

    function onFailure(error) {

        for (k in error) {
            //alert(error[k]);
        }

        console.log(error);
    }


    function is_employee() {
        let _data = {
			'nonce': io_plus_object.nonce,
            'action': 'oi_plus_is_employee',
            'business': _post_business,
            'email': _user.email,
            'client': _user.client,
            'name': _user.name,
            'given_name': _user.given_name,
            'family_name': _user.family_name,
            'user_id': _user.id,
            'img': _user.img,
        };
		console.log(_data);
        $.ajax({
            url: io_plus_object.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: _data,
            success: function (res) {
                console.log(res);
				



                    if (res.role === 'owner') {

						let employee_state_count=[];

                        let js_date = new Date();
                        let _hours = js_date.getHours();
                        let _greeting_text = 'Good Day';
                        if (_hours < 6) _greeting_text = 'Good Afternoon';
                        if (_hours > 6 && _hours < 12) _greeting_text = 'Good Morning';
                        if (_hours > 17) _greeting_text = 'Good Evening';

                        $('.io-plus  .js-greeting-text').text(_greeting_text);

                        $('.io-plus .photo-owner').html('<img src="' + _user.img + '">');
                        $('.io-plus .photo-name').html(_user.name);

                        var l_ue = [];

                        if (res.business.length > 0) {
                            g_owner_business = res.business;

                            let _opt_select = '';
                            let _activ_id = 0;

                            for (j in res.business) {
                                _opt_select = '';
                                if (res.business[j].id == _post_business || res.business[j].id == _post_business_main) {
                                    _activ_id = res.business[j].id;
                                    _opt_select = ' selected="selected" ';
                                    let _opt = '<option value="' + res.business[j].id + '" ' + _opt_select + ' >' + res.business[j].business_name + '</option>';
                                    $('.io-plus-owner .nau-custom-select.owner-business-list select').append(_opt);
                                }
                            }
                            for (j in res.business) {

                                _opt_select = '';

								let business_id=res.business[j].id;

								employee_state_count[business_id]={
									'fever':0,
									'family_positive':0,
									'visit':0,
									'normal':0
								};


                                let _opt = '<option value="' + res.business[j].id + '"  >' + res.business[j].business_name + '</option>';
                                $('.io-plus-owner .nau-custom-select select').append(_opt);


                                if (res.business[j].employee) {
                                    let emp = res.business[j].employee;
                                    for (e in emp) {

                                        let employee_id = emp[e].id;
                                        let employee_name = emp[e].name;
                                        let employee_email = emp[e].email;
                                        let employee_img = def_img(emp[e].img);
										let employee_type = def_img(emp[e].type);
                                        if (employee_name.length == 0) employee_name = emp[e].email;
                                        let _state = 'Normal';
                                        let _state_val = 'normal';
                                        let _datetime = false;

                                        if (emp[e].interview) {
                                            if (emp[e].interview.length > 0) {
                                                let itrv_last = emp[e].interview.length - 1;
                                                _datetime = emp[e].interview[itrv_last].datetime;
                                                _state_val = emp[e].interview[itrv_last].interview[0];
												if(_state_val==undefined){
													_state_val='normal';
												}
                                                _state = iop_badge_label(_state_val);
                                            }
											for (ei in emp[e].interview){
												
												let _dt_int=emp[e].interview[ei].datetime;
												let new_date = new Date(_dt_int);
												all_employee_datetime += '['+business_id+'-' + new_date.getFullYear() + '-' + new_date.getMonth() + '-' + new_date.getDate() + ']';
												//Viev view-owner-surveys check
												
												let htm_cl = '';
												let htm_sr = '';
												let check_datetime = new Date(_dt_int);
	
												htm_cl = iop_get_mask('view-check-row');

	

												htm_cl = iop_replace('#name#', employee_name, htm_cl);
												htm_cl = iop_replace('#photo#', employee_img, htm_cl);


												let fdate = iop_fdate(check_datetime);

												htm_cl = iop_replace('#time#', iop_ftime(check_datetime), htm_cl);

												htm_cl = iop_replace('#date#', fdate, htm_cl);
												htm_cl = iop_replace('#location-id#', res.business[j].id, htm_cl);

												$('.io-plus-owner .view-owner-check-ins .list-check-ins').append(htm_cl);
											}
											
											
											if (_datetime) {
												let _html = '';
												_html += '<li class="nau-check-list-item bsis-' + res.business[j].id + ' status-' + _state_val.toLowerCase() + '">';
												_html += '<div class="nau-left">';
												_html += '<div class="nau-avatar"><img src="' + employee_img + '" alt="employee"></div>';
												_html += '<div class="nau-name">' + employee_name + '</div>';
												_html += '<div class="nau-badge nau-badge-sm ' + iop_badge_class(_state_val) + '">' + _state + '</div>';
												_html += '</div>';
												_html += '<div class="nau-right">' + calcDateText(_datetime) + '</div>';
												_html += '</li>';
												$('.io-plus-owner .nau-check-list').append(_html);
												
												//Viev view-owner-surveys
		
												let htm_cl = '';
												let htm_sr = '';
												let check_datetime = new Date(_datetime);
												htm_sr = iop_get_mask('view-surveys-row');
	

												htm_sr = iop_replace('#name#', employee_name, htm_sr);
												htm_sr = iop_replace('#email#', employee_email, htm_sr);
												htm_sr = iop_replace('#time#', iop_ftime(check_datetime), htm_sr);
												htm_sr = iop_replace('#location-id#', res.business[j].id, htm_sr);
												htm_sr = iop_replace('#user-id#', employee_id, htm_sr);



											




												$('.io-plus-owner .view-owner-surveys .list-surveys .js-' + _state_val).append(htm_sr);
								

											}
											
                                        }

                                        employee_state_count[business_id][_state_val]++;

                                        
                                        //if(l_ue.indexOf(employee_id)==-1){
                                        //l_ue.push(employee_id);
                                        let _html_swiper = '';
                                        _html_swiper += '<div class="swiper-slide js-view_info-employee bsis-' + res.business[j].id + '" data="' + employee_id + '">';
                                        _html_swiper += '<a href="#." class="nau-employee-card">';
                                        _html_swiper += '<div class="nau-employee-photo-frame">';
                                        _html_swiper += '<img src="' + employee_img + '" alt="employee">';
                                        _html_swiper += '</div>';
                                        _html_swiper += '<div class="nau-card-bottom">';
                                        _html_swiper += '<div class="nau-name">' + employee_name + '</div>';
                                        _html_swiper += '<div class="nau-sales">'+employee_type+'</div>';
                                        _html_swiper += '</div>';
                                        _html_swiper += '</a>';
                                        _html_swiper += '</div>';
                                        $('.io-plus-owner .nau-employee-slider .swiper-wrapper').append(_html_swiper);
                                        //}

                                        

                                    }
                                    g_owner_business_selected = res.business[j].id;


                                }


                                //QR code
                                $('.io-plus .io-plus-owner .list-qrcode').append('<div id="qrcode_' + res.business[j].id + '" class="qrcode-center "></div>');
                                $('.io-plus #qrcode_' + res.business[j].id).qrcode({
                                    text: res.business[j].link,
                                    width: 200,
                                    height: 200
                                });

                                //***********************

                                if (_activ_id > 0) {

                                    $('.io-plus-owner .nau-check-list .nau-check-list-item').hide();
                                    $('.io-plus-owner .nau-check-list .nau-check-list-item.bsis-' + _activ_id).show();
                                    $('.io-plus-owner .nau-employee-slider .swiper-slide').hide();
                                    $('.io-plus-owner .nau-employee-slider .swiper-slide.bsis-' + _activ_id).show();
                                    g_owner_business_selected = _activ_id;

                                }


                            }


                            $('.nau-number-card-slider .js-fever').html(employee_state_count[g_owner_business_selected].fever);
                            $('.nau-number-card-slider .js-positive').html(employee_state_count[g_owner_business_selected].family_positive);
                            $('.nau-number-card-slider .js-visitor').html(employee_state_count[g_owner_business_selected].visit);


                            $('.io-plus .io-plus-owner .list-qrcode div').hide();
                            $('.io-plus .io-plus-owner .list-qrcode #qrcode_' + _activ_id).show();



                            var swiper;
                            $('.io-plus-owner .owner-business-list .nau-select-items').click(function () {
                                let _val = $('.io-plus-owner .nau-custom-select.owner-business-list select option:selected').val();
                                g_owner_business_selected = _val;
                                $('.io-plus-owner .nau-check-list .nau-check-list-item').hide();
                                $('.io-plus-owner .nau-check-list .nau-check-list-item.bsis-' + _val).show();

                                $('.io-plus-owner .nau-employee-slider .swiper-slide').hide();
                                $('.io-plus-owner .nau-employee-slider .swiper-slide.bsis-' + _val).show();

                                $('.io-plus .io-plus-owner .list-qrcode div').hide();
                                $('.io-plus .io-plus-owner .list-qrcode #qrcode_' + _val).show();

                                swiper = new Swiper('.nau-employee-slider', {
                                    slidesPerView: 3,
                                    spaceBetween : 15,
                                    breakpoints  : {
                                        768: {
                                            slidesPerView: 2,
                                        },
                                    },
                                });

                                $('.nau-number-card-slider .js-fever').html(employee_state_count[g_owner_business_selected].fever);
                                $('.nau-number-card-slider .js-positive').html(employee_state_count[g_owner_business_selected].family_positive);
                                $('.nau-number-card-slider .js-visitor').html(employee_state_count[g_owner_business_selected].visit);

                            });


                            swiper = new Swiper('.nau-employee-slider', {
                                slidesPerView: 3,
                                spaceBetween: 15,
                                breakpoints: {
                                    768: {
                                        slidesPerView: 2,
                                    },
                                },
                            });


                            $('.io-plus .js-view_info-employee').click(function () {
                                let _data = $(this).attr('data');
                                view_info_employee(_data);
                            });


                        } else {
                            $('.business-no-data').show();
                        }


                        $('.nau-accordion-list .nau-accordion-link').click(function () {
                            let _this = $(this).closest(".nau-accordion-list");
                            if (!$(_this).hasClass('nau-accordion-list')) return false;
                            if ($(_this).hasClass('nau-open')) {
                                $(_this).removeClass('nau-open');
                                $(_this).find('.nau-acordion-content').slideUp("slow");
                            } else {
                                $(_this).addClass('nau-open');
                                $(_this).find('.nau-acordion-content').slideDown("slow");
                            }

                        });

                        owner_save_setting();


                    }
                    _user_post_id = res.id;
					
					
					
					if (res.role === 'manager'){
						
						if(res.users.length>0){
							
							let msk_users=iop_get_mask('manager-list-users');

							
							for( j in res.users){
								for( i in res.users[j].interview){
									let _h=msk_users;
									let _status=res.users[j].interview[i];
									let jclass=iop_badge_class(_status);
									_h = iop_replace('#name#', res.users[j].name, _h);
									_h = iop_replace('#email#', res.users[j].email, _h);
									_h = iop_replace('#format_date#', res.users[j].format_date, _h);
									_h = iop_replace('#time#', res.users[j].time, _h);
									_h = iop_replace('#date#', res.users[j].date, _h);
									_h = iop_replace('#class#', jclass, _h);
									
									$('.view-manager .jtb-'+_status).append(_h);
									
								}
								

							}
						}
						

						
						
						
						
					}
					
					
					let view_role=res.role;
					
					if (res.role === 'visitor'){
						view_role=res.role+'-'+res.business_type;
					}
					
					
                    //var example = flatpickr('#flatpickr');

                    $('#flatpickr').flatpickr({
                        onChange: function (selectedDates, dateStr, instance) {

                            let _fDate = $('.io-plus .js-input-filter-date').val();

                            if (_fDate != undefined) {

                                $('.io-plus .nau-report-card').hide();
                                $('.io-plus .nau-report-card.' + _fDate).show();
                            }

                        },
                        onReady: function (selectedDates, dateStr, instance) {

                            let _fDate = $('.io-plus .js-input-filter-date').val();

                            if (_fDate != undefined) {

                                $('.io-plus .nau-report-card').hide();
                                $('.io-plus .nau-report-card.' + _fDate).show();
                            }

                        }
                    });





				console.log(view_role);
				custom_init();
				iop_next(view_role);


            },
            error: function (e, v) {

                console.log(e.responseText);
                console.log(v);
                console.log(e);
            }
        });
    }


    function renderButton() {
        gapi.signin2.render('google-button-signin', {
            'scope': 'profile email',
            'width': 240,
            'height': 40,
            'longtitle': false,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    };


    let $input = $('#search_business');

    let autocomplete = new google.maps.places.Autocomplete($input.get(0), {
        types: ['address'],
    });

    autocomplete.addListener('place_changed', function () {

        let place = autocomplete.getPlace();

        if (!place.geometry) {
            iop_search(place.name);
        } else {
            iop_search_place_id(place.place_id, true);
        }
    });

    let $input_ebm = $('#search_business_establishment');

    let autocomplete_ebm = new google.maps.places.Autocomplete($input_ebm.get(0), {
        types: ['establishment'],
    });

    autocomplete_ebm.addListener('place_changed', function () {

        let place = autocomplete_ebm.getPlace();

        if (!place.geometry) {
            iop_search(place.name);
        } else {
            iop_search_place_id(place.place_id, true);
        }
    });


    $input.on('input', function () {
        if ($(this).val() != '') {
            $('#search_business_establishment').attr('readonly', true);
            $('#search_business_establishment').addClass('input-readonly');
        } else {
            $('#search_business_establishment').attr('readonly', false);
            $('#search_business_establishment').removeClass('input-readonly');
        }
    });
    $input_ebm.on('input', function () {
        if ($(this).val() != '') {
            $('#search_business').attr('readonly', true);
            $('#search_business').addClass('input-readonly');
        } else {
            $('#search_business').attr('readonly', false);
            $('#search_business').removeClass('input-readonly');
        }
    });


    $('.io-plus .view-search-locations .icon-search-address').click(function () {


        $('.io-plus .locations-list').html('');

        setTimeout(function () {
            let _val = $('.io-plus .input-search-business').val();
            iop_search(_val);

        }, 500);


    });

    $('.io-plus .view-search-locations .icon-search-establishment').click(function () {


        $('.io-plus .locations-list').html('');

        setTimeout(function () {
            let _val = $('.io-plus .input-search-business-establishment').val();
            iop_search(_val, 'establishment');

        }, 500);


    });


    function iop_search_place_id(place_id, only_one) {
        $('.io-plus .locations-list').html('');
        var request = {
            placeId: place_id,
            fields: ['all'],
        };

        var service = new google.maps.places.PlacesService(document.createElement('div'));

        service.getDetails(request, function (locations, status) {

            if (status === google.maps.places.PlacesServiceStatus.OK) {

                $('.io-plus .search-business .datalist-autocomplete').html('');


                let _html = '';
                _html += '<div class="nau-loc-item row-loc">';
                _html += '<div class="nau-loc-name loc-name">' + locations.name + '</div>';
                let rating = 0;
                if (locations.rating != undefined) rating = locations.rating;
                if (rating > 0) {
                    let star = Math.round(rating);
                    _html += '<div class="nau-loc-rating loc-rating">';
                    _html += '<span class="nau-number">' + rating + '</span>';
                    _html += '<span class="nau-stars">';
                    for (i = 0; i < star; i++) {
                        _html += '<i>★</i>';
                    }

                    _html += '</span>';
                    _html += '</div>';
                } else {
                }
                _html += '<div class="nau-loc-address loc-address">' + locations.formatted_address + '</div>';
                //_html += '<div class="loc-place_id">' + locations[0].place_id + '</div>';
				_html += '<div style="display: none;">';
				var _phone='';
				var website='';
				if(locations.formatted_phone_number!=undefined )_phone=locations.formatted_phone_number ;
				if(locations.international_phone_number!=undefined  &&  _phone=='')_phone=international_phone_number.formatted_phone_number ;

				if(locations.website)website=locations.website;
				_html += '<div class="phone">' + _phone + '</div>';
				_html += '<div class="website">' + website + '</div>';

                _html += '</div>';

                _html += '</div>';
                $('.io-plus .locations-list').append(_html);
                //iop_init_scroll();

                //iop_init_scroll();

                /*let _height = $('.io-plus .locations-list').outerHeight(true);


                _height += 1700;
                    $('.io-plus').height(_height);*/


            }
        });


        if (only_one) {
            iop_next();
        }

    }

    function iop_search(_val, type) {
        $('.io-plus .locations-list').html('');
        if (type == undefined) type = 'address';

        const service = new google.maps.places.AutocompleteService();

        service.getPlacePredictions(
            {input: _val, types: [type]},
            function (locations, status) {

                if (status === google.maps.places.PlacesServiceStatus.OK) {

                    $('.io-plus .search-business .datalist-autocomplete').html('');

                    let j = 0;

                    for (_loc in locations) {
                        iop_search_place_id(locations[_loc].place_id);
                    }

                    $('.io-plus .locations-list .row-loc').click(function () {
                        if ($(this).hasClass('nau-selected')) {
                            $(this).removeClass('nau-selected');
                        } else {
                            $(this).addClass('nau-selected');
                        }
                    });

                }

            }
        );

        iop_next();


    }


    function iop_create_location_view() {
        $('.select-locations').removeClass('nau-loading');
        $('.io-plus .iop-gen-view').detach();

        let tmp_employees = $('.io-plus-mask .mask-view-invite-employees').html();
        let tmp_settings = $('.io-plus-mask .mask-view-settings').html();
        let html_view = '';
        let _th = '';
        let _progress = '';
        //Template Employees
        for (i in business_select) {
            _th = tmp_employees;
            _th = iop_replace("#business-name#", business_select[i].name, _th);
            _th = iop_replace("#location-id#", business_select[i].id, _th);
            _th = iop_replace("#location-link#", business_select[i].link, _th);


            html_view += _th;
        }
        //Template Setings
        let _btn = 'Next';
        for (i in business_select) {
            _th = tmp_settings;
            _th = iop_replace("#business-name#", business_select[i].name, _th);
            _th = iop_replace("#business-address#", 'Address', _th);
            _th = iop_replace("#business-rating#", business_select[i].rating, _th);
            let star = Math.round(business_select[i].rating);
            let h_stra = '';
            for (let s = 0; s < star; s++) {
                h_stra += '<i>★</i>';
            }
            _th = iop_replace("#business-stars#", h_stra, _th);
            _th = iop_replace("#location-id#", business_select[i].id, _th);


            if ((business_select.length - 1) == i) _btn = 'Save Settings';
            _th = iop_replace("#button-setting#", _btn, _th);

            _progress = '';


            for (j = 0; j < business_select.length; j++) {
                _progress += '<li';
                if (i == j) _progress += ' class="nau-active" ';
                _progress += '></li>';
            }
            _th = iop_replace("#setting-progress#", _progress, _th);


            html_view += _th;
        }


        //$('.io-plus  span.locarion-views').html('');
        $('.io-plus  .view-qrcode').after(html_view);
        //$('.io-plus  span.locarion-views').after(tmp_settings);

        if (business_select.length == 1) {
            $('.io-plus .view-settings .nau-footer-copy').hide();
        } else {
            $('.io-plus .view-settings .nau-footer-copy').show();
        }
        iop_next();


        iop_event_location_view();
        custom_init();
    }

    function iop_event_location_view() {


        $('.io-plus .js-prev-view').click(function () {
            iop_prev('');
        });

        event_add_employees();
        event_save_setting()
    }


    function event_add_employees() {

        //Add email employees
        /*$('.io-plus .view-invite-employees .row-invite.envelope').click(function () {
            $('.io-plus .view-invite-employees .mail-employees').show();
        });
        */

        $('.io-plus .view-invite-employees .nau-group-input i.add-email').click(function () {

            let this_view = $(this).closest(".view-invite-employees");


            //let _html='<div class="item-mail-employees"><span>'+$(this).val()+'</span><div class="iop-close" >&times;</div></div>';
            let _mail = $('.io-plus .view-invite-employees .input-mail-employees').val();
			$('.io-plus .view-invite-employees .input-mail-employees').val('');
            let _txt = _mail.substring(0, 1);
            _txt = _txt.toUpperCase();
            let _html = '';
            _html += '<li>';
            _html += '<div class="nau-employee">';
            _html += '<div class="nau-avatar"><span>' + _txt + '</span></div>';
            _html += '<div class="nau-name-and-mail">';
            _html += '<div class="nau-mail">' + _mail + '</div>';
            _html += '</div>';
            _html += '<i class="fas fa-times nau-remove"></i>';
            _html += '</div>';
            _html += '</li>';
            $(this_view).find('.mail-employees .list-mail').append(_html);
            $(this).val('');
            $('.io-plus .view-invite-employees .mail-employees .list-mail .nau-remove').click(function () {
                $(this).closest(".nau-employee").detach();
            });

        });


        $('.io-plus .view-invite-employees .input-mail-employees').keyup(function () {

            let this_view = $(this).closest(".view-invite-employees");

            if (event.keyCode == 13) {
                //let _html='<div class="item-mail-employees"><span>'+$(this).val()+'</span><div class="iop-close" >&times;</div></div>';
                let _mail = $(this).val();
                let _txt = _mail.substring(0, 1);
                _txt = _txt.toUpperCase();
                let _html = '';
                _html += '<li>';
                _html += '<div class="nau-employee">';
                _html += '<div class="nau-avatar"><span>' + _txt + '</span></div>';
                _html += '<div class="nau-name-and-mail">';
                _html += '<div class="nau-mail">' + _mail + '</div>';
                _html += '</div>';
                _html += '<i class="fas fa-times nau-remove"></i>';
                _html += '</div>';
                _html += '</li>';
                $(this_view).find('.mail-employees .list-mail').append(_html);
                $(this).val('');
                $('.io-plus .view-invite-employees .mail-employees .list-mail .nau-remove').click(function () {
                    $(this).closest(".nau-employee").detach();
                });
            }
        });

        $('.io-plus .view-invite-employees .nau-copy-link').click(function () {
            let this_view = $(this).closest(".view-invite-employees");
            let this_id = $(this_view).attr('data');
            $(this_view).find('.list-invite-link').slideDown("slow");
            $(this_view).find('.copy-alert').slideDown("slow");
            setTimeout(function () {
                $(this_view).find('.copy-alert').slideUp("slow");
            }, 1600);

            var copyText = document.getElementById("link_copy_" + this_id);
            copyText.style.display = "block";
			setTimeout(function () {
				copyText.select();
				document.execCommand("copy");
				copyText.style.display = "none";
			}, 200);


        });


        $('.io-plus .view-invite-employees .invite-employees').click(function () {
            let this_view = $(this).closest(".view-invite-employees");
            let this_id = $(this_view).attr('data');


            let _mail_employees = [];

            $(this_view).find('.mail-employees .list-mail .nau-mail').each(function (i, val) {
                _mail_employees.push($(val).html());
            });

            let this_business = 0;
            for (i in business_select) {
                if (this_id == business_select[i].id) this_business = business_select[i];
            }
            iop_next();

            if (_mail_employees.length > 0) {

                for (m in _mail_employees) {


                    let arr_mail = [];
                    arr_mail.push(_mail_employees[m]);
                    _data = {
						'nonce': io_plus_object.nonce,
                        'action': 'oi_plus_add_employees',
                        'employees': arr_mail,
                        'business': this_business
                    };

                    $.ajax({
                        url: io_plus_object.ajaxurl,
                        type: 'POST',
                        dataType: 'json',
                        data: _data,
                        success: function (res) {

                            console.log(res);

                        },
                        error: function (e, v) {

                            console.log(e.responseText);
                            console.log(v);
                            console.log(e);
                        }
                    });
                }
            }


            /*business_select_number++;

            if(business_select_number < business_select.length ){
                $('.io-plus .view-invite-employees .list-invite-link #link_copy').val(business_select[business_select_number].link);
                $('.io-plus .view-invite-employees .mail-employees .list-mail').html('');

                $('.io-plus .input-mail-employees ').val('');
                $('.io-plus .view-invite-employees .title-business-name').html(business_select[business_select_number].name);

            }else{
                business_select_number=0;
                $('.io-plus .view-settings .title-business-name').html(business_select[business_select_number].name);

                iop_next();
                custom_init();
            }*/


        });


    }


    function event_save_setting() {
        $('.io-plus .save-settings').click(function () {
            let this_view = $(this).closest(".view-settings");
            let this_id = $(this_view).attr('data');


            let occupancy = $(this_view).find('.nau-custom-select select').val();
            let emergency_number = $(this_view).find('.input-emergency-number').val();
            let visitors_count = $(this_view).find('.input-visitors-count').val();

            _data = {
				'nonce': io_plus_object.nonce,
                'action': 'oi_plus_save_settings_business',
                'id': this_id,
                'occupancy': occupancy,
                'emergency_number': emergency_number,
                'visitors_count': visitors_count,
            };
            iop_next();
            $.ajax({
                url: io_plus_object.ajaxurl,
                type: 'POST',
                data: _data,
                success: function (res) {

                    console.log(res);
                },
                error: function (e, v) {

                    console.log(e.responseText);
                    console.log(v);
                    console.log(e);
                }
            });


        });
    }


    function owner_save_setting() {
        $('.io-plus .view-owner-settings .owner-save-settings').click(function () {

			$(this).addClass('nau-loading');
			
            let occupancy = $('.io-plus .view-owner-settings  .nau-custom-select select').val();
            let emergency_number = $('.io-plus .view-owner-settings  .input-emergency-number').val();
            let visitors_count = $('.io-plus .view-owner-settings  .input-visitors-count').val();

            _data = {
                'nonce'           : io_plus_object.nonce,
                'action'          : 'oi_plus_save_settings_business',
                'id'              : g_owner_business_selected,
                'occupancy'       : occupancy,
                'emergency_number': emergency_number,
                'visitors_count'  : visitors_count,
            };
			//console.log(_data);
            $.ajax({
                url: io_plus_object.ajaxurl,
                type: 'POST',
                data: _data,
                success: function (res) {

                   $('.io-plus .view-owner-settings .owner-save-settings').removeClass('nau-loading');
					$('.io-plus .view-owner-settings .save-label').fadeIn();

                    console.log(res);
					
					setTimeout(function(){
						$('.io-plus .view-owner-settings .save-label').fadeOut();
					},3000);
                },
                error: function (e, v) {
					$('.io-plus .view-owner-settings .owner-save-settings').removeClass('nau-loading');
                    console.log(e.responseText);
                    console.log(v);
                    console.log(e);
                }
            });


        });
    }


    $('.io-plus  .iop-group-options .iop-option').click(function () {
        let _group = $(this).closest(".iop-group-options");
        $(_group).find('.iop-option').removeClass('selected');
        $(this).addClass('selected');
    });

    $('.io-plus').on('click', '.row-loc', function () {

        console.log(this);
        $(this).toggleClass('nau-selected');
    });


    $('.io-plus .select-locations').click(function () {


        if ($(".io-plus .locations-list .row-loc.nau-selected").length > 0) {

            $(this).addClass('nau-loading');
            let arr_business = [];
            $(".io-plus .locations-list .row-loc.nau-selected").each(function (i, val) {

                let _loc = {
                    business: $(val).find('.loc-name').text(),
                    address: $(val).find('.loc-address').text(),
                    rating: $(val).find('.loc-rating .nau-number').text(),
					phone: $(val).find('.phone').text(),
                    website: $(val).find('.website').text(),
                };

                arr_business.push(_loc);


            });

            _data = {
				'nonce': io_plus_object.nonce,
                'action': 'oi_plus_add_business',
                'business': arr_business,
                'user': _user,
            };
			console.log();
            $('.io-plus .qrcode-list').html('');

            $.ajax({
                url: io_plus_object.ajaxurl,
                type: 'POST',
                dataType: 'json',
                data: _data,
                success: function (res) {

                    if (res.length > 0) {

                        let _nau_open = 'nau-open';
                        for (key in res) {
                            res[key].name = iop_ctxt(res[key].name);//fix clear text

                            let _post = res[key];

                            business_select_id.push(_post.id);

                            let html = '';
                            let business_name = _post.name;
                            if (key == 0) {

                                $('.io-plus .view-qrcode .js-title-first-business').text(business_name);

                                html += '<div class="wrapper-qrcode nau-code-frame">';
                                html += '<div class="erapper-qrcode">';
                                html += '<div id="qrcode_' + _post.id + '" class="qrcode-img"></div>';
                                html += '</div>';
                                html += '<div class="nau-code-text">';
                                html += 'Your QR Code will be include in ';
                                html += '<a href="' + _post.link + '" class="link-qr-in" target="_blink">' + _post.link + '</a>';
                                html += '</div>';
                                html += '<div class="pin-code nau-pin">';
                                html += '<div>Secret Pin:</div>';
                                html += '<div class="nau-form" >';
                                html += '<div class="nau-group-input nau-group-input-right">';
                                html += $('.icon-eye').html();
                                ;
                                html += '<input type="password" class="input-pin nau-input nau-input-border" maxlength="4" data="' + _post.id + '" value="" >';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            } else {


                                html += '<ul class="nau-accordion" id="accordion">';
                                html += '<li class="nau-accordion-list ' + _nau_open + '">';
                                html += '<div class="nau-accordion-link"><span>' + business_name + ' QR Code</span><i class="fa fa-chevron-down"></i></div>';
                                html += '<div class="nau-acordion-content" style="display: none;">';


                                html += '<div class="wrapper-qrcode nau-code-frame">';
                                html += '<div class="erapper-qrcode">';
                                html += '<div id="qrcode_' + _post.id + '" class="qrcode-img"></div>';
                                html += '</div>';
                                html += '<div class="nau-code-text">';
                                html += 'Your QR Code will be include in ';
                                html += '<a href="' + _post.link + '" class="link-qr-in" target="_blink">' + _post.link + '</a>';
                                html += '</div>';
                                html += '<div class="pin-code nau-pin">';
                                html += '<div>Secret Pin:</div>';
                                html += '<div class="nau-form" >';
                                html += '<div class="nau-group-input nau-group-input-right">';
                                html += $('.icon-eye').html();
                                ;
                                html += '<input type="password" class="input-pin nau-input nau-input-border" maxlength="4" data="' + _post.id + '" value="" >';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                            $('.io-plus .qrcode-list').append(html);
                            $('.io-plus #qrcode_' + _post.id).qrcode({
                                text: _post.link,
                                width: 200,
                                height: 200
                            });

                            //$('.io-plus .view-invite-employees .list-invite-link #link_copy').val(business_select[0].link);

                            _nau_open = '';
							
							$('.io-plus .qrcode-list .pin-code svg').click(function(){
								let _par=$(this).closest(".pin-code");
								if(_par.find('input').attr('type')=='password'){
									_par.find('input').attr('type','number');
								}else{
									_par.find('input').attr('type','password');
								}
								
							});
                        }
                    }

                    business_select = res;
                    $('.nau-accordion-list .nau-accordion-link').click(function () {
                        let _this = $(this).closest(".nau-accordion-list");
                        if (!$(_this).hasClass('nau-accordion-list')) return false;
                        if ($(_this).hasClass('nau-open')) {
                            $(_this).removeClass('nau-open');
                            $(_this).find('.nau-acordion-content').slideUp("slow");
                        } else {
                            $(_this).addClass('nau-open');
                            $(_this).find('.nau-acordion-content').slideDown("slow");
                        }

                    });
                    //Next Page -->
                    iop_create_location_view();
                    //iop_next();

                    console.log(res);
                },
                error: function (e, v) {

                    console.log(e.responseText);
                    console.log(v);
                    console.log(e);
                }
            });
        }
    });


    $('.io-plus .view-start .oip-button-rb, .io-plus .view-start .nau-logo').click(function () {

        if (g_load_info) {
            g_ViewStart = false;
            if (g_login == true) {
                $('.io-plus  .iop-view.view-login').detach();
            }
            iop_next();
        }
    });

    $('.io-plus .view-start .start-screen-label span').click(function () {
        if (g_load_info) {
            console.log(_user);
            if (_user.business_list.length > 0) {
                let bs_last = _user.business_list.length - 1;
                location.href = _user.business_list[bs_last].link;
            } else {

            }
        }
    });

    $('.io-plus .view-start .oip-button-mb').click(function () {
        if (g_load_info) {
            console.log(_user);
            if (_user.business_list.length > 0) {
                let bs_last = _user.business_list.length - 1;
                location.href = _user.business_list[bs_last].link;
            } else {
                g_ViewStart = false;
                if (g_login == true) {
                    $('.io-plus  .iop-view.view-login').detach();
                }
                iop_next();
            }
        }

    });


    $('.io-plus .next-email').click(function () {
        AddPinCode('email');
        iop_next();
    });

    $('.io-plus .next-invite-employees').click(function () {
        AddPinCode();
        //$('.io-plus .view-invite-employees .title-business-name').html(business_select[business_select_number].name);
        iop_next();

    });


    function AddPinCode(_action) {
        let arr_pin = [];
        $('.io-plus .qrcode-list .input-pin').each(function (i, val) {
            console.log($(this).attr('data'));
            console.log($(this).val());

            let _pin = {
                id: $(this).attr('data'),
                pin: $(this).val()
            };
            arr_pin.push(_pin);
            //business_select.push($(this).attr('data'));
        });

        let _mail = '';
        if (_action) {
            _mail = _user.email;
        }

        if (arr_pin.length > 0) {
            _data = {
				'nonce': io_plus_object.nonce,
                'action': 'oi_plus_add_pin_code',
                'pin': arr_pin,
                'mail': _mail,
                'business': business_select,
            };
            console.log(_data);

            $.ajax({
                url: io_plus_object.ajaxurl,
                type: 'POST',
                data: _data,
                success: function (res) {


                    console.log(res);
                },
                error: function (e, v) {

                    console.log(e.responseText);
                    console.log(v);
                    console.log(e);
                }
            });
        }

    }


    $('.io-plus .next-welcome').click(function () {
        iop_next();
    });

    $('.io-plus .add-more-site').click(function () {
        location.reload();
    });
    $('.io-plus .setup-finish').click(function () {
        open(location, '_self').close();
        /*window.close();
        window.top.close();*/
    });


    $('.iop-options-button .iop-opt-but').click(function () {
        $(this).addClass('selected');
        iop_next();
    });

    $('.io-plus .answers-send').click(function () {
        //$(this).addClass('nau-loading');
        /*var interview=[];
        $('.io-plus .io-plus-employee .iop-options-button').each(function(e,answers){
            let question_title=$(answers).prev('.nau-sup-text').text();
            let answers_value=$(answers).find('.iop-opt-but.selected').text();

            interview.push({'question':question_title,'answer':answers_value});

        });
        $('.io-plus .io-plus-employee .iop-group-options').each(function(e,answers){
            let question_title=$(answers).prev('.nau-sup-text').text();
            let answers_value=$(answers).find('.iop-option.selected').text();
            interview.push({'question':question_title,'answer':answers_value});


        });*/
        let result = [];
        $('.io-plus .io-plus-employee .iop-options-button').each(function (e, answers) {
            let answers_value = $(answers).find('.iop-opt-but.selected').attr('data');
            if (answers_value != undefined) {
                result.push(answers_value);
            }


        });
        if (result.length == 0) result.push('Normal');
        _data = {
			'nonce': io_plus_object.nonce,
            'action': 'oi_plus_interview',
            'business': _post_business,
            'interview': result,
            'user': _user_post_id
        };
        console.log(_data);
        $.ajax({
            url: io_plus_object.ajaxurl,
            type: 'POST',
            data: _data,
            success: function (res) {

                console.log(res);
                //iop_next();
            },
            error: function (e, v) {

                console.log(e.responseText);
                console.log(v);
                console.log(e);
            }
        });

    });


    $('.io-plus .js-search-employee').on('input', function () {
        let _val = $(this).val();
  
            search_employee(_val);
    
    });


    $('.io-plus .js-see-all').click(function () {
        search_employee('');
        iop_next_name('view-search-employee');
    });


    function search_employee(_val = '') {
        _val = _val.toLowerCase();

        $('.io-plus .view-search-employee .nau-search-employee-list').html('');

        iop_init_scroll();
        for (i in g_owner_business) {
            if (g_owner_business_selected == g_owner_business[i].id) {
                for (j in g_owner_business[i].employee) {
                    let name = g_owner_business[i].employee[j].name;
                    let email = g_owner_business[i].employee[j].email;
                    let id = g_owner_business[i].employee[j].id;
                    name = name.toLowerCase();
                    email = email.toLowerCase();
                    if (name.indexOf(_val) > -1 || email.indexOf(_val) > -1 || _val == '') {
                        let _html = '';
                        _html += '<li data="' + id + '">';
                        _html += '<div class="nau-employee nau-employee-shadow">';
                        _html += '<div class="nau-name-and-mail">';
                        if (name) _html += '<div class="nau-name">' + name + '</div>';
                        _html += '<div class="nau-mail">' + email + '</div>';
                        _html += '</div>';
                        _html += '<i>' + iop_get_mask('svg-gear') + '</i>';
                        _html += '</div>';
                        _html += '<div class="status">';
                        _html += '<div class="stl-status">';
                        _html += '<div class="border"><span>' + iop_get_mask('svg-attention') + '</span> SET POSITIVE FOR COVID</div>';
                        _html += '</div>';
                        _html += '</div>';
                        _html += '</li>';

                        $('.io-plus .view-search-employee .nau-search-employee-list').append(_html);

                    }


                }
            }

        }
        $('.io-plus .view-search-employee .nau-search-employee-list li .nau-name-and-mail').click(function () {
            let sid = $(this).closest('li').attr('data');

            view_info_employee(sid);

        });
        $('.io-plus .view-search-employee .nau-search-employee-list li i').click(function () {
            let li = $(this).closest('li');
            $(li).find('.status').slideToggle();

        });

    }


    function view_info_employee(sid) {
        _data = {
			'nonce': io_plus_object.nonce,
            'action': 'oi_plus_get_employee',
            'id': sid,
            'business': g_owner_business_selected,
        };
        console.log(_data);
        $.ajax({
            url: io_plus_object.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: _data,
            success: function (res) {

                console.log(res);
                g_info_employee = res;

                let _img = def_img(res.user_img);

                $('.io-plus .view-employee-detail .js-user-name').html(res.user_name);
                $('.io-plus .view-employee-detail .js-user-email').html(res.user_email);
                $('.io-plus-owner .view-employee-detail .nau-check-list').html('');
                $('.io-plus .view-schedule .js-user-name').text(res.user_name);
                console.log(_img);
                $('.io-plus .view-employee-detail img').attr('src', _img);
                $('.io-plus .view-schedule img').attr('src', _img);
                let badge_last = 'normal';
                if (res.interview[0]) {

                    let lng = res.interview.length;
                    lng--;
                    badge_last = res.interview[lng].interview[0];
					if(badge_last==undefined){
						badge_last='normal';
					}


                }
                $('.io-plus .view-employee-detail .nau-avatar-frame .js-badge').html('<div class="nau-badge ' + iop_badge_class(badge_last) + '"><span>' + iop_badge_label(badge_last) + '</span></div');
                if (res.interview.length > 0) {
                    for (i in res.interview) {
                        let _state = res.interview[i].interview[0];
						if(_state==undefined){
							_state='normal';
						}
                        let _datetime = res.interview[i].datetime;
                        let _html = '';
                        _html += '<li class="nau-check-list-item">';
                        _html += '<div class="nau-left">';
                        _html += '<div class="nau-name">' + res.user_name + '</div>';
                        _html += '<div class="nau-badge nau-badge-sm ' + iop_badge_class(_state) + '">' + iop_badge_label(_state) + '</div>';
                        _html += '</div>';
                        _html += '<div class="nau-right">' + calcDateText(_datetime) + '</div>';
                        _html += '</li>';
                        $('.io-plus-owner .view-employee-detail .nau-check-list').append(_html);
                    }


                }


                iop_next_name('view-employee-detail');
            },
            error: function (e, v) {

                console.log(e.responseText);
                console.log(v);
                console.log(e);
            }
        });
    }

    $('.io-plus .view-search-employees-result .js-back-view-owner').click(function () {
        $('.io-plus .view-search-employees-result').hide();
        $('.io-plus .view-business-list').show();
        $('.io-plus .js-search-employee').val('');
        $('.io-plus .view-search-employees-result .nau-search-employee-list').html('');

    });

    $('.io-plus .see-schedule').click(function () {
        iop_next();
        var all_datetime = '';

        if (g_info_employee.interview.length > 0) {
            for (i in g_info_employee.interview) {
                let _datetime = g_info_employee.interview[i].datetime;
                let new_date = new Date(_datetime);
                all_datetime += '[' + new_date.getFullYear() + '-' + new_date.getMonth() + '-' + new_date.getDate() + ']';

            }

        }

console.log(all_datetime);
        var fp = flatpickr('#flatpickr2', {
            inline  : true,
            onChange: function (selectedDates, dateStr, instance) {
                $('.io-plus .view-schedule .nau-check-list-item').hide();
                if (g_info_employee.interview.length > 0) {
                    for (i in g_info_employee.interview) {
                        let _state = g_info_employee.interview[i].interview[0];
						if(_state==undefined)_state='normal';
                        let _datetime = g_info_employee.interview[i].datetime;
                        if (_datetime.indexOf(dateStr) > -1) {
                            $('.io-plus .view-schedule .nau-check-list-item').show();
                            $('.io-plus .view-schedule .js-icon-status').html('<div class="nau-badge nau-badge-sm ' + iop_badge_class(_state) + '">' + iop_badge_label(_state) + '</div>');
                        }
                    }

                }
                $('.io-plus .view-schedule .js-datetime').text(calcDateText(dateStr));

            },
            onReady: function (selectedDates, dateStr, instance) {

                $('.io-plus .view-schedule .nau-check-list-item').hide();
                if (g_info_employee.interview.length > 0) {
                    for (i in g_info_employee.interview) {
                        let _state = g_info_employee.interview[i].interview[0];
						if(_state==undefined)_state='normal';
                        let _datetime = g_info_employee.interview[i].datetime;
                        if (_datetime.indexOf(dateStr) > -1) {
                            $('.io-plus .view-schedule .nau-check-list-item').show();
                            $('.io-plus .view-schedule .js-icon-status').html('<div class="nau-badge nau-badge-sm ' + iop_badge_class(_state) + '">' + iop_badge_label(_state) + '</div>');
                        }
                    }

                }
                $('.io-plus .view-schedule .js-datetime').text(calcDateText(dateStr));

            },

            /*onDayCreate: function(dObj, dStr, fp, dayElem){

							let date=dayElem.dateObj;
							let str_date=date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate();
							//console.log(dayElem.dateObj.getFullYear());
							//console.log(dayElem.dateObj.getDate());
							if (all_datetime.indexOf(str_date) > -1) {

								dayElem.className += ' exist';


							}


						}*/

        });

        fp.setDate(new Date(), true);

        fp.config.onDayCreate = [
            function (dObj, dStr, fp, dayElem) {
                let date = dayElem.dateObj;
                let str_date = '[' + date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate() + ']';

                if (all_datetime.indexOf(str_date) > -1) {
                    dayElem.className += ' exist';


                }
            }
        ];
        fp.redraw();

    });


    $('.io-plus  .owner-main .get-fever').click(function () {
        $('.io-plus  .owner-main .nau-check-list li').hide();
        $('.io-plus  .owner-main .nau-check-list .status-fever').show();
    });
    $('.io-plus  .owner-main .get-visit').click(function () {
        $('.io-plus  .owner-main .nau-check-list li').hide();
        $('.io-plus  .owner-main .nau-check-list .status-visit').show();
    });
    $('.io-plus  .owner-main .get-family_positive').click(function () {
        $('.io-plus  .owner-main .nau-check-list li').hide();
        $('.io-plus  .owner-main .nau-check-list .status-family_positive').show();
    });

    $('.io-plus .view-employee-detail .js-btn-back').click(function () {
        //iop_prev('owner-main');
		iop_prev();

    });

    $('.io-plus .view-schedule .js-btn-back').click(function () {
        iop_prev('view-employee-detail');

    });

    $('.io-plus .js-show-owner-questionary').click(function () {

        iop_next_name('view-owner-questionary');

    });

    $('.io-plus .js-show-owner-main').click(function () {
        if ($(this).hasClass('m-activ')) return false;
        iop_next_name('owner-main');
        iop_next_pos_start('view-owner-surveys');
        iop_next_pos_start('view-owner-check-ins');
        $('.io-plus .but-menu').removeClass('m-activ');
        $(this).addClass('m-activ');


    });
    $('.io-plus .js-show-surveys').click(function () {
        if ($(this).hasClass('m-activ')) return false;
        iop_next_name('view-owner-surveys');
        iop_next_pos_start('owner-main');
        iop_next_pos_start('view-owner-check-ins');

        $('.io-plus .but-menu').removeClass('m-activ');
        $(this).addClass('m-activ');


        //Filter
        $('.io-plus .view-owner-surveys .row-surveys').hide();
        $('.io-plus .view-owner-surveys .row-surveys.loc-id-' + g_owner_business_selected).show();


    });
    $('.io-plus .js-show-check-ins').click(function () {
        if ($(this).hasClass('m-activ')) return false;
        iop_next_name('view-owner-check-ins');
        iop_next_pos_start('owner-main');
        iop_next_pos_start('view-owner-surveys');


        $('.io-plus .but-menu').removeClass('m-activ');
        $(this).addClass('m-activ');
		

        
		
		
		let fp_cs=flatpickr('#flatpickr_cs',{
            inline: true,
            onChange: function (selectedDates, dateStr, instance) {
                filter_check_ins(dateStr);

            },
            onReady: function (selectedDates, dateStr, instance) {

                filter_check_ins(dateStr);

            }

        });
		
		fp_cs.setDate(new Date(), true);
		
		fp_cs.config.onDayCreate = [
            function (dObj, dStr, fp, dayElem) {
                let date = dayElem.dateObj;
                let str_date = '['+g_owner_business_selected+'-' + date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate() + ']';

                if (all_employee_datetime.indexOf(str_date) > -1) {
                    dayElem.className += ' exist';


                }
            }
        ];
        fp_cs.redraw();

        /*$('#flatpickr_cs').flatpickr({
            inline: true,
            onChange: function (selectedDates, dateStr, instance) {
                filter_check_ins(dateStr);

            },
            onReady: function (selectedDates, dateStr, instance) {

                filter_check_ins(dateStr);

            }

        });*/
    });

    $('.io-plus .js-show-surveys-list').click(function () {

        iop_next_name('view-owner-surveys');
        iop_next_pos_start('owner-main');
        iop_next_pos_start('view-owner-check-ins');

        $('.io-plus .but-menu').removeClass('m-activ');
        $('.io-plus .but-menu-surveys').addClass('m-activ');


        //Filter
        $('.io-plus .view-owner-surveys .row-surveys').hide();
        $('.io-plus .view-owner-surveys .row-surveys.loc-id-' + g_owner_business_selected).show();

        var _data = jQuery(this).attr('data');

        setTimeout(function () {
            $('.io-plus .view-owner-surveys .swiper-pagination-bullet:eq(' + _data + ')').click();
        }, 500);


    });


    function filter_check_ins(dateStr) {

        $('.io-plus .view-owner-check-ins .list-check-ins .nau-check-list-item').hide();
        $('.io-plus .view-owner-check-ins .list-check-ins .nau-check-list-item.dt-' + dateStr + '.loc-id-' + g_owner_business_selected).show();
    }


    //********************************************************************
    $('.io-plus .nau-menu-frame a.show-view-settings').click(function () {
        iop_next_name('view-owner-settings');
        $('.io-plus .nau-menu-frame').removeClass('nau-active');

        _data = {
            'nonce' : io_plus_object.nonce,
            'action': 'oi_plus_get_settings_business',
            'id'    : g_owner_business_selected,
        };
        console.log(_data);
        $.ajax({
            url     : io_plus_object.ajaxurl,
            type    : 'POST',
            data    : _data,
            dataType: 'json',
            success : function (res) {
                if (res) {
                    if (!res.occupancy) res.occupancy = '0%';
                    if (!res.visitors_count) res.visitors_count = '0';
                    $('.io-plus .view-owner-settings  .nau-select-selected').html(res.occupancy);
                    $('.io-plus .view-owner-settings  .input-emergency-number').val(res.emergency_number);
                    $('.io-plus .view-owner-settings  .input-visitors-count').val(res.visitors_count);
                }


                console.log(res);
            },
            error   : function (e, v) {

                console.log(e.responseText);
                console.log(v);
                console.log(e);
            }
        });

    });
    $('.io-plus .nau-menu-frame a.show-view-about-us').click(function () {
        iop_next_name('view-owner-about-us');
        $('.io-plus .nau-menu-frame').removeClass('nau-active');

    });
	
	$('.io-plus .view-manager .js-all-employees').click(function () {
        iop_next_name('view-manager-all-employees');


    });
    //********************************************************************
	$('.io-plus  .io-plus-logout').click(function(){

		gapi.auth2.getAuthInstance().disconnect();

		_data = {
			'nonce': io_plus_object.nonce,
			'action': 'oi_plus_logout',
		};
		console.log(_data);
		$.ajax({
			url: io_plus_object.ajaxurl,
			type: 'POST',
			data: _data,
			success: function (res) {
				console.log(res);
				location.reload();
			},
			error: function (e, v) {

				console.log(e.responseText);
				console.log(v);
				console.log(e);
			}
		});
	});
    //********************************************************************

    //********************************************************************
    $('.nau-menu-btn').on("click", function () {
        $('.nau-menu-frame').addClass('nau-active');
    });
    $('.nau-close-menu-btn').on("click", function () {
        $('.nau-menu-frame').removeClass('nau-active');
    });
    //********************************************************************


    //********************************************************************
    //Tabs
    var c = true;
    var menu = ['Fever', 'Visitor', 'Family Positive'];
    var swiper = new Swiper('.nau-report-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: '.nau-report-nav-buttons',
            clickable: true,
            renderBullet: function (index, className) {

                return '<span class="' + className + '">' + (menu[index]) + '</span>';
            },
        },
    });

    var swiper = new Swiper('.nau-sign-in-slider', {
        slidesPerView: 5,
        breakpoints  : {
            768: {
                slidesPerView: 4,
            },
        },
    });

    var swiper_product = new Swiper('.iop-products', {
        slidesPerView: 2,
        breakpoints  : {
            768: {
                slidesPerView: 4,
            },
        },
    });

    var swiper = new Swiper('.nau-questionary-slider', {
        slidesPerView: 1,
        spaceBetween: 25,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    //********************************************************************
    $('.nau-btn-loader').on('click', function () {
        var _this = this;
        _this.addClass('nau-loading');
    });
    //********************************************************************


    var swiper = new Swiper('.nau-number-card-slider', {
        slidesPerView: 3,
        spaceBetween: 15,
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
        },
    });


});



