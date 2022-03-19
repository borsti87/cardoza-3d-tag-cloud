<?php
/*
Plugin Name: 3D tag cloud
Plugin URI: https://www.cardozatechnologies.com/our-works/3d-tag-cloud/
Description: 3D tag cloud displays your tags in 3D by placing them on a rotating text.
Version: 3.8.a
Author: Vinoj Cardoza / SEG
Author URI: https://www.cardozatechnologies.com/
License: GPL2
*/

add_action('admin_init', 'tagcloud_enq_scripts');
add_action("admin_menu", "cardoza_3d_tag_cloud_options");
add_action('wp_enqueue_scripts', 'tagcloud_enq_scripts');
add_action("plugins_loaded", "cardoza_3d_tagcloud_init");

function tagcloud_enq_scripts(){
	wp_enqueue_style('my-style', plugin_dir_url(__FILE__). '/public/css/cardoza3dtagcloud.css');
	wp_enqueue_script('jquery');
	wp_enqueue_script('tag_handle', plugins_url('/jquery.tagcanvas.min.js', __FILE__), array('jquery'));
	if (isset($_GET['page']) && ($_GET['page'] == 'wp_3d_tag_cloud_slug'))
	{
		if(is_admin()){
			wp_enqueue_style('tag-3d-cloud-bootstrap', plugin_dir_url(__FILE__). '/public/css/bootstrap.css');
			wp_enqueue_style('tag-3d-cloud-font-awesome', plugin_dir_url(__FILE__). '/public/fonts/font-awesome/css/font-awesome.css');
		}
		if(is_admin()){
			wp_enqueue_script('tag-3d-cloud-bootstrap-js', plugins_url('/public/js/bootstrap.js', __FILE__), array('jquery'));
			wp_enqueue_script('tag-3d-cloud-validate-form', plugins_url('/public/js/jquery.form.validator.min.js', __FILE__), array('jquery'), '', true);
			wp_enqueue_script('tag-3d-cloud-js', plugins_url('/public/js/cardoza3dtagcloud.js', __FILE__), array('jquery'), '', true);
		}
	}
}

//The following function will retrieve all the avaialable 
//options from the wordpress database
function retrieve_options(){
	$opt_val = array(
		'title' => stripslashes(get_option('c3tdc_title')),
	    'no_of_tags' => stripslashes(get_option('c3tdc_noof_tags')),
	    'shuffle_tags' => stripslashes(get_option('c3tdc_shuffle_tags')),          // new option shuffle_tags added in V3.8.a
	    'reverse' => stripslashes(get_option('c3tdc_reverse')),                    // new option revers added in V3.8.a
	    'wheelzoom' => stripslashes(get_option('c3tdc_wheelzoom')),                // new option wheelzoom added in V3.8.a
	    'zoom' => stripslashes(get_option('c3tdc_zoom')),                          // new option zoom added in V3.8.a
		'width' => stripslashes(get_option('c3tdc_width')),
		'height' => stripslashes(get_option('c3tdc_height')),
		'bg_color' => stripslashes(get_option('c3dtc_bg_color')),
	    'txt_color' => stripslashes(get_option('c3dtc_txt_color')),
	    'outline_color' => stripslashes(get_option('c3dtc_outline_color')),        // new option outline_color added in V3.8.a
	    'outline_method' => stripslashes(get_option('c3dtc_outline_method')),      // new option outline_method added in V3.8.a
	    'outline_increase' => stripslashes(get_option('c3dtc_outline_increase')),  // new option outline_increase added in V3.8.a
		'hlt_txt_color' => stripslashes(get_option('c3dtc_hlt_txt_color')),
		'font_name' => stripslashes(get_option('c3dtc_font_name')),
		'max_font_size' => stripslashes(get_option('c3dtc_max_font_size')),
		'min_font_size' => stripslashes(get_option('c3dtc_min_font_size'))
	); 
	return $opt_val;
}

add_action('wp_head','tagcloud_js_init');

function tagcloud_js_init(){
	if(!empty($option_value['txt_color'])) $canvas_txtcolor = $option_value['txt_color'];
	else $canvas_txtcolor = "333333";
	// new option shuffle_tags added in V3.8.a
	if(!empty($option_value['shuffle_tags'])) $canvas_shuffletags = $option_value['shuffle_tags'];
	else $canvas_shuffletags = "false";
	// new option revers added in V3.8.a
	if(!empty($option_value['reverse'])) $canvas_reverse = $option_value['reverse'];
	else $canvas_reverse = "false";
	// new option wheelzoom added in V3.8.a
	if(!empty($option_value['wheelzoom'])) $canvas_wheelzoom = $option_value['wheelzoom'];
	else $canvas_wheelzoom = "false";
	// new option zoom added in V3.8.a
	if(!empty($option_value['zoom'])) $canvas_zoom = $option_value['zoom']/100;
	else $canvas_zoom = 0.9;
	// new option outline_color added in V3.8.a
	if(!empty($option_value['outline_color'])) $canvas_outlinecolor = $option_value['outline_color'];
	else $canvas_outlinecolor = "FFFFFF";
	// new option outline_method added in V3.8.a
	if(!empty($option_value['outline_method'])) $canvas_outlinemethod = $option_value['outline_method'];
	else $canvas_outlinemethod = "colour";
	// new option outline_increase added in V3.8.a
	if(!empty($option_value['outline_increase'])) $canvas_outlineincrease = $option_value['outline_increase'];
	else $canvas_outlineincrease = 4;
	?>
	<script type="text/javascript">
		$j = jQuery.noConflict();
		$j(document).ready(function() {
			if(!$j('#myCanvas').tagcanvas({
				textColour: '#<?php echo $canvas_txtcolor;?>',
				outlineColour: '#<?php echo $canvas_outlinecolor;?>',											// new option outline_color added in V3.8.a
				outlineMethod : '<?php echo $canvas_outlinemethod;?>',											// new option outline_method added in V3.8.a
				<?php if($canvas_outlinemethod=='size') echo "outlineIncrease : $canvas_outlineincrease,";?>	// new option outline_increase added in V3.8.a
				shuffleTags : <?php echo $canvas_shuffletags; ?>,												// new option shuffle_tags added in V3.8.a
				reverse: <?php echo $canvas_reverse; ?>,														// new option reverse added in V3.8.a
				wheelZoom : <?php echo $canvas_wheelzoom; ?>,													// new option wheelzoom added in V3.8.a
				zoom : <?php echo $canvas_zoom; ?>,																// new option wheelzoom added in V3.8.a
				maxSpeed: 0.03,
				depth: 0.75,
				//textFont: null,
				weight: true
			},'tags')) {
				$j('#myCanvasContainer').hide();
			}
		});
	</script>
	<?php
}

function cardoza_3d_tag_cloud_options(){
	add_options_page(
		__('3D Tag Cloud'),
		__('3D Tag Cloud'),
		'manage_options',
		'wp_3d_tag_cloud_slug',
		'cardoza_3D_tc_options_page');
}

function cardoza_3D_tc_options_page(){
	require_once 'cardoza_3D_tag_cloud_options.php';
}

function widget_cardoza_3d_tagcloud($args){
	$option_value = retrieve_options();
	extract($args);
	echo $before_widget;
	echo $before_title;
	echo $option_value['title'];
	echo $after_title;
	global $wpdb;
	$tags_list = get_terms(
		'post_tag',
		array(
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => 0
		)
	);
	if(sizeof($tags_list) != 0) {
		$max_count = 0;
		if (!empty($option_value['height'])) $canvas_height = $option_value['height'];
		else $canvas_height = "250";
		if (!empty($option_value['width'])) $canvas_width = $option_value['width'];
		else $canvas_width = "250";
		if (!empty($option_value['bg_color'])) $canvas_bgcolor = $option_value['bg_color'];
		else $canvas_bgcolor = "FFFFFF";

		$li_font = "";
		if (!empty($option_value['font_name'])) {
			if($option_value['font_name'] != 'Default')
				$li_font = "font-family:'".$option_value['font_name']."';";
		}

		foreach ($tags_list as $tag):
			if ($tag->count > $max_count) $max_count = $tag->count;
		endforeach;
		?>
		<div id="myCanvasContainer" style="background-color:#<?php echo $canvas_bgcolor; ?>;">
			<canvas width="<?php echo $canvas_width; ?>" height="<?php echo $canvas_height; ?>" id="myCanvas">
				<p><?php _e('Anything in here will be replaced on browsers that support the canvas element', 'cardozatagcloud'); ?></p>
			</canvas>
		</div>
		<div id="tags">
			<ul style="display:none;width:<?php print $canvas_width;?>px;height:<?php print $canvas_height;?>px;<?php print $li_font;?>">
				<?php
				if (empty($option_value['no_of_tags'])) $option_value['no_of_tags'] = 30;
				if (empty($option_value['max_font_size'])) $option_value['max_font_size'] = 36;
				if (empty($option_value['min_font_size'])) $option_value['max_font_size'] = 3;
				$i = 1;
				foreach ($tags_list as $tag):
					if ($i <= $option_value['no_of_tags']):
						$font_size = $option_value['max_font_size'] - (($max_count - $tag->count) * 2);
						if ($font_size < $option_value['min_font_size']) $font_size = $option_value['min_font_size'];
						?>
						<li>
							<a href="<?php print get_tag_link($tag->term_id);?>" style="font-size:<?php print $font_size;?>px;"><?php print $tag->name;?></a>
						</li>
						<?php
						$i++;
					endif;
				endforeach;
				?>
			</ul>
		</div>
		<?php
	}
	else _e('No tags found', 'cardozatagcloud');
	echo $after_widget;
}

function cardoza_3d_tagcloud_init(){
	load_plugin_textdomain('cardozatagcloud', false, dirname( plugin_basename(__FILE__)).'/languages');
	wp_register_sidebar_widget('3d_tag_cloud', __('3D Tag Cloud'), 'widget_cardoza_3d_tagcloud');
}
?>