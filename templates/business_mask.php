<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>


<div class="io-plus-mask" style="display: none;">

    <div class="svg-gear">
        <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.52 14.2533C22.5733 13.8533 22.6 13.44 22.6 13C22.6 12.5733 22.5733 12.1467 22.5067 11.7467L25.2133 9.64C25.33 9.54387 25.4097 9.41026 25.4388 9.26196C25.468 9.11365 25.4449 8.95982 25.3733 8.82667L22.8133 4.4C22.738 4.26609 22.6176 4.16317 22.4736 4.10948C22.3297 4.05579 22.1713 4.05479 22.0267 4.10667L18.84 5.38667C18.1733 4.88 17.4667 4.45333 16.68 4.13333L16.2 0.746667C16.1764 0.594041 16.0988 0.454944 15.9814 0.354636C15.864 0.254328 15.7145 0.199462 15.56 0.200001H10.44C10.12 0.200001 9.86668 0.426667 9.81334 0.746667L9.33335 4.13333C8.54668 4.45333 7.82668 4.89333 7.17335 5.38667L3.98668 4.10667C3.69335 4 3.36001 4.10667 3.20001 4.4L0.653347 8.82667C0.493347 9.10667 0.54668 9.45333 0.813346 9.64L3.52001 11.7467C3.45335 12.1467 3.40001 12.5867 3.40001 13C3.40001 13.4133 3.42668 13.8533 3.49335 14.2533L0.78668 16.36C0.670045 16.4561 0.590351 16.5897 0.561176 16.738C0.532002 16.8864 0.555151 17.0402 0.62668 17.1733L3.18668 21.6C3.34668 21.8933 3.68001 21.9867 3.97335 21.8933L7.16001 20.6133C7.82668 21.12 8.53335 21.5467 9.32001 21.8667L9.80001 25.2533C9.86668 25.5733 10.12 25.8 10.44 25.8H15.56C15.88 25.8 16.1467 25.5733 16.1867 25.2533L16.6667 21.8667C17.4533 21.5467 18.1733 21.12 18.8267 20.6133L22.0133 21.8933C22.3067 22 22.64 21.8933 22.8 21.6L25.36 17.1733C25.52 16.88 25.4533 16.5467 25.2 16.36L22.52 14.2533ZM13 17.8C10.36 17.8 8.20001 15.64 8.20001 13C8.20001 10.36 10.36 8.2 13 8.2C15.64 8.2 17.8 10.36 17.8 13C17.8 15.64 15.64 17.8 13 17.8Z"
                  fill="#B3B9C5"/>
        </svg>

    </div>
    <div class="svg-attention">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.5 0.5C3.36 0.5 0 3.86 0 8C0 12.14 3.36 15.5 7.5 15.5C11.64 15.5 15 12.14 15 8C15 3.86 11.64 0.5 7.5 0.5ZM8.25 11.75H6.75V10.25H8.25V11.75ZM8.25 8.75H6.75V4.25H8.25V8.75Z"
                  fill="#EB5757"/>
        </svg>

    </div>
    <div class="view-surveys-row">
        <div class="row-surveys loc-id-#location-id#  js-view_info-employee" data="#user-id#">
            <div class="cell-left">
                <div class="nau-name-and-mail">
                    <div>#name#</div>
                    <span>#email#</span>
                </div>
            </div>
            <div class="cell-right">

                <div class="nau-time">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10.5 5H9V11L14.2 14.2L15 12.9L10.5 10.2V5Z"
                              fill="#2F80ED"/>
                    </svg>

                    <span>#time#</span>
                </div>
            </div>
        </div>
    </div>


    <div class="view-check-row">

        <div class="nau-check-list-item dt-#date# loc-id-#location-id#">
            <div class="nau-left">
                <div class="nau-avatar"><img src="#photo#" alt="employee"></div>
                <div class="nau-name js-user-name">#name#</div>


            </div>
            <div class="nau-right">#time#</div>
        </div>


    </div>
	
	<div class="manager-list-users">
	
		<div class="nau-report-card #date#">
			<div class="nau-report-top">
				<div class="nau-name-and-mail">
					<div>#name#</div>
					<span>#email#</span>
				</div>
				<div class="nau-badge #class#">
					<span><?php _e($tab['name'], 'io-plus'); ?></span></div>
			</div>
			<div class="nau-report-bottom">
				<div class="nau-time">
					<svg width="18" height="20" viewBox="0 0 18 20" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path
								d="M6 9H4V11H6V9ZM10 9H8V11H10V9ZM14 9H12V11H14V9ZM16 2H15V0H13V2H5V0H3V2H2C0.89 2 0.00999999 2.9 0.00999999 4L0 18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM16 18H2V7H16V18Z"
								fill="#333333"/>
					</svg>
					<span>#format_date#</span>
				</div>
				<div class="nau-time">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10.5 5H9V11L14.2 14.2L15 12.9L10.5 10.2V5Z"
							  fill="#333333"/>
					</svg>
					<span>#time#</span>
				</div>
			</div>
		</div>
		
    </div>
	
	<div class="manager-all-employees">
	
		<div class="employee-card">
			<div class="nau-report-top">
				<div class="photo">#img#</div>
				<div class="name-and-mail">
					<div>#name#</div>
					<span>#email#</span>
				</div>
			</div>
				<div class="nau-report-bottom">
				<div class="nau-time">
					<svg width="18" height="20" viewBox="0 0 18 20" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path
								d="M6 9H4V11H6V9ZM10 9H8V11H10V9ZM14 9H12V11H14V9ZM16 2H15V0H13V2H5V0H3V2H2C0.89 2 0.00999999 2.9 0.00999999 4L0 18C0 18.5304 0.210714 19.0391 0.585786 19.4142C0.960859 19.7893 1.46957 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM16 18H2V7H16V18Z"
								fill="#333333"/>
					</svg>
					<span>#format_date#</span>
				</div>
				<div class="nau-time">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
						 xmlns="http://www.w3.org/2000/svg">
						<path d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10.5 5H9V11L14.2 14.2L15 12.9L10.5 10.2V5Z"
							  fill="#333333"/>
					</svg>
					<span>#time#</span>
				</div>
			</div>


		</div>
	
    </div>
	
	
	


</div>
