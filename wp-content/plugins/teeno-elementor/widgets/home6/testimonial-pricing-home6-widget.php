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
class BdevsTestimonialPricingHome6Widget extends \Elementor\Widget_Base {

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
		return 'bdevs-testimonial-pricing-home6-widget';
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
		return __( 'Testimonial Pricing Home6 Widget ', 'bdevs-elementor' );
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
		return [ 'home6-elementor' ];
	}

	public function get_keywords() {
		return [ 'testimonialpricinghome6widget', 'carousel' ];
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
			'section_content_home6_widget',
			[
				'label' => esc_html__( 'Testimonial Pricing Home6 Widget', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Testimonial Home6 Widget Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'image',
						'label'       => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'name',
						'label'       => esc_html__( 'Name', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'job',
						'label'       => esc_html__( 'Job', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->add_control(
			'big_image',
			[
				'label'       => esc_html__( 'Big Image Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'Pricing Home6 Widget Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'time',
						'label'       => esc_html__( 'Time', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'list_item',
						'label'       => esc_html__( 'List Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'link_btn',
						'label'       => esc_html__( 'Link Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'btn',
						'label'       => esc_html__( 'Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->add_control(
			'tabs3',
			[
				'label' => esc_html__( 'Pricing Home6 Widget Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'time',
						'label'       => esc_html__( 'Time', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'list_item',
						'label'       => esc_html__( 'List Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'link_btn',
						'label'       => esc_html__( 'Link Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'btn',
						'label'       => esc_html__( 'Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->add_control(
			'pricing_image',
			[
				'label'       => esc_html__( 'Pricing Image Section', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload image section', 'bdevs-elementor' ),
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
<div class="testimonial-pricing-area">
    <!-- Testimonial-area start -->
    <section class="testimonial-area testimonial-2 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title color-white mb-15"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <p class="text color-white"><?php echo wp_kses_post($settings['subtitle']); ?></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper" id="testimonial-slider-3">
                        <div class="swiper-wrapper">
                        	<?php
							   $idd = 0;
							   foreach ( $settings['tabs'] as $item ) :
							   $idd++;
							?>
	                            <div class="swiper-slide">
	                                <div class="slider-item">
	                                    <div class="quote bg-white">
	                                        <p class="text font-lg">
	                                            <?php echo wp_kses_post($item['title']); ?>
	                                        </p>
	                                    </div>
	                                    <div class="client-info mt-20">
	                                        <div class="client-img lazy-container rounded-pill ratio ratio-1-1">
	                                            <img class="lazyload" data-src="<?php echo esc_url($item['image']['url']); ?>" alt="Image">
	                                        </div>
	                                        <div class="content">
	                                            <h6 class="name mb-2 color-white"><?php echo wp_kses_post($item['name']); ?></h6>
	                                            <span class="designation font-sm color-white"><?php echo wp_kses_post($item['job']); ?></span>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="shape-one bg-img" data-bg-image="<?php echo esc_url($settings['big_image']['url']); ?>"></div>
    </section>
    <!-- Testimonial-area end -->

    <!-- Pricing-area start -->
    <section class="pricing-area pricing-3 pt-60 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-15"><?php echo wp_kses_post($settings['heading']); ?></h2>
                        <p class="text">
                            <?php echo wp_kses_post($settings['subheading']); ?>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="monthly">
                            <div class="row justify-content-center">
                            	<?php
								   $idd = 0;
								   foreach ( $settings['tabs2'] as $item ) :
								   $idd++;
								?>
	                                <div class="col-md-6 col-lg-4 item" data-aos="fade-up">
	                                    <div class="pricing-item text-center mb-30 bg-white shadow-md radius-md">
	                                        <div class="pricing-header justify-content-center">
	                                            <?php echo wp_kses_post($item['title']); ?>
	                                        </div>
	                                        <div class="price mt-15">
	                                            <span class="h3 mb-0"><?php echo wp_kses_post($item['number']); ?></span>
	                                            <span class="period"><?php echo wp_kses_post($item['time']); ?></span>
	                                        </div>
	                                        <ul class="pricing-list list-unstyled mt-25" data-toggle-show="5">
	                                            <?php echo wp_kses_post($item['list_item']); ?>
	                                        </ul>
	                                        <div class="mt-30">
	                                            <a href="<?php echo wp_kses_post($item['link_btn']); ?>" class="btn btn-lg btn-primary bg-secondary rounded-pill" title="Choose" target="_self"><?php echo wp_kses_post($item['btn']); ?></a>
	                                        </div>
	                                    </div>
	                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="yearly">
                            <div class="row justify-content-center">
                            	<?php
								   $idd = 0;
								   foreach ( $settings['tabs3'] as $item ) :
								   $idd++;
								?>
	                                <div class="col-md-6 col-lg-4 item" data-aos="fade-up">
	                                    <div class="pricing-item text-center mb-30 bg-white shadow-md radius-md">
	                                        <div class="pricing-header justify-content-center">
	                                            <?php echo wp_kses_post($item['title']); ?>
	                                        </div>
	                                        <div class="price mt-15">
	                                            <span class="h3 mb-0"><?php echo wp_kses_post($item['number']); ?></span>
	                                            <span class="period"><?php echo wp_kses_post($item['time']); ?></span>
	                                        </div>
	                                        <ul class="pricing-list list-unstyled mt-25" data-toggle-show="5">
	                                            <?php echo wp_kses_post($item['list_item']); ?>
	                                        </ul>
	                                        <div class="mt-30">
	                                            <a href="<?php echo wp_kses_post($item['link_btn']); ?>" class="btn btn-lg btn-primary bg-secondary rounded-pill" title="Choose" target="_self"><?php echo wp_kses_post($item['btn']); ?></a>
	                                        </div>
	                                    </div>
	                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing-area end -->
    <div class="shape-two bg-img" data-bg-image="<?php echo esc_url($settings['pricing_image']['url']); ?>"></div>
</div>



<?php
if (is_admin()) { ?>
  <script type="text/javascript">
   var testimonialSlider3 = new Swiper("#testimonial-slider-3", {
        speed: 1200,
        spaceBetween: 0,
        loop: true,
        slidesPerView: 3,
        pagination: true,
        autoplay: true,
        centeredSlides: true,

        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2
            },
            // when window width is >= 768px
            992: {
                slidesPerView: 3
            },
        }
    })
  </script>
<?php } ?>
<?php
}

}