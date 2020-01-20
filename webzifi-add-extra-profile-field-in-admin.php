<?php
/*
Plugin Name: 	Webzifi_add_extra_profile_field_in_admin
Plugin URI:		https://wordpress.org/plugins/webzifi-add-extra-profile-field-in-admin/
Description: 	Add Extra Profile Field In Admin.
Version: 		1.0
Author:			Akagha Chinaka
Author URI: 	http://chinaka.com
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) )
	exit;

add_action('show_user_profile', 'display_extra_profile_fields');
add_action('personal_options_update','save_extra_profile_fields');

function display_extra_profile_fields($user){ ?>

<h3>Employee Information</h3>

<table class="form-table">

<tr>
<th><label for="jobtitle">Job Title</lable></th>
<td>
<input type="text" name="jobtitle" id="jobtitle" value="<?php echo esc_attr(get_the_author_meta('jobtitle', $user->ID));?>" class="regular-text">
<span class="description">Please enter your title.</span>
</td>
</tr>

<tr>
<th><lable for="Yearsexperience">Years of Experience</lable></th>
<td>
<input type="text" name="yearsexperience" id="Yearsexperience" value="<?php echo esc_attr(get_the_author_meta('yearsexperience', $user->ID));?>" class="regular-text">
<span class="description">Enter a number.</span>
</td>
</tr>

</table>

<?php
}

function save_extra_profile_fields($user_id){

	if(!current_user_can('edit_user', $user_id))
	return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter to the field id*/
	update_user_meta($user_id,'jobtitle', $_POST['jobtitle']);
	update_user_meta($user_id, 'yearsexperience', $_POST['yearsexperience']);
}