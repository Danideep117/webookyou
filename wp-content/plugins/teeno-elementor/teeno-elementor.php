<?php
/**
 * Plugin Name: Teeno Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://shtheme.com/
 * Version:     1.0.0
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://shtheme.com
 * Text Domain: bdevs-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bdevs Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class BdevsElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var BdevsElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return BdevsElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'bdevs-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Teeno Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Teeno Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Teeno Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('bdevs-elementor',
	      	array(
					'title' => __( 'Teeno Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('blog-elementor',
	      	array(
					'title' => __( 'Blog Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home1-elementor',
	      	array(
					'title' => __( 'Home1 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home2-elementor',
	      	array(
					'title' => __( 'Home2 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home3-elementor',
	      	array(
					'title' => __( 'Home3 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home4-elementor',
	      	array(
					'title' => __( 'Home4 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home5-elementor',
	      	array(
					'title' => __( 'Home5 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home6-elementor',
	      	array(
					'title' => __( 'Home6 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home7-elementor',
	      	array(
					'title' => __( 'Home7 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}
	

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/bdevs-elementor.js', array( 'jquery' ), self::VERSION );
	}


	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/bdevs-elementor.css', self::VERSION );
	}






	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() { 

		// Include Blog Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/title-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/blog-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/newsletter-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/testimonial-blog-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/coming-soon-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/terms-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/signup-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/login-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/contact-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/about-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/feature-home8-widget.php';
		// Register widget

		// Folder Blog 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTitleWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialBlogWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsComingSoonWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTermsWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSignupWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsLoginWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeatureHome8Widget() );


		// Include Home1 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/home-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/counter-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/choose-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/about-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/feature-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/screenshot-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/pricing-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/testimonial-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/faq-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/blog-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home1/newsletter-home1-widget.php';
		// Register widget

		// Folder Home1 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsHomeWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsCounterWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsChooseWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome1Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeatureWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFaqWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome1Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterHome1Widget() );




		// Include Home2 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/brand-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/choose-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/about-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/screenshot-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/testimonial-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/pricing-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/blog-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/newsletter-home2-widget.php';
		// Register widget

		// Folder Home2 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsChooseHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome2Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterHome2Widget() );



		// Include Home3 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/slider-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/counter-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/choose-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/about-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/screenshot-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/pricing-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/blog-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/newsletter-home3-widget.php';
		// Register widget

		// Folder Home3 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsCounterHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsChooseHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome3Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterHome3Widget() );



		// Include Home4 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/slider-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/work-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/choose-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/about-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/screenshot-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/testimonial-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/blog-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/newsletter-home4-widget.php';
		// Register widget

		// Folder Home4 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsWorkHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsChooseHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome4Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterHome4Widget() );



		// Include Home5 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/slider-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/about-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/video-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/feature-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/screenshot-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/testimonial-pricing-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/team-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/blog-home5-widget.php';
		// Register widget

		// Folder Home5 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideoHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeatureHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialPricingHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome5Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome5Widget() );




		// Include Home6 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/slider-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/about-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/video-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/feature-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/screenshot-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/testimonial-pricing-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/team-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/blog-home6-widget.php';
		// Register widget

		// Folder Home6 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideoHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeatureHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialPricingHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome6Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome6Widget() );




		// Include Home7 Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/slider-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/feature-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/overview-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/pricing-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/testimonial-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/screenshot-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/team-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/blog-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/newsletter-home7-widget.php';
		// Register widget

		// Folder Home7 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeatureHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsOverviewHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsScreenshotHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome7Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewsletterHome7Widget() );




		

		}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

BdevsElementor::instance();
