<?php
/*
Plugin Name: Quick Press Widget
Plugin URI: http://dreamcolor.net/2008/12/quick-press-widget/
Description: Quick Press a post in frontend. It make you easy to post aside or a simple post without login to backend.
Version: 1.2
Author: Dreamcolor
Author URI: http://dreamcolor.net/
*/

/*
	This is a WordPress plugin (http://wordpress.org) and widget (http://automattic.com/code/widgets/).
*/

/*
    Copyright 2008  Dreamcolor  (email : dreamcolor@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function widget_QPW_init()
{
    if (!function_exists('register_sidebar_widget') || !function_exists('register_widget_control'))
        return;

    function widget_QPW($args)
    {
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'post' ) {
	if ( ! is_user_logged_in() )
		auth_redirect();

	if( !current_user_can( 'publish_posts' ) ) {
		wp_redirect( get_bloginfo( 'url' ) . '/' );
		exit;
	}

	check_admin_referer( 'new-post' );

	$user_id		= $current_user->user_id;
	$post_content	= $_POST['posttext'];
	$tags			= $_POST['tags'];

	$char_limit		= 40;
	$post_title		= $_POST['title'];
	$post_name		= $_POST['name'];
	$post_id = wp_insert_post( array(
		'post_author'	=> $user_id,
		'post_title'	=> $post_title,
		'post_content'	=> $post_content,
		'tags_input'	=> $tags,
		'post_status'	=> 'publish'
	) );

}

	if( current_user_can( 'publish_posts' ) ) {
		require_once dirname( __FILE__ ) . '/post-form.php';
}
    }

    // Need to register the widget and the control form.
    register_sidebar_widget(__('Quick Press Widget', 'QPW'), 'widget_QPW');
}

function widget_QPW_deactivate()
{
    delete_option('widget_QPW');
}

register_deactivation_hook(__FILE__, 'widget_QPW_deactivate');
add_action('plugins_loaded', 'widget_QPW_init');

?>