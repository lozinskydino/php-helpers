<?php
	//Config to create custom Post Type
	$singular = "Empreendimento";
	$plural = "Empreendimentos";
	$slug_singular = sanitize_title($singular);
	$slug_plural = sanitize_title($plural);

	$labels = array(
		'name' => ''.$plural,
		'singular_name' => $singular,
		'add_new' => 'Adicionar novo',
		'add_new_item' => 'Adicionar novo '.$singular,
		'edit_item' => 'Editar '.$singular,
		'new_item' => 'Novo '.$singular,
		'all_items' => 'Todos os '.$plural,
		'view_item' => 'Ver '.$singular,
		'search_items' => 'Pesquisar '.$singular,
		'not_found' =>  'Nenhum '.$singular.' encontrado',
		'not_found_in_trash' => 'Nenhum '.$singular.' encontrado no lixo',
		'parent_item_colon' => $singular.' pai',
		'menu_name' => $plural
	);
	$args = array(
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 25,
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'hierarchical' => false,
		'supports' => array(
			'title'
		),
		'featured_image' => 'true',
		'has_archive' => true,
		'rewrite' => array(
			'slug' => $slug_singular,
			'with_front' => false,
			'feeds' => true,
			'pages' => true,
		),
		'query_var' => $slug_plural,
		'can_export' => true,
		'show_in_nav_menus' => false,
		'capability_type' => 'post',
	);

	register_post_type($slug_singular,$args);
	
	//Create Taxonomy(Category) to the post type above
	register_taxonomy(
		"categorias_".$slug_singular,
		array($slug_singular),
		array(
			"public" => true,
			"show_in_nav_menus" => true,
			"show_ui" => true,
			'show_in_quick_edit'         => false,
			'meta_box_cb'                => false,
			"show_tagcloud" => false,
			"hierarchical" => true,
			"label" => "Categorias",
			"singular_label" => "Categoria",
			"query_var" => "categorias_".$slug_singular,
			"rewrite" => array(
				"slug" => "categorias_".$slug_singular,
				"with_front" => false,
				"hierarchical" => true
			)
		)
	);

	flush_rewrite_rules();


?>
