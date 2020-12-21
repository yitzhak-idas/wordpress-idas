<?php

/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ($template) {
			return dirname(get_stylesheet_directory()) . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('../views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site
{
	/** Add timber support. */
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
		// Register Custom Navigation Walker
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		register_nav_menus(array(
			'primary' => __('Menú Principal'),
		));
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types()
	{
		$labels = array(
			'name'                  => _x('Proyectos', 'Post Type General Name', 'idas'),
			'singular_name'         => _x('Proyecto', 'Post Type Singular Name', 'idas'),
			'menu_name'             => __('Proyectos', 'idas'),
			'name_admin_bar'        => __('Post Type', 'idas'),
			'archives'              => __('Item Archives', 'idas'),
			'attributes'            => __('Item Attributes', 'idas'),
			'parent_item_colon'     => __('Parent Item:', 'idas'),
			'all_items'             => __('All Items', 'idas'),
			'add_new_item'          => __('Add New Item', 'idas'),
			'add_new'               => __('Add New', 'idas'),
			'new_item'              => __('New Item', 'idas'),
			'edit_item'             => __('Edit Item', 'idas'),
			'update_item'           => __('Update Item', 'idas'),
			'view_item'             => __('View Item', 'idas'),
			'view_items'            => __('View Items', 'idas'),
			'search_items'          => __('Search Item', 'idas'),
			'not_found'             => __('Not found', 'idas'),
			'not_found_in_trash'    => __('Not found in Trash', 'idas'),
			'featured_image'        => __('Featured Image', 'idas'),
			'set_featured_image'    => __('Set featured image', 'idas'),
			'remove_featured_image' => __('Remove featured image', 'idas'),
			'use_featured_image'    => __('Use as featured image', 'idas'),
			'insert_into_item'      => __('Insert into item', 'idas'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'idas'),
			'items_list'            => __('Items list', 'idas'),
			'items_list_navigation' => __('Items list navigation', 'idas'),
			'filter_items_list'     => __('Filter items list', 'idas'),
		);
		$args = array(
			'label'                 => __('Proyecto', 'idas'),
			'description'           => __('Post Type Description', 'idas'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields', 'author'),
			'taxonomies'            => array('post-type','category'),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'menu_icon' => 'dashicons-welcome-widgets-menus'
		);
		register_post_type('proyecto', $args);

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies()
	{
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context($context)
	{
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();

		$context['options'] = get_fields('options');
		
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support('menus');
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo($text)
	{
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig($twig)
	{
		$twig->addExtension(new Twig\Extension\StringLoaderExtension());
		$twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));

		$function = new Twig_SimpleFunction('primary_menu', function () {
			return wp_nav_menu(array(
				'depth'             => 4,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'menu_class'        => 'nav navbar-nav navbar-item nav-link divider-menus',
				'container_id'      => 'navbarNav',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker()
			));
		});
		$twig->addFunction($function);

		return $twig;
	}
}

new StarterSite();


// Enqueue scripts
function my_scripts()
{


	$cssVersion = filemtime(get_stylesheet_directory() . '/css/main.css');
	wp_enqueue_style('si-styles', get_stylesheet_directory_uri() . '/css/main.css', array(), $cssVersion);

	wp_enqueue_style('swiper-styles', get_stylesheet_directory_uri() . '/css/main.css', array(), $cssVersion);

	$jsVersion = filemtime(get_stylesheet_directory() . '/js/main.js');

	wp_enqueue_script('jspopper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), false, true);

	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), false, true);

	wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), false, true);

	wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array('jspopper', 'bootstrap', 'jquery', 'swiper'), $jsVersion, true);
}

add_action('wp_enqueue_scripts', 'my_scripts');




function prefix_modify_nav_menu_args($args)
{
	return array_merge($args, array(
		'walker' => new WP_Bootstrap_Navwalker(),
	));
}
add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Opciones I&V ',
		'menu_title'	=> 'Opciones I&V',
		'menu_slug' 	=> 'iv-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

