<?php
// Modal popup mapping
add_action('wp_ajax_increase_imagemap_building_modal_open', 'increase_imagemap_building_modal_open');
add_action('wp_ajax_nopriv_increase_imagemap_building_modal_open', 'increase_imagemap_building_modal_open');
function increase_imagemap_building_modal_open() {
	ob_start();
	$termId = sanitize_text_field($_POST['post_id']);
	$termTax = get_term($termId)->taxonomy;
	$termName = get_term($termId)->name;
	$termSlug = get_term($termId)->slug;
	$termParent = get_term($termId)->parent;
	
	include(locate_template('templates/imagemap/imagemap-building-modal-content.php'));
	
	$modal_content = ob_get_clean();
	
	$return = array(
		'content' => $modal_content,
	
	);
	
	wp_send_json($return);
	
	wp_die();
}