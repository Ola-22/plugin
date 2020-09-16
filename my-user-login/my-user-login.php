<?php

/*
Plugin Name: My Custom User Login
version: 1.0
*/

session_start();
include __DIR__ . '/inc/register.php';

$r = new My_Custom_Register();
add_action('init', [$r, 'add_shortcode']);
add_action('admin_post_nopriv_my-custom-register', [$r, 'register']);

function display_user_birthday($user) {
    $birthday = get_user_meta( $user->ID, 'birthday', true );
    printf('<table class="form-table" role="presentation">
	<tbody>

		
<tr>
	<th><label for="first_name">Birthday</label></th>
	<td><input type="date" name="birthday" id="" value="%s" class="regular-text"></td>
</tr>

</tbody></table>', $birthday);
}

add_action( 'edit_user_profile', 'display_user_birthday' );


function update_user_birthday($user_id) {
    if(isset($_POST['birthday'])){
        update_user_meta( $user_id, 'birthday', $_POST['birthday'] );
    }
}

add_action( 'edit_user_profile_update', 'update_user_birthday' );


function display_user_phone($user) {
    $phone = get_user_meta( $user->ID, 'phone', true );
    printf('<table class="form-table" role="presentation">
	<tbody>

		
<tr>
	<th><label for="first_name">Phone</label></th>
	<td><input type="text" name="[phone]" id="" value="%s" class="regular-text"></td>
</tr>

</tbody></table>', $phone);
}

add_action( 'edit_user_profile', 'display_user_phone' );


function update_user_phone($user_id) {
    if(isset($_POST['phone'])){
        update_user_meta( $user_id, 'phone', $_POST['phone'] );
    }
}

add_action( 'edit_user_profile_update', 'update_user_phone' );