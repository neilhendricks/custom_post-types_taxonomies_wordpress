//add_action is a hook that runs when an event(action) is running in wordpress. 
add_action( 'init', 'create_Products_post_type' );

function create_products_post_type() {

register_post_type( 'Products',

array(

    'labels' => array(

        'name' => _x( 'Products', 'post type general name', 'Products' ),

        'singular_name' => __( 'Products', 'post type singular name', 'Products' ),

        'add_new' => _x('Add New Product', 'products', 'Products' ),

        'add_new_item' => __('Add New', 'Products' ),

        'edit_item' => __('Edit', 'Products' ),

        'new_item' => __('New', 'Products' ),

        'all_items' => __('View Products'),

        'view_item' => __('View', 'Products' ),

        'search_items' => __('Search', 'Products' ),

        'not_found' =>  __('No post found', 'Products' ),

        'not_found_in_trash' => __('No post found in Trash', 'Products' ), 

        'parent_item_colon' => '',

        'menu_name' => _x( 'Products', 'Products' ),

    ),

    'public' => true,
	'hierarchical' => false, //set false to make custom post type to act as post, set true to act like page
    'has_archive' => 'Products',

	//'rewrite' => true,
	'rewrite' => array('slug' => 'products'),
	'show_in_rest' => true,
    'supports' => array('editor', 'title','editor','thumbnail','page-attributes','comments', 'custom-fields'),


));
flush_rewrite_rules();//automatic flushing

//Taxonomy doesn't work if Second parameter ('products') is capital ("Products")!!?!!
register_taxonomy('products_category','products',

array(

    'hierarchical' => false, //Set false to make it a category. Set true to to make it a tag

    'labels' => array(

        'name' => _x( 'Product Categories', 'taxonomy general name', 'livepulse' ),

        'singular_name' => _x( 'products', 'taxonomy singular name', 'livepulse' ),

        'search_items' =>  __( 'Search products', 'livepulse' ),

        'popular_items' => __( 'Popular products', 'livepulse' ),

        'all_items' => __( 'All Categories', 'livepulse' ),

        'parent_item' => null,

        'parent_item_colon' => null,

        'edit_item' => __( 'Edit products', 'livepulse' ), 

        'update_item' => __( 'Update products', 'livepulse' ),

        'add_new_item' => __( 'Add New Categories', 'livepulse' ),

        'new_item_name' => __( 'New products Name', 'livepulse' ),

        'separate_items_with_commas' => __( 'Separate products with commas', 'livepulse' ),

        'add_or_remove_items' => __( 'Add or remove products', 'livepulse' ),

		'choose_from_most_used' => __( 'Choose from the most used products', 'livepulse' ),
		
		//'meta_box_cb'                => 'drop_cat',

    ),

    'hierarchical' => true,
	'show_in_rest' => true,
   'supports' => array('editor'),
    'query_var' => true,
    'rewrite' => array('slug' => 'productsascategory'),
)

);
flush_rewrite_rules();
