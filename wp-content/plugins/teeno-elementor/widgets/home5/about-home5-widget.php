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
class BdevsAboutHome5Widget extends \Elementor\Widget_Base {

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
		return 'bdevs-about-home5-widget';
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
		return __( 'About Home5 Widget ', 'bdevs-elementor' );
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
		return [ 'home5-elementor' ];
	}

	public function get_keywords() {
		return [ 'abouthome5widget', 'carousel' ];
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
			'section_content_home5_widget',
			[
				'label' => esc_html__( 'About Home5 Widget', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'image1',
			[
				'label'       => esc_html__( 'Image 1 Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle1',
			[
				'label'       => __( 'Subtitle 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'link_btn1',
			[
				'label'       => __( 'Link Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'button1',
			[
				'label'       => __( 'Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'image2',
			[
				'label'       => esc_html__( 'Image 2 Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle2',
			[
				'label'       => __( 'Subtitle 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'link_btn2',
			[
				'label'       => __( 'Link Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'button2',
			[
				'label'       => __( 'Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
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
<section class="about-area about-4 pt-120">
    <div class="container">
        <div class="row align-items-center pb-80 justify-content-between gx-xl-5">
            <div class="col-xl-6 col-lg-6" data-aos="fade-up">
                <div class="image mb-40">
                    <img class="lazyload blur-up js-tilt" data-src="<?php echo esc_url($settings['image1']['url']); ?>" alt="Image">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 order-lg-first" data-aos="fade-up">
                <div class="content-title mb-40">
					<span class="icon"><i class="fas fa-cog"></i></span>
					<h2 class="title mb-30 mt-20"><?php echo wp_kses_post($settings['title1']); ?></h2>
                    <div class="content-text">
                        <p>
                            <?php echo wp_kses_post($settings['subtitle1']); ?>
                        </p>
                    </div>
                    <div class="btn-groups mt-30" data-aos="fade-up">
                        <a href="<?php echo wp_kses_post($settings['link_btn1']); ?>" class="btn btn-lg btn-primary bg-secondary rounded-pill" title="Learn More" target="_self"><?php echo wp_kses_post($settings['button1']); ?></a>
                    </div>
				</div>
            </div>
        </div>
        <div class="row align-items-center pb-80 justify-content-between gx-xl-5">
            <div class="col-xl-6 col-lg-6" data-aos="fade-up">
                <div class="image mb-40">
                    <img class="lazyload blur-up js-tilt" data-src="<?php echo esc_url($settings['image2']['url']); ?>" alt="Image">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6" data-aos="fade-up">
                <div class="content-title mb-40">
					<span class="icon"><i class="fas fa-comments"></i></span>
					<h2 class="title mb-30 mt-20"><?php echo wp_kses_post($settings['title2']); ?></h2>
                    <div class="content-text">
                        <p>
                            <?php echo wp_kses_post($settings['subtitle2']); ?>
                        </p>
                    </div>
                    <div class="btn-groups mt-30" data-aos="fade-up">
                        <a href="<?php echo wp_kses_post($settings['link_btn2']); ?>" class="btn btn-lg btn-primary bg-secondary rounded-pill" title="Learn More" target="_self"><?php echo wp_kses_post($settings['button2']); ?></a>
                    </div>
				</div>
            </div>
        </div>
    </div>
</section>
<?php
}

}