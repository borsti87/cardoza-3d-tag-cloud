<?php
   /*
   Plugin Name: Cardoza 3D tag cloud
   Plugin URI: http://fingerfish.com/cardoza-3d-tagcloud/
   Description: Cardoza 3D tag cloud displays your tags in 3D by placing them on a rotating text.
   Version: 1.0
   Author: Vinoj Cardoza
   Author URI: http://fingerfish.com/about-me/
   License: GPL2
   */

//includes the jquery file
wp_enqueue_script('tagcloud_handle', plugin_dir_url(__FILE__). 'cardoza_3D_tag_cloud.js', array('jquery'));
//includes the css styles file
wp_enqueue_style('my-style', plugin_dir_url(__FILE__). '3dcloud_style.css');

add_action("plugins_loaded", "cardoza_3d_tagcloud_init");

function widget_cardoza_3d_tagcloud($args){
	extract($args);
	echo $before_widget;
	echo $before_title;
	echo "Tag Cloud";
	echo $after_title;
	global $wpdb;
	$tags_list = get_terms('post_tag', array(
				'orderby' 		=> 'count',
				'hide_empty' 	=> 0
			));
	if(sizeof($tags_list)!=0){
		$max_count = 0;
		foreach($tags_list as $tag) if($tag->count > $max_count) $max_count = $tag->count;
		echo '<div id="list"><ul>';
		foreach($tags_list as $tag){
			$font_size = 40 - (($max_count - $tag->count)*2);
			if($font_size<12) $font_size = 12;
			echo '<li><a href="'.$_SERVER['PHP_SELF'].'?tag='.$tag->slug.'" style="font-size:'.$font_size.'px;">'.$tag->name.'</a></li>';
		}
		echo '</ul></div>';
	}
	else echo "No tags found";
	echo $after_widget;
}

function cardoza_3d_tagcloud_init(){
	register_sidebar_widget(__('Cardoza\'s 3D Tag Cloud'), 'widget_cardoza_3d_tagcloud');
}
?>