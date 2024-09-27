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
class BdevsChooseWidget extends \Elementor\Widget_Base {

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
		return 'bdevs-choose-widget';
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
		return __( 'Choose Widget ', 'bdevs-elementor' );
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
		return [ 'home1-elementor' ];
	}

	public function get_keywords() {
		return [ 'choosewidget', 'carousel' ];
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
			'section_content_choose_widget',
			[
				'label' => esc_html__( 'Choose Widget', 'bdevs-elementor' ),
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
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Why You Choose Our App', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'The Most Effective App for Your Future Projects', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your description', 'bdevs-elementor' ),
				'default'     => __( 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium doloremque laudantium, totam rem aperiam, eaque ipsa quae.', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Choose Widget Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
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
			'btn1',
			[
				'label'       => __( 'Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Download App', 'bdevs-elementor' ),
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
			'btn2',
			[
				'label'       => __( 'Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Video Tutorial', 'bdevs-elementor' ),
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
<section class="choose-area choose-1 ptb-60">
    <div class="container">
        <div class="row align-items-center gx-xl-5">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="image mb-40">
                    <img class="lazyload blur-up js-tilt" data-src="<?php echo esc_url($settings['image']['url']); ?>" alt="Image">
                </div>
            </div>
            <div class="col-lg-6 order-lg-first" data-aos="fade-up">
                <div class="content-title mb-40">
                    <span class="subtitle color-primary"><?php echo wp_kses_post($settings['title']); ?></span>
                    <h2 class="title mb-30 mt-0">
                        <?php echo wp_kses_post($settings['subtitle']); ?>
                    </h2>
                    <div class="content-text">
                        <p>
                            <?php echo wp_kses_post($settings['desc']); ?>
                        </p>
                    </div>
                    <ul class="info-list list-unstyled mt-20">
                    	<?php
						   $idd = 0;
						   foreach ( $settings['tabs'] as $item ) :
						   $idd++;
						?>
	                        <li>
	                            <i class="<?php echo wp_kses_post($item['icon']); ?>"></i>
	                            <?php echo wp_kses_post($item['title']); ?>
	                        </li>
                    	<?php endforeach; ?>
                    </ul>
                    <div class="btn-groups gap-25 mt-40" data-aos="fade-up">
                        <a href="<?php echo wp_kses_post($settings['link_btn1']); ?>" class="btn btn-lg btn-primary" title="Download App" target="_self"><?php echo wp_kses_post($settings['btn1']); ?></a>
                        <a href="<?php echo wp_kses_post($settings['link_btn2']); ?>" class="video-btn video-btn-text video-btn-sm youtube-popup" target="_self" title="Show Video">
                            <i class="fas fa-play"></i>
                            <span><?php echo wp_kses_post($settings['btn2']); ?></span> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

}