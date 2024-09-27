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
class BdevsPricingWidget extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing-widget';
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
		return __( 'Pricing Widget ', 'bdevs-elementor' );
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
		return [ 'pricingwidget', 'carousel' ];
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
			'section_content_pricing_widget',
			[
				'label' => esc_html__( 'Pricing Widget', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Teeno Pricing Plan', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Choose Our Pricing Plan', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your description', 'bdevs-elementor' ),
				'default'     => __( 'We have several powerful plans to showcase your business and get discovered as a creative entrepreneurs. Everything you need.', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'btn1',
			[
				'label'       => __( 'Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Bill Monthly', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'btn2',
			[
				'label'       => __( 'Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Bill Yearly', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Pricing Widget Item', 'bdevs-elementor' ),
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
						'name'        => 'list_item',
						'label'       => esc_html__( 'List Item', 'bdevs-elementor' ),
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
			'tabs2',
			[
				'label' => esc_html__( 'Pricing Widget Item', 'bdevs-elementor' ),
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
						'name'        => 'list_item',
						'label'       => esc_html__( 'List Item', 'bdevs-elementor' ),
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
<section class="pricing-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title title-center mb-50" data-aos="fade-up">
                    <span class="subtitle color-primary"><?php echo wp_kses_post($settings['title']); ?></span>
                    <h2 class="title mt-0 mb-15"><?php echo wp_kses_post($settings['subtitle']); ?></h2>
                    <p class="text">
                        <?php echo wp_kses_post($settings['desc']); ?>
                    </p>
                    <div class="tab-switch mt-30">
                        <span class="text text-monthly active"><?php echo wp_kses_post($settings['btn1']); ?></span>
                        <label class="tab-switch-toggle">
                            <input type="checkbox" id="toggleSwitch">
                            <span class="switch-toggle-slider"></span>
                        </label>
                        <span class="text text-yearly"><?php echo wp_kses_post($settings['btn2']); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="monthly">
                        <div class="row justify-content-center">
                        	<?php
							   $idd = 0;
							   foreach ( $settings['tabs'] as $item ) :
							   $idd++;
							?>
	                            <div class="col-md-6 col-lg-4 item" data-aos="fade-up">
	                                <div class="pricing-item mb-30 bg-primary-light radius-lg">
	                                    <div class="pricing-header">
	                                        <?php echo wp_kses_post($item['title']); ?>
	                                    </div>
	                                    <ul class="pricing-list list-unstyled mt-25" data-toggle-show="5">
	                                        <?php echo wp_kses_post($item['list_item']); ?>
	                                    </ul>
	                                    <div class="price mt-30">
	                                        <span class="h3 mb-0"><?php echo wp_kses_post($item['number']); ?></span>
	                                        <span class="period"><?php echo wp_kses_post($item['time']); ?></span>
	                                    </div>
	                                    <div class="mt-20">
	                                        <a href="<?php echo wp_kses_post($item['link_btn']); ?>" class="btn btn-lg btn-block btn-primary no-animation" title="Choose" target="_self"><?php echo wp_kses_post($item['btn']); ?></a>
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
							   foreach ( $settings['tabs'] as $item ) :
							   $idd++;
							?>
	                            <div class="col-md-6 col-lg-4 item" data-aos="fade-up">
	                                <div class="pricing-item mb-30 bg-primary-light radius-lg">
	                                    <div class="pricing-header">
	                                        <?php echo wp_kses_post($item['title']); ?>
	                                    </div>
	                                    <ul class="pricing-list list-unstyled mt-25" data-toggle-show="5">
	                                        <?php echo wp_kses_post($item['list_item']); ?>
	                                    </ul>
	                                    <div class="price mt-30">
	                                        <span class="h3 mb-0"><?php echo wp_kses_post($item['number']); ?></span>
	                                        <span class="period"><?php echo wp_kses_post($item['time']); ?></span>
	                                    </div>
	                                    <div class="mt-20">
	                                        <a href="<?php echo wp_kses_post($item['link_btn']); ?>" class="btn btn-lg btn-block btn-primary no-animation" title="Choose" target="_self"><?php echo wp_kses_post($item['btn']); ?></a>
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