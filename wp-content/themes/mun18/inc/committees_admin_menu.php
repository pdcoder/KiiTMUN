<?php 

/*
==========================================
Committees Admin Menu
==========================================
*/

function custom_post_types1(){

    $labels = array(
        'name' => 'Committees',
        'singular_name' => 'Committees',
        'add_new' => 'Add New Committee',
        'all_items' => 'All Committees',
        'add_new_item' => 'Add New Committee',
        'edit_item' => 'Edit Committee',
        'new_item' => 'New Committee',
        'view_item' => 'View Committee',
        'search_item' => 'Search Committee',
        'not_found' => 'No Committeess Found',
        'not_found_in_trash' => 'No Committees in Trash',
        'parent_item_colon' => 'Parent Committee'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail'
        ),
        'menu_position' => 5,
        'exclude_from_search' => true
    );

    register_post_type('committee', $args);
    flush_rewrite_rules( true );
    
}

add_action('init', 'custom_post_types1');



function add_custom_metabox(){
	add_meta_box('countries_meta', 'Country Matrix', 'meta_countries_add_to_committee', 'committee', 'normal', 'core');
}

add_action('add_meta_boxes', 'add_custom_metabox');

function meta_countries_add_to_committee( $post ){

	wp_nonce_field(basename(__FILE__), 'dwwp_countries_for_committees_nonce');
	$dwwp_stored_meta = get_post_meta($post->ID);
	?>
	<div class="meta-th">
		<div class="meta-th">
			<span>Country Matrix</span>
		</div>
		<div class="meta-editor"></div>
		<br/>
		<?php
		$content = get_post_meta($post->ID, 'country-list', true);

		$args = array('posts_per_page' => -1, 'post_type' => 'country');
		$query = new Wp_Query( $args );

		if ($query -> have_posts()):
			while ($query -> have_posts()): $query-> the_post(); ?>

			<input type="checkbox" name="countrylist[]" value="<?php echo get_the_title(); ?>" <?php if (stripos($content, get_the_title()) !== false ){echo 'checked'; }  ?> ><?php echo get_the_title(); ?><br/>

			<?php 
			endwhile;
		endif;
		?>
	</div>

<?php }

function dwwp_meta_save($post_id){
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['dwwp_countries_for_committees_nonce']) && wp_verify_nonce($_POST['dwwp_countries_for_committees_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	if ($is_autosave || $is_revision || !$is_valid_nonce){
		return;
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (!isset($_POST['countrylist'])){
			return;
		}
		$countrylist = implode(",", $_POST['countrylist']);
		if ($countrylist === ''){
			$countrylist = " None ";
		}
		update_post_meta($post_id, 'country-list', $countrylist);
	}
}
add_action('save_post', 'dwwp_meta_save');