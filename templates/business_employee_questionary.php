<?php
namespace IO_Plus;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


?>


<div class="io-plus-employee">

	<?php 
	$published_posts = wp_count_posts('io_plus_question')->publish;
	$posts = get_posts( array(
		'numberposts' => $published_posts,
		'category'    => 0,
		'orderby'     => 'date',
		'order'       => 'ASC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_status'  =>'publish',
		'post_type'   => 'io_plus_question',
	) );
	if(!empty($posts)){
		$step=1;
		foreach($posts as $question){
			
			$state=get_post_meta($question->ID, 'state', true);
			
			$button_class='';
			if($step==$published_posts)$button_class=' answers-send';
			?>
			
			<div class="iop-view view-employee-questionary-<?php echo $step;?>">

				<div class="nau-container p-60-60">


					<h1 class="mb-100"><?php _e('We need to know some things...', 'io-plus'); ?></h1>
					
					

					<div class="nau-sup-text nau-left mb-50"><?php echo $question->post_title;?>:</div>
					<?php echo $question->post_content;?>



					<div class="iop-options-button">
						<div class="iop-opt-but <?php echo $button_class;?>" data="<?php echo $state;?>"><?php _e('Yes', 'io-plus'); ?></div>
						<div class="iop-opt-but <?php echo $button_class;?>"><?php _e('No', 'io-plus'); ?></div>
					</div>
				</div>

				<div class="nau-footer-copy">
					<ul class="quest-progress">
						<?php 
						for($i=1;$i<$published_posts+1;$i++){
							if($i==$step){
								echo '<li class="nau-active"></span></li>';
							}else{
								echo '<li><span></span></li>';
							}
							
						}
						?>
					</ul>
				</div>

			</div>
			<?php
			$step++;
			
		}
	}

	?>
    


    

    <div class="iop-view view-sucessful">


        <div class="nau-container">
            <div class="nau-success-frame">
                <div class="nau-success">
                    <h1>Sucessful!</h1>

                    <img src="<?php echo IO_PLUS_URL; ?>assets/img/success.png" alt="success">


                    <div class="setup-finish oip-button-white"><?php _e('Finish', 'io-plus'); ?></div>
                </div>
            </div>


        </div>
    </div>


</div>
