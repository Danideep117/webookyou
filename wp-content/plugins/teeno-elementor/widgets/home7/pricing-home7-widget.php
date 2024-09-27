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
class BdevsPricingHome7Widget extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing-home7-widget';
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
		return __( 'Pricing Home7 Widget ', 'bdevs-elementor' );
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
		return [ 'home7-elementor' ];
	}

	public function get_keywords() {
		return [ 'pricinghome7widget', 'carousel' ];
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
			'section_content_home7_widget',
			[
				'label' => esc_html__( 'Pricing Home7 Widget', 'bdevs-elementor' ),
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
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Pricing Home7 Widget Item', 'bdevs-elementor' ),
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
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
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
						'name'        => 'text',
						'label'       => esc_html__( 'Text', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
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
						'name'        => 'button',
						'label'       => esc_html__( 'Button', 'bdevs-elementor' ),
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
<section class="pricing-area pricing-4 mt-negative bg-img" data-bg-image="<?php echo esc_url($settings['big_image']['url']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title title-center mb-50" data-aos="fade-up">
                    <h2 class="title color-white mb-15"><?php echo wp_kses_post($settings['title']); ?></h2>
                    <p class="text color-white">
                        <?php echo wp_kses_post($settings['subtitle']); ?>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center gx-xl-5">
                	<?php
					   $idd = 0;
					   foreach ( $settings['tabs'] as $item ) :
					   $idd++;
					?>
	                    <div class="col-md-6 col-lg-4 item" data-aos="fade-up">
	                        <div class="pricing-item mb-30 radius-md">
	                            <div class="pricing-header">
	                                <h4 class="mb-0 lh-1"><?php echo wp_kses_post($item['title']); ?></h4>
	                            </div>
	                            <div class="content-text mt-25">
	                                <p><?php echo wp_kses_post($item['subtitle']); ?></p>
	                            </div>
	                            <div class="price mt-25">
	                                <span class="h2 lh-1 mb-0"><?php echo wp_kses_post($item['number']); ?></span>
	                                <span class="period"><?php echo wp_kses_post($item['text']); ?></span>
	                            </div>
	                            <div class="mt-40">
	                                <a href="<?php echo wp_kses_post($item['link_btn']); ?>" class="btn btn-lg btn-primary bg-secondary btn-fancy" title="Purchase" target="_self"><?php echo wp_kses_post($item['button']); ?></a>
	                            </div>
	                        </div>
	                    </div>
	                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (is_admin()) { ?>
  <script type="text/javascript">
   $("#toggleSwitch").on("change", function (event) {
        if (event.currentTarget.checked) {
            $("#yearly, .text-yearly").addClass("active");
            $("#monthly, .text-monthly").removeClass("active");
        } else {
            $("#monthly, .text-monthly").addClass("active");
            $("#yearly, .text-yearly").removeClass("active");
        }
    })
  </script>
<?php } ?>

<?php
if (is_admin()) { ?>
  <script type="text/javascript">
   $(".pricing-list").each(function (i) {
        var list = $(this).children();
        var listShow = $(this).data("toggle-show");
        if (list.length > listShow) {
            this.insertAdjacentHTML('afterEnd', '<span class="show-more">Show More</span>');
            const showLink = $(this).next(".show-more");
            list.slice(listShow).toggle(300);
            showLink.on("click", function () {
                list.slice(listShow).slideToggle(300);
                showLink.html(showLink.html() === "Show More" ? "Show Less" : "Show More")
            })
        }
    })
  </script>
<?php } ?>

<?php
if (is_admin()) { ?>
  <script type="text/javascript">
   $('.pricing-area .item:nth-child(2) .pricing-item').addClass('active');
    $('.pricing-area').on('mouseover', '.pricing-item', function () {
        $('.pricing-item.active').removeClass('active');
        $(this).addClass('active');
    });
  </script>
<?php } ?>
<?php
}

}