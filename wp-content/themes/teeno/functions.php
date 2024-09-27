<?php 
$teeno_redux_demo = get_option('redux_demo');
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
function teeno_theme_setup(){  
/*
 * This theme uses a custom image size for featured images, displayed on
 * "standard" posts and pages.
 */
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	$lang = get_template_directory_uri() . '/languages';
	load_theme_textdomain('teeno', $lang); 
	add_theme_support( 'post-thumbnails' ); 
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	// This theme uses wp_nav_menu() in one location. 
	register_nav_menus( array(
	'primary' 		=>  esc_html__( 'Primary Navigation Menu.', 'teeno' ),
	'primary-left' 		=>  esc_html__( 'Primary Left Navigation Menu.', 'teeno' ),
	'primary-right' 		=>  esc_html__( 'Primary Right Navigation Menu.', 'teeno' ),
	));
}
add_action( 'after_setup_theme', 'teeno_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function teeno_theme_scripts_styles(){
	$teeno_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'googlefonts-1', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/vendors/bootstrap.min.css');
	wp_enqueue_style('all', get_template_directory_uri().'/assets/fonts/fontawesome/css/all.min.css');
	wp_enqueue_style('flaticon', get_template_directory_uri().'/assets/fonts/flaticon/font/flaticon.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/vendors/magnific-popup.min.css');
	wp_enqueue_style('swiper-bundle', get_template_directory_uri().'/assets/css/vendors/swiper-bundle.min.css');
	wp_enqueue_style('nice-select', get_template_directory_uri().'/assets/css/vendors/nice-select.css');
	wp_enqueue_style('aos', get_template_directory_uri().'/assets/css/vendors/aos.min.css');
	wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/vendors/animate.min.css');
	wp_enqueue_style('teeno-style', get_template_directory_uri().'/assets/css/style.css');
	wp_enqueue_style('teeno-responsive', get_template_directory_uri().'/assets/css/responsive.css');
	

	if (is_page_template( 'page-templates/home4-template.php' )  ) {
    wp_enqueue_style('theme-dark', get_template_directory_uri().'/assets/css/theme-dark.css');
    }

	wp_enqueue_style('teeno-css', get_stylesheet_uri(), array(), '2023-11-06');
	

	if(isset($teeno_redux_demo['chosen-color']) && $teeno_redux_demo['chosen-color'] == true){
	wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script('jquery-v3.6.0', get_template_directory_uri().'/assets/js/vendors/jquery.min.js', array(), false, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/vendors/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('jquery-counterup', get_template_directory_uri().'/assets/js/vendors/jquery.counterup.min.js', array(), false, true);
	wp_enqueue_script('jquery-nice-select', get_template_directory_uri().'/assets/js/vendors/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/js/vendors/jquery.magnific-popup.min.js', array(), false, true);
	wp_enqueue_script('swiper-bundle', get_template_directory_uri().'/assets/js/vendors/swiper-bundle.min.js', array(), false, true);
	wp_enqueue_script('lazysizes', get_template_directory_uri().'/assets/js/vendors/lazysizes.min.js', array(), false, true);
	wp_enqueue_script('tweenMax', get_template_directory_uri().'/assets/js/vendors/tweenMax.min.js', array(), false, true);
	wp_enqueue_script('tilt-jquery', get_template_directory_uri().'/assets/js/vendors/tilt.jquery.min.js', array(), false, true);
	wp_enqueue_script('aos', get_template_directory_uri().'/assets/js/vendors/aos.min.js', array(), false, true);
	wp_enqueue_script('teeno-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'teeno_theme_scripts_styles' );
// Widget Sidebar
function teeno_widgets_init() 
{
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'teeno' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'teeno' ),
		'before_widget' => '<div class="Widget widget-search widget-post widget-blog-categories widget-tags widget-social-link mb-30 p-30 border radius-md %2$s">', 
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title mb-15">',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'teeno' ), 
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'teeno' ), 
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'teeno' ), 
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'teeno' ), 
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 5', 'teeno' ), 
		'id'            => 'footer-area-5',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 6', 'teeno' ), 
		'id'            => 'footer-area-6',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 7', 'teeno' ), 
		'id'            => 'footer-area-7',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 8', 'teeno' ), 
		'id'            => 'footer-area-8',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 9', 'teeno' ), 
		'id'            => 'footer-area-9',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 10', 'teeno' ), 
		'id'            => 'footer-area-10',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'teeno' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '', 
		'after_title'   => ''
	) );
}
add_action( 'widgets_init', 'teeno_widgets_init' );
function teeno_search_form( $form ) {
	$form = '
		
			<form>
				<input type="text" name="s" placeholder="'.esc_attr__('Type here ...', 'teeno').'" value="' . get_search_query() . '">
				<button type="submit"><i class="fa fa-search blog_search_icon"></i></button>
			</form>
		
	';
	return $form;
}
add_filter( 'get_search_form', 'teeno_search_form' );
// Comment Form
function teeno_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<?php
	if(get_avatar($comment,$size='100' )!=''){?>
                    <li class="comment">
                        <div class="comment-body">
                            <div class="comment-author">
                                <div class=" lazy-container radius-md ratio ratio-1-1">
                                    <?php echo get_avatar($comment,$size='100' ); ?>
                                </div>
                            </div>
                            <div class="comment-content">
                                <h6 class="name"><?php printf( get_comment_author_link()) ?></h6>
                                <?php comment_text(); ?>
                        		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div>
                        </div>
                    </li>
	        <?php }else{?>
                    <li class="comment">
                        <div class="comment-body">
                            <div class="comment-content">
                                <h6 class="name"><?php printf( get_comment_author_link()) ?></h6>
                                <?php comment_text(); ?>
                        		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div>
                        </div>
                    </li>
	        <?php }?>
<?php
}

function move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom');

function teeno_excerpt_1() {
	$teeno_redux_demo = get_option('redux_demo');
	if(isset($teeno_redux_demo['blog_excerpt'])){
	$limit = $teeno_redux_demo['blog_excerpt'];
	}else{
	$limit = 40;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}


function teeno_excerpt_2() {
	$teeno_redux_demo = get_option('redux_demo');
	if(isset($teeno_redux_demo['service_excerpt'])){
	$limit = $teeno_redux_demo['service_excerpt'];
	}else{
	$limit = 13;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

function teeno_excerpt_3() {
	$teeno_redux_demo = get_option('redux_demo');
	if(isset($teeno_redux_demo['service_excerpt2'])){
	$limit = $teeno_redux_demo['service_excerpt2'];
	}else{
	$limit = 10;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

function teeno_excerpt_4() {
	$teeno_redux_demo = get_option('redux_demo');
	if(isset($teeno_redux_demo['blog_excerpt2'])){
	$limit = $teeno_redux_demo['blog_excerpt2'];
	}else{
	$limit = 8;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

function teeno_excerpt_5() {
	$teeno_redux_demo = get_option('redux_demo');
	if(isset($teeno_redux_demo['service_excerpt'])){
	$limit = $teeno_redux_demo['service_excerpt'];
	}else{
	$limit = 17;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

function teeno_pagination($pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
    'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
    'format'    => '',
    'current'     => max( 1, get_query_var('paged') ),
    'total'     => $pages,
    'prev_text' => wp_specialchars_decode(esc_html__( '<i class = "far fa-angle-left"></i>', 'teeno' ),ENT_QUOTES),
    'next_text' => wp_specialchars_decode(esc_html__( '<i class = "far fa-angle-right"></i>', 'teeno' ),ENT_QUOTES),
    'type'      => 'list',
    'end_size'    => 3,
    'mid_size'    => 3
);
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'teeno_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function teeno_theme_register_required_plugins(){
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => esc_html__( 'One Click Demo Import', 'teeno' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'teeno' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'teeno' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'teeno' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'teeno' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'SVG Support', 'teeno' ),
            'slug'      => 'svg-support',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'teeno' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'teeno' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Teeno Common', 'teeno' ),
            'slug'                     => 'teeno-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/teeno-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Teeno Elementor', 'teeno' ),
            'slug'                     => 'teeno-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/teeno-elementor.zip',
        ),
	);
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'teeno' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'teeno' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'teeno' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'teeno' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'teeno' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'teeno' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'teeno' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'teeno' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'teeno' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'teeno' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'teeno' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'teeno' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'teeno' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'teeno' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'teeno' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'teeno' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'teeno' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);
	tgmpa( $plugins, $config );
}
?>