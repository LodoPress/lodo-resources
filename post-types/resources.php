<?php

function resources_init() {
	register_post_type( 'resources', array(
		'labels'            => array(
			'name'                => __( 'Resources', 'lodo-resources' ),
			'singular_name'       => __( 'Resource', 'lodo-resources' ),
			'all_items'           => __( 'All Resources', 'lodo-resources' ),
			'new_item'            => __( 'New Resource', 'lodo-resources' ),
			'add_new'             => __( 'Add New Resource', 'lodo-resources' ),
			'add_new_item'        => __( 'Add New Resource', 'lodo-resources' ),
			'edit_item'           => __( 'Edit Resource', 'lodo-resources' ),
			'view_item'           => __( 'View Resource', 'lodo-resources' ),
			'search_items'        => __( 'Search Resources', 'lodo-resources' ),
			'not_found'           => __( 'No Resources Found', 'lodo-resources' ),
			'not_found_in_trash'  => __( 'No Resources Found in Trash', 'lodo-resources' ),
			'parent_item_colon'   => __( 'Parent Resources', 'lodo-resources' ),
			'menu_name'           => __( 'Resources', 'lodo-resources' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-index-card',
		'show_in_rest'      => true,
		'rest_base'         => 'resources',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'resources_init' );

function resources_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['resources'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Resources updated. <a target="_blank" href="%s">View Resources</a>', 'lodo-resources'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'lodo-resources'),
		3 => __('Custom field deleted.', 'lodo-resources'),
		4 => __('Resources updated.', 'lodo-resources'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Resources restored to revision from %s', 'lodo-resources'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Resources published. <a href="%s">View Resources</a>', 'lodo-resources'), esc_url( $permalink ) ),
		7 => __('Resources saved.', 'lodo-resources'),
		8 => sprintf( __('Resources submitted. <a target="_blank" href="%s">Preview Resource</a>', 'lodo-resources'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Resources scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resource</a>', 'lodo-resources'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Resources draft updated. <a target="_blank" href="%s">Preview Resource</a>', 'lodo-resources'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'resources_updated_messages' );
