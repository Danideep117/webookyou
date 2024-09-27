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
class BdevsTestimonialWidget extends \Elementor\Widget_Base {

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
		return 'bdevs-testimonial-widget';
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
		return __( 'Testimonial Widget ', 'bdevs-elementor' );
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
		return [ 'testimonialwidget', 'carousel' ];
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
			'section_content_testimonial_widget',
			[
				'label' => esc_html__( 'Testimonial Widget', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Testimonial', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Testimonial Widget Item', 'bdevs-elementor' ),
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
						'name'        => 'image',
						'label'       => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'Testimonial Widget Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					
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
<section class="testimonial-area testimonial-1 ptb-100 bg-img" data-bg-image="https://shtheme.com/demosd/teeno/wp-content/uploads/2024/01/testimonial-bg-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title title-center mb-50" data-aos="fade-up">
                    <span class="subtitle color-primary"><?php echo wp_kses_post($settings['title']); ?></span>
                    <h2 class="title mt-0"><?php echo wp_kses_post($settings['subtitle']); ?></h2>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-6">
                        <div class="swiper" id="testimonial-slider-1">
                            <div class="swiper-wrapper">
                            	<?php
								   $idd = 0;
								   foreach ( $settings['tabs'] as $item ) :
								   $idd++;
								?>
	                                <div class="swiper-slide pb-25">
	                                    <div class="slider-item text-center">
	                                        <div class="quote">
	                                            <p class="text font-lg mb-0">
	                                                <?php echo wp_kses_post($item['title']); ?>
	                                            </p>
	                                        </div>
	                                        <div class="client-img">
	                                            <div class="lazy-container rounded-pill ratio ratio-1-1">
	                                                <img class="lazyload" data-src="<?php echo esc_url($item['image']['url']); ?>" alt="Person Image">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            <?php endforeach; ?>
                            </div> 
                            <div class="swiper-pagination position-static" id="testimonial-slider-1-pagination"></div>
                        </div>
                        <div class="swiper testimonial-thumb mt-10">
                            <div class="swiper-wrapper">
                            	<?php
								   $idd = 0;
								   foreach ( $settings['tabs2'] as $item ) :
								   $idd++;
								?>
	                                <div class="swiper-slide">
	                                    <div class="slider-item text-center">
	                                        <div class="client-info">
	                                            <h6 class="name mb-1"><?php echo wp_kses_post($item['name']); ?></h6>
	                                            <span class="designation font-sm"><?php echo wp_kses_post($item['job']); ?></span>
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
    </div>
</section>

<?php
if (is_admin()) { ?>
  <script type="text/javascript">
   var testimonialThumb = new Swiper(".testimonial-thumb", {
        speed: 1000,
        loop: false,
        centeredSlides: true,
        slidesPerView: 'auto',
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
    var testimonialSlider1 = new Swiper("#testimonial-slider-1", {
        speed: 1000,
        spaceBetween: 25,
        loop: false,
        slidesPerView: 1,
        slidesPerView: 'auto',
        autoplay: true,

        pagination: {
            el: '#testimonial-slider-1-pagination',
            bulletClass: 'custom-image-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                var images = [];
                $("#testimonial-slider-1 .swiper-slide").each(function () {
                    var attr = $(this).find('img').attr('data-src');
                    images.push(attr);
                });
                return '<img class="' + className + '" src="' + images[index] + '" alt="Demo Image">';
            },
        },
    });
  </script>
<?php } ?>
<?php
}

}