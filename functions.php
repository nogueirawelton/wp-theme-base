<?php 

function load_static() {
  wp_enqueue_script('index-js', get_template_directory_uri() . '/assets/dist/js/index.js');
  wp_enqueue_style('index-css', get_template_directory_uri() . '/assets/dist/css/index.css');
}

add_action('wp_enqueue_scripts', 'load_static');

register_nav_menus(['header_menu' => 'Menu Cabeçalho']);

function custom_post_type_project() {
	register_post_type('project', array( ##Colocar nome da url
		'label' => 'projeto',
        'description' => 'Projeto',
        'menu_position' =>  4,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'query_var' => true,
		'supports' => array('title', 'editor'),

		'labels' => array (
			'name' => 'Projeto',
			'singular_name' => 'Projeto',
			'menu_name' => 'Projeto',
			'add_new' => 'Adicionar Projeto',
			'add_new_item' => 'Adicionar Projeto',
			'edit' => 'Editar',
			'edit_item' => 'Editar Projeto',
			'new_item' => 'Novo Projeto',
			'view' => 'Ver Projeto',
			'view_item' => 'Ver Projeto',
			'search_items' => 'Procurar Projeto',
			'not_found' => 'Nenhum Projeto encontrado',
			'not_found_in_trash' => 'Nenhum Projeto encontrado no Lixo',
		)
	));
}
add_action('init', 'custom_post_type_project');

function my_remove_editor_from_post_type() {
  remove_post_type_support( 'project', 'editor' );
}

add_action('init', 'my_remove_editor_from_post_type');

function my_pagination($wp_query) {
	
	echo paginate_links( array(
			'base' => str_replace( 9999999999999, '%#%', esc_url( get_pagenum_link( 9999999999999 ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'type' => 'list',
			'prev_next' => true,
			'prev_text' => "<img src=" . get_template_directory_uri() . '/assets/src/img/chevron-left.svg' . ">",
			'next_text' => "<img src=" . get_template_directory_uri() . '/assets/src/img/chevron-right.svg' . ">",
			'show_all' => false,
			'mid_size' => false,
			'end_size' => 1
	) );
	}

