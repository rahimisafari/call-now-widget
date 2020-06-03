<?php
/**
 * @package Call now widget
 * @version 1.0.0
 */
/*
Plugin Name: Call now widget
Plugin URI: http://achaq.ir/plugins/call-now-widget/
Description: this plugin give you a widget for create call now button and sms button ...
Author: Hossein Raimi
Version: 1.0.0
Author URI: http://achaq.ir/
*/

define('CALL_NOW_WIDGET_VERSION', '1.0.0');
define('CALL_NOW_WIDGET_DIR', plugin_dir_path(__FILE__));
define('CALL_NOW_WIDGET_URL', plugins_url('/', __FILE__));

function cnw_register_widget() {
	
 	 register_widget( 'cnw_widget' );
	}
	add_action( 'widgets_init', 'cnw_register_widget' );
	
	class cnw_widget extends WP_Widget {
	function __construct() {
	parent::__construct(
	// widget ID
	'cnw_widget',
	// widget name
	__('Call now widget', ' cnw_widget_domain'),
	// widget description
	array( 'description' => __( 'this plugin give you a widget for create call now button and sms button', 'cnw_widget_domain' ), )
	);
	}
	public function widget( $args, $instance ) {
	wp_register_style( 'callnow', plugin_dir_url(__FILE__).'_inc/css/callnow.css', array(), 'all' );
	wp_enqueue_style('callnow');
	extract($args);
	$showSms=$instance['showsms']?true:false;
	?>

<div class="call-now-button">
	<div>
		<div class="call-now-mobile">
			<a href="tel:<?php echo $instance['callnumber'] ?>"
				onclick="_gaq.push(['_trackEvent','call now widget','Click/Touch','<?php echo $instance['callnumber'] ?>']);"
				class="call-link" title="<?php echo $instance['calllinktitle'] ?>">
				<p class="call-text"> <?php echo $instance['calltext']; ?> </p>

				<div class="quick-alo-ph-circle"></div>
				<div class="quick-alo-ph-circle-fill"></div>
				<div class="quick-alo-ph-img-circle"></div>
			</a>
		</div>


		<div class="call-link-Desktop">
			<a data-toggle="modal" data-target="#exampleModal"
				onclick="_gaq.push(['_trackEvent','call now widget','Click/Touch','<?php echo $instance['callnumber'] ?>']);"
				class="call-link" title="<?php echo $instance['calllinktitle'] ?>">
				<p class="call-text"> <?php echo $instance['calltext']; ?> : <?php echo $instance['callnumber'] ?></p>

				<div class="quick-alo-ph-circle"></div>
				<div class="quick-alo-ph-circle-fill"></div>
				<div class="quick-alo-ph-img-circle"></div>
			</a>
		</div>

	</div>
</div>
<?php $showSms; if($showSms): ?>
<div class="sms-now-button">
	<div>
		<div class="sms-now-mobile">
			<a href="sms:<?php echo $instance['smsnumber'] ?>?&body=<?php echo $instance['smsbody'] ?>"
				onclick="_gaq.push(['_trackEvent','call now module','Click/Touch/SMS','<?php echo $instance['smsnumber'] ?>']);"
				class="call-link" title="<?php echo $instance['calllinktitle'] ?>">
				<p class="call-text"> <?php echo $instance['calltext']; ?> </p>
				<div class="sms-img-circle"></div>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>


<style>
	.call-link {
		text-decoration: none;
	}

	.callNumber {
		font-size: 14pt;
		font-weight: bold;
	}

	@media screen and (max-width: 1980px) {
		.call-now-button {
			display: flex !important;
			background: #1a1919;
		}

		.sms-now-button {
			display: flex !important;
			background: #1a1919;
		}

		.quick-call-button {
			display: block !important;
		}
	}

	@media screen and (min-width:1024px) {
		.call-now-mobile {
			display: none !important;
		}

		.sms-now-mobile {
			display: none !important;
		}
	}

	@media screen and (min-width: px) {
		.call-now-button .call-text {
			display: none !important;
		}

		.sms-now-button .call-text {
			display: none !important;
		}

		/*.call-now-button{display:none;}*/

	}

	@media screen and (min-width: px) {
		.call-now-button .call-text {
			display: none !important;
		}

		.sms-now-button .call-text {
			display: none !important;
		}
	}

	.call-now-button {
		top: 70%;
	}

	.call-now-button {
		left: 5%;
	}

	.call-now-button {
		background: #1a1919;
	}

	.call-now-button div a .quick-alo-ph-img-circle {
		background-color: #0c3;
	}

	.call-now-button .call-text {
		color: #fff;
	}

	/*-------------------sms------------------------*/
	.sms-now-button {
		top: 85%;
	}

	.sms-now-button {
		left: 5%;
	}

	.sms-now-button {
		background: #1a1919;
	}

	.sms-now-button .call-text {
		color: #fff;
	}
</style>
<?php
	
	echo $args['before_widget'];
	echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) )
			$title = $instance[ 'title' ];
		else
			$title = __( 'Default Title', 'cnw_widget_domain' );
	
		if( isset ( $instance['callnumber']))
			$callNumber=$instance['callnumber'];
		else
			$callNumber='09198528524';

		if( isset ( $instance['calltext']))
			$callText=$instance['calltext'];
		else
			$callText='call now';

		if( isset ( $instance['calllinktitle']))
			$callLinkTitle=$instance['calllinktitle'];
		else
			$callLinkTitle='call link title';


			$showSms=$instance['showsms']?true:false;
		

		if( isset ( $instance['smsnumber']))
			$smsNumber=$instance['smsnumber'];
		else
			$smsNumber='09198528524';

		if( isset ( $instance['smsbody']))
			$smsBody=$instance['smsbody'];
		else
			$smsBody='sms body';	

	?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
		name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'callnumber' ); ?>"><?php _e( 'Call number:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'callnumber' ); ?>"
		name="<?php echo $this->get_field_name( 'callnumber' ); ?>" type="text"
		value="<?php echo esc_attr( $callNumber ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'calltext' ); ?>"><?php _e( 'Call text:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'calltext' ); ?>"
		name="<?php echo $this->get_field_name( 'calltext' ); ?>" type="text"
		value="<?php echo esc_attr( $callText ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'calllinktitle' ); ?>"><?php _e( 'Call link title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'calllinktitle' ); ?>"
		name="<?php echo $this->get_field_name( 'calllinktitle' ); ?>" type="text"
		value="<?php echo esc_attr( $callLinkTitle ); ?>" />
</p>

<!-- -------------------- sms ------------------------------ -->

<p>
	<label for="<?php echo $this->get_field_id( 'showsms' ); ?>"><?php _e( 'show sms ? :' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'showsms' ); ?>"
		name="<?php echo $this->get_field_name( 'showsms' ); ?>" type="checkbox" <?php checked($showSms)?> />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'smsnumber' ); ?>"><?php _e( 'sms phone number:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'smsnumber' ); ?>"
		name="<?php echo $this->get_field_name( 'smsnumber' ); ?>" type="text"
		value="<?php echo esc_attr( $smsNumber ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'smsbody' ); ?>"><?php _e( 'sms body:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'smsbody' ); ?>"
		name="<?php echo $this->get_field_name( 'smsbody' ); ?>" type="text"
		value="<?php echo esc_attr( $smsBody ); ?>" />
</p>



<?php
	}
	public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['callnumber'] = ( ! empty( $new_instance['callnumber'] ) ) ? strip_tags( $new_instance['callnumber'] ) : '';
	$instance['calltext'] = ( ! empty( $new_instance['calltext'] ) ) ? strip_tags( $new_instance['calltext'] ) : '';
	$instance['calllinktitle'] = ( ! empty( $new_instance['calllinktitle'] ) ) ? strip_tags( $new_instance['calllinktitle'] ) : '';
	
	$instance['showsms'] = $new_instance['showsms'];
	$instance['smsnumber'] = ( ! empty( $new_instance['smsnumber'] ) ) ? strip_tags( $new_instance['smsnumber'] ) : '';
	$instance['smsbody'] = ( ! empty( $new_instance['smsbody'] ) ) ? strip_tags( $new_instance['smsbody'] ) : '';
	return $instance;
	}
	}