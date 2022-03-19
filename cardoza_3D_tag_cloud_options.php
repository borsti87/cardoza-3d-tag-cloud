<?php
$c_3d_tag_options = array(
        'c3d_title' => 'c3tdc_title',
        'c3d_noof_tags' => 'c3tdc_noof_tags',
        'c3d_shuffle_tags' => 'c3tdc_shuffle_tags',             // new option shuffle_tags added in V3.8.a
        'c3d_reverse' => 'c3tdc_reverse',                       // new option reverse added in V3.8.a
        'c3d_wheelzoom' => 'c3tdc_wheelzoom',                   // new option wheelzoom added in V3.8.a
        'c3d_zoom' => 'c3tdc_zoom',                             // new option zoom added in V3.8.a
        'c3d_width' => 'c3tdc_width',
        'c3d_height' => 'c3tdc_height',
        'c3d_bg_color' => 'c3dtc_bg_color',
        'c3d_txt_color' => 'c3dtc_txt_color',
        'c3d_outline_color' => 'c3dtc_outline_color',           // new option outline_color added in V3.8.a
        'c3d_outline_method' => 'c3dtc_outline_method',         // new option outline_method added in V3.8.a
        'c3d_outline_increase' => 'c3dtc_outline_increase',     // new option outline_increase added in V3.8.a
        'c3d_font_name' => 'c3dtc_font_name',
        'c3d_max_font_size' => 'c3dtc_max_font_size',
        'c3d_min_font_size' => 'c3dtc_min_font_size'
);

if(empty(get_option('c3dtc_shuffle_tags'))) update_option($c_3d_tag_options['c3dtc_shuffle_tags'], 'false');        // new option shuffle_tags added in V3.8.a
if(empty(get_option('c3dtc_reverse'))) update_option($c_3d_tag_options['c3dtc_reverse'], 'true');                   // new option reverse added in V3.8.a
if(empty(get_option('c3dtc_wheelzoom'))) update_option($c_3d_tag_options['c3dtc_wheelzoom'], 'false');              // new option wheelzoom added in V3.8.a
if(empty(get_option('c3dtc_zoom'))) update_option($c_3d_tag_options['c3dtc_zoom'], 90);                             // new option zoom added in V3.8.a
if(empty(get_option('c3dtc_bg_color'))) update_option($c_3d_tag_options['c3d_bg_color'], 'ffffff');
if(empty(get_option('c3dtc_txt_color'))) update_option($c_3d_tag_options['c3d_txt_color'], '333333');
if(empty(get_option('c3dtc_outline_color'))) update_option($c_3d_tag_options['c3d_outline_color'], '333333');       // new option outline_color added in V3.8.a
if(empty(get_option('c3dtc_outline_method'))) update_option($c_3d_tag_options['c3d_outline_method'], 'colour');     // new option outline_method added in V3.8.a
if(empty(get_option('c3dtc_outline_increase'))) update_option($c_3d_tag_options['c3d_outline_increase'], 4);        // new option outline_increase added in V3.8.a
?>
<div class="wrap tag-cloud-3d-admin">
    <h2><?php _e("3D Tag Cloud Options", "cardozatagcloud");?></h2>
    <?php
    if(isset($_POST['frm_submit'])):
            update_option($c_3d_tag_options['c3d_title'], inputSanitize($_POST['frm_title']));
            update_option($c_3d_tag_options['c3d_noof_tags'], inputSanitize($_POST['frm_noof_tags']));
            update_option($c_3d_tag_options['c3d_shuffle_tags'], inputSanitize($_POST['frm_shuffle_tags']));            // new option shuffle_tags added in V3.8.a
            update_option($c_3d_tag_options['c3d_reverse'], inputSanitize($_POST['frm_reverse']));                      // new option reverse added in V3.8.a
            update_option($c_3d_tag_options['c3d_wheelzoom'], inputSanitize($_POST['frm_wheelzoom']));                  // new option wheelzoom added in V3.8.a
            update_option($c_3d_tag_options['c3d_zoom'], inputSanitize($_POST['frm_zoom']));                            // new option zoom added in V3.8.a
            update_option($c_3d_tag_options['c3d_width'], inputSanitize($_POST['frm_width']));
            update_option($c_3d_tag_options['c3d_height'], inputSanitize($_POST['frm_height']));
            update_option($c_3d_tag_options['c3d_bg_color'], inputSanitize($_POST['frm_bg_color']));
            update_option($c_3d_tag_options['c3d_txt_color'], inputSanitize($_POST['frm_txt_color']));
            update_option($c_3d_tag_options['c3d_outline_color'], inputSanitize($_POST['frm_outline_color']));          // new option outline_color added in V3.8.a
            update_option($c_3d_tag_options['c3d_outline_method'], inputSanitize($_POST['frm_outline_method']));        // new option outline_method added in V3.8.a
            update_option($c_3d_tag_options['c3d_outline_increase'], inputSanitize($_POST['frm_outline_increase']));    // new option outline_increase added in V3.8.a
            update_option($c_3d_tag_options['c3d_font_name'], inputSanitize($_POST['frm_font_name']));
            update_option($c_3d_tag_options['c3d_max_font_size'], inputSanitize($_POST['frm_max_font_size']));
            update_option($c_3d_tag_options['c3d_min_font_size'], inputSanitize($_POST['frm_min_font_size']));
        ?>
        <div class="alert alert-success">
            <?php _e('Options saved.', 'cardozatagcloud' ); ?>
        </div>
    <?php endif;?>
    <?php $option_value = retrieve_options();?>
    <!-- Administration panel form -->
    <form method="post" action="">
    	<!-- General settings panel -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <label><?php _e('General Settings','cardozatagcloud');?></label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Widget Title','cardozatagcloud');?></label>
                        <input class="form-control" type="text" name="frm_title" size="50" value="<?php echo $option_value['title'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Number of tags','cardozatagcloud');?></label>
                        <input data-validation="number" class="form-control" type="text" name="frm_noof_tags" value="<?php echo $option_value['no_of_tags'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Width','cardozatagcloud');?> (px - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
                        <input data-validation="number" data-validation-optional="true" class="form-control" type="text" name="frm_width" value="<?php echo $option_value['width'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Height','cardozatagcloud');?> (px - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
                        <input data-validation="number" data-validation-optional="true" class="form-control" type="text" name="frm_height" value="<?php echo $option_value['height'];?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
        <?php /* new Advanced Settings panel added */ ?>
        	<!-- Advanced settings panel -->
            <div class="panel-heading">
                <label><?php _e('Advanced Settings','cardozatagcloud');?></label>
            </div>
            <div class="panel-body">
                <?php /* new option Text Outline Method added to form */ ?>			
				<div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Text Outline Method','cardozatagcloud');?></label>
						<p><?php _e('Type of highlight to use.','cardozatagcloud'); ?></p>
						<select class="form-control" name="frm_outline_method">
							<option value="outline" <?php if($option_value['outline_method'] == "outline") echo "selected='selected'";?>><?php _e('Outline','cardozatagcloud');?> (<?php _e('An outline at the same depth as the active tag.', 'cardozatagcloud'); ?>)</option>
							<option value="classic" <?php if($option_value['outline_method'] == "classic") echo "selected='selected'";?>><?php _e('Classic','cardozatagcloud');?> (<?php _e('Old-style outline on top of all tags.', 'cardozatagcloud'); ?>)</option>
							<option value="block" <?php if($option_value['outline_method'] == "block") echo "selected='selected'";?>><?php _e('Block','cardozatagcloud');?> (<?php _e('Solid block of colour around the active tag.', 'cardozatagcloud'); ?>)</option>
							<option value="colour" <?php if($option_value['outline_method'] == "colour") echo "selected='selected'";?>><?php _e('Colour','cardozatagcloud');?> (<?php _e('Changes the colour of the text or image of the current tag to the Outline Colour value.', 'cardozatagcloud'); ?>)</option>
							<option value="size" <?php if($option_value['outline_method'] == "size") echo "selected='selected'";?>><?php _e('Size','cardozatagcloud');?> (<?php _e('Increases the size of the tag, using the Outline Increase option for the amount.', 'cardozatagcloud'); ?>)</option>
							<option value="none" <?php if($option_value['outline_method'] == "none") echo "selected='selected'";?>><?php _e('None','cardozatagcloud');?> (<?php _e('No highlighting at all.', 'cardozatagcloud'); ?>)</option>							
						</select>
                    </div>
                </div>
                <?php /* new option Shuffle Tags added to form */ ?>
				<div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Shuffle Tags','cardozatagcloud');?></label>
						<p><?php _e('Set to "true" to randomize the order of the tags.', 'cardozatagcloud'); ?></p>
						<select class="form-control" name="frm_shuffle_tags">
							<option value="false" <?php if($option_value['shuffle_tags'] == "false") echo "selected='selected'";?>><?php _e('False','cardozatagcloud');?></option>
							<option value="true" <?php if($option_value['shuffle_tags'] == "true") echo "selected='selected'";?>><?php _e('True','cardozatagcloud');?></option>
						</select>
                    </div>
                </div>
                <?php /* new option Reverse Direction added to form */ ?>
				<div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Reverse Direction','cardozatagcloud');?></label>
						<p><?php _e('Set to "true" to reverse direction of movement relative to mouse position.', 'cardozatagcloud'); ?></p>
						<select class="form-control" name="frm_reverse">
							<option value="false" <?php if($option_value['reverse'] == "false") echo "selected='selected'";?>><?php _e('False','cardozatagcloud');?></option>
							<option value="true" <?php if($option_value['reverse'] == "true") echo "selected='selected'";?>><?php _e('True','cardozatagcloud');?></option>
						</select>
                    </div>
                </div>
                <?php /* new option Mouse Wheel Zoom added to form */ ?>
				<div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Mouse Wheel Zoom','cardozatagcloud');?></label>
						<p><?php _e('Set to "true" to enable zooming the cloud in and out using the mouse wheel or scroll gesture.', 'cardozatagcloud'); ?></p>
						<select class="form-control" name="frm_wheelzoom">
							<option value="false" <?php if($option_value['wheelzoom'] == "false") echo "selected='selected'";?>><?php _e('False','cardozatagcloud');?></option>
							<option value="true" <?php if($option_value['wheelzoom'] == "true") echo "selected='selected'";?>><?php _e('True','cardozatagcloud');?></option>
						</select>
                    </div>
                </div>
                <?php /* new option Zoom added to form */ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Zoom','cardozatagcloud');?> (% - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
						<p><?php _e('Adjusts the relative size of the tag cloud in the canvas. Larger values will zoom into the cloud, smaller values will zoom out.', 'cardozatagcloud'); ?></p>
                        <input class="form-control" data-validation="number" type="text" name="frm_zoom"  value="<?php echo $option_value['zoom'];?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
        	<!-- Color settings panel -->
            <div class="panel-heading">
                <label><?php _e('Color Settings (Hex value)','cardozatagcloud');?></label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Background Color','cardozatagcloud');?> (# - <?php _e('Enter only alphanumeric', 'cardozatagcloud');?>)</label>
                        <input class="form-control" data-validation="alphanumeric" type="text" name="frm_bg_color"  value="<?php echo $option_value['bg_color'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Text Color','cardozatagcloud');?> (# - <?php _e('Enter only alphanumeric', 'cardozatagcloud');?>)</label>
                        <input class="form-control" data-validation="alphanumeric" type="text" name="frm_txt_color"  value="<?php echo $option_value['txt_color'];?>"/>
                    </div>
                </div>
                <?php /* new option Outline Color added to form */ ?>
				<div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Outline Color','cardozatagcloud');?> (# - <?php _e('Enter only alphanumeric', 'cardozatagcloud'); ?>)</label>
                        <input class="form-control" data-validation="alphanumeric" type="text" name="frm_outline_color"  value="<?php echo $option_value['outline_color'];?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
        	<!-- Font settings panel -->
            <div class="panel-heading">
                <label><?php _e('Font Settings','cardozatagcloud');?></label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Select the font','cardozatagcloud');?></label>
                        <select class="form-control" name="frm_font_name">
                            <option value="Default" <?php if($option_value['font_name'] == "Default") echo "selected='selected'";?>>Default</option>
                            <option value="Arial" <?php if($option_value['font_name'] == "Arial") echo "selected='selected'";?>>Arial</option>
                            <option value="Calibri" <?php if($option_value['font_name'] == "Calibri") echo "selected='selected'";?>>Calibri</option>
                            <option value="Helvetica" <?php if($option_value['font_name'] == "Helvetica") echo "selected='selected'";?>>Helvetica</option>
                            <option value="sans-serif" <?php if($option_value['font_name'] == "Sans-serif") echo "selected='selected'";?>>Sans-serif</option>
                            <option value="Tahoma" <?php if($option_value['font_name'] == "Tahoma") echo "selected='selected'";?>>Tahoma</option>
                            <option value="Times New Roman" <?php if($option_value['font_name'] == "Times New Roman") echo "selected='selected'";?>>Times New Roman</option>
                            <option value="Verdana" <?php if($option_value['font_name'] == "Verdana") echo "selected='selected'";?>>Verdana</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Maximum font size','cardozatagcloud');?> (px - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
                        <input class="form-control" data-validation="number" type="text" name="frm_max_font_size"  value="<?php echo $option_value['max_font_size'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Minimum font size','cardozatagcloud');?> (px - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
                        <input class="form-control" data-validation="number" type="text" name="frm_min_font_size"  value="<?php echo $option_value['min_font_size'];?>"/>
                    </div>
                </div>
                <?php /* new option Outline increase size added to form */ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <label><?php _e('Outline increase size','cardozatagcloud');?> (px - <?php _e('Enter only number', 'cardozatagcloud');?>)</label>
						<p><?php _e('Number of pixels to increase size of tag by for the "size" outline method. Negative values are supported for decreasing the size.', 'cardozatagcloud'); ?></p>
                        <input class="form-control" data-validation="number" data-validation-allowing="negative" type="text" name="frm_outline_increase"  value="<?php echo $option_value['outline_increase'];?>"/>
                    </div>
                </div>
            </div>
        </div>
        <input class="btn btn-success" type="submit" name="frm_submit" value="<?php _e('Save','cardozatagcloud');?>"/>
    </form>
</div>
<?php
function inputSanitize($string){
    $string = esc_sql($string);
    $string = strip_tags($string);
    return $string;
}
?>
