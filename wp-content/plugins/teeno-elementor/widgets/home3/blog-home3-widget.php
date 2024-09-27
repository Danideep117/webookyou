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
class BdevsBlogHome3Widget extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-home3-widget';
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
		return __( 'Blog Home3 Widget ', 'bdevs-elementor' );
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
		return [ 'home3-elementor' ];
	}

	public function get_keywords() {
		return [ 'bloghome3widget', 'carousel' ];
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
			'section_content_home3_widget',
			[
				'label' => esc_html__( 'Blog Home3 Widget', 'bdevs-elementor' ),
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
			'link_btn',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
	         'post_number',
	         [
	            'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
	            'type'      => Controls_Manager::TEXT,
	            'default'   => '3',
	         ]
	    );
	    $this->add_control(
	        'orderpost',
	        [
	            'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
	            'type'      => Controls_Manager::SELECT,
	            'options'   => [
	               'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
	               'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
	            ],
	            'default'   => 'desc',
	        ]
	    );

      	$this->add_control(
         	'orderby',
         	[
	            'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
	            'type'      => Controls_Manager::SELECT,
	            'options'   => [
	               'date'  => esc_html__( 'Date', 'bdevs-elementor' ),
	               'title' => esc_html__( 'Title', 'bdevs-elementor' ),
	               'rand' => esc_html__( 'Random', 'bdevs-elementor' ),
	            ],
	            'default'   => 'desc',
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
		$wp_query = new \WP_Query(array('post_type' => 'post', 'posts_per_page' => $settings['post_number'],'orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings);
		?>
<section class="blog-area blog-2 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <div>
                            <span class="color-primary"><?php echo wp_kses_post($settings['title']); ?></span>
                            <h2 class="title"><?php echo wp_kses_post($settings['subtitle']); ?></h2>
                        </div>
                        <a href="<?php echo wp_kses_post($settings['link_btn']); ?>">
	                        <button class="btn btn-lg btn-primary bg-gradient rounded-pill" type="button" aria-label="Read Now"><?php echo wp_kses_post($settings['button']); ?>
	                        </button>
	                    </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                	<?php
			        $idd = 0;
			           while($wp_query->have_posts()): $wp_query->the_post();
			           $idd++;
			           $teeno_redux_demo = get_option('redux_demo');
			        ?>
			        <?php $img_blog_home3 = get_post_meta(get_the_ID(),'_cmb_img_blog_home3', true); ?>
	                    <div class="col-md-6" data-aos="fade-up">
	                        <article class="card card-big mb-25 radius-md">
	                            <div class="card-img">
	                                <a href="<?php the_permalink(); ?>" target="_self" title="Link"
	                                    class="lazy-container ratio ratio-16-9">
	                                    <img class="lazyload"
	                                        data-src="<?php echo wp_get_attachment_url($img_blog_home3);?>" alt="Blog Image">
	                                </a>
	                            </div>
	                            <div class="card-content p-25">
	                                <ul class="card-list list-unstyled">
	                                    <li class="mb-10 font-sm icon-start">
	                                        <a target="_self" title="Link"><i class="fal fa-user-circle"></i><?php the_author(); ?></a>
	                                    </li>
	                                    <li class="mb-10 font-sm icon-start">
	                                        <a target="_self" title="Link"><i class="fal fa-tags"></i><?php echo get_the_tag_list(); ?></a>
	                                    </li>
	                                    <li class="mb-10 font-sm icon-start">
	                                        <a target="_self" title="Link"><i class="fal fa-calendar-check"></i><?php the_time(get_option( 'date_format' ));?></a>
	                                    </li>
	                                </ul>
	                                <h4 class="card-title color-white lc-2 mb-0">
	                                    <a href="<?php the_permalink(); ?>" target="_self" title="Link">
	                                        <?php the_title(); ?>
	                                    </a>
	                                </h4>
	                            </div>
	                        </article>
	                    </div>
	                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

}