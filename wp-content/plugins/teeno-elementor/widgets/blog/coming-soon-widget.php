<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsComingSoonWidget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-coming-soon-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Coming Soon Widget ', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-info-circle';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'blog-elementor' ];
	}

	public function get_keywords() {
		return [ 'comingsoonwidget', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
		$position_options = [
			''              => esc_html__('Default', 'bdevs-elementor'),
			'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
			'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
			'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
			'center'        => esc_html__('Center', 'bdevs-elementor') ,
			'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
			'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
			'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
			'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') , 
			'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
		];

		return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_coming_soon_widget',
			[
				'label' => esc_html__( 'Coming Soon Widget', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'link_home',
			[
				'label'       => __( 'Link Home', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'logo_home',
			[
				'label'       => esc_html__( 'Image Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your icon', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Latest Blogs', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Blogs', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'timer',
			[
				'label'       => __( 'Timer', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Blogs', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
            'shortcode',
            [
                'label'       => __( 'shortcode', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( '', 'bdevs-elementor' ),
                'default'     => __( '', 'bdevs-elementor' ),
                'label_block' => true,
            ]   
        );
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);



		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?>
<div class="coming-soon-area bg-light">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-12">
                <div class="wrapper shadow-md radius-lg bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-6 bg-primary-light">
                            <div class="content">
                                <div class="logo mb-3 p-30">
                                    <a href="<?php echo wp_kses_post($settings['link_home']); ?>" target="_self" title="Teeno">
                                        <img src="<?php echo esc_url($settings['logo_home']['url']); ?>" alt="Logo">
                                    </a>
                                </div>
                                <div class="svg-image">
                                    <img class="lazyload" data-src="<?php echo esc_url($settings['image']['url']); ?>" alt="Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-form">
                                <a href="<?php echo wp_kses_post($settings['link_home']); ?>" class="icon-link" title="Go back to home" target="_self"><i class="<?php echo wp_kses_post($settings['icon']); ?>"></i></a>
                                <div class="title mb-30">
                                    <h3 class="mb-15"><?php echo wp_kses_post($settings['title']); ?></h3>
                                    <p class="text"><?php echo wp_kses_post($settings['subtitle']); ?></p>
                                </div>
                                <div id="timer" class="timer mb-30">
                                    <?php echo wp_kses_post($settings['timer']); ?>
                                </div>
                                <div class="newsletter-form">
                                    
                                    <?php echo do_shortcode($settings['shortcode']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}

}