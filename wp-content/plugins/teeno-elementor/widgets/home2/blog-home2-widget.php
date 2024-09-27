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
class BdevsBlogHome2Widget extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-home2-widget';
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
		return __( 'Blog Home2 Widget ', 'bdevs-elementor' );
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
		return [ 'home2-elementor' ];
	}

	public function get_keywords() {
		return [ 'bloghome2widget', 'carousel' ];
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
			'section_content_home2_widget',
			[
				'label' => esc_html__( 'Blog Home2 Widget', 'bdevs-elementor' ),
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
			'link',
			[
				'label'       => __( 'Link', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
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
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'admin',
			[
				'label'       => __( 'Admin', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'tag',
			[
				'label'       => __( 'tag', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);

		$this->add_control(
			'archive',
			[
				'label'       => __( 'archive', 'bdevs-elementor' ),
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
                            <h2 class="title"><?php echo wp_kses_post($settings['title']); ?></h2>
                        </div>
                        <a href="<?php echo wp_kses_post($settings['link_btn']); ?>">
                        	<button class="btn btn-lg btn-primary" type="button" aria-label="Read Now"><?php echo wp_kses_post($settings['button']); ?></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row gx-xl-5">

                    <div class="col-lg-8" data-aos="fade-up">
                        <article class="card card-big mb-30 radius-md">
                            <div class="card-img">
                                <a href="<?php echo wp_kses_post($settings['link']); ?>" target="_self" title="Link"
                                    class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload"
                                        data-src="<?php echo esc_url($settings['image']['url']); ?>" alt="Blog Image">
                                </a>
                            </div>
                            <div class="card-content p-25">
                                <span class="badge bg-primary radius-sm mb-15">
                                    <?php echo wp_kses_post($settings['heading']); ?>
                                </span>
                                <h3 class="card-title color-white lc-2 mb-15">
                                    <a href="<?php echo wp_kses_post($settings['link']); ?>" target="_self" title="Link">
                                        <?php echo wp_kses_post($settings['subheading']); ?>
                                    </a>
                                </h3>
                                <ul class="card-list list-unstyled">
                                    <li class="mb-10 font-sm icon-start">
                                        <i class="fal fa-user-circle"></i><?php echo wp_kses_post($settings['admin']); ?>
                                    </li>
                                    <li class="mb-10 font-sm icon-start">
                                        <i class="fal fa-tags"></i><?php echo wp_kses_post($settings['tag']); ?>
                                    </li>
                                    <li class="mb-10 font-sm icon-start">
                                        <i class="fal fa-calendar-check"></i><?php echo wp_kses_post($settings['archive']); ?>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up">
                    	<?php
				        $idd = 0;
				           while($wp_query->have_posts()): $wp_query->the_post();
				           $idd++;
				           $teeno_redux_demo = get_option('redux_demo');
				        ?>
			            <?php $img = get_post_meta(get_the_ID(),'_cmb_img', true); ?>
	                        <article class="article-item card mb-30">
	                            <div class="card-img">
	                                <a href="<?php the_permalink(); ?>" class="lazy-container radius-md ratio ratio-1-1" target="_self" title="Blog Image">
	                                    <img class="lazyload"
	                                        data-src="<?php echo wp_get_attachment_url($img);?>" alt="Blog Image">
	                                </a>
	                            </div>
	                            <div class="content">
	                                <span class="color-primary font-xsm"><?php echo get_the_tag_list(); ?></span>
	                                <ul class="card-list list-unstyled">
	                                    <li class="mb-1 font-xsm icon-start">
	                                        <a target="_self" title="Link"><i class="fal fa-user-circle"></i><?php the_author(); ?></a>
	                                    </li>
	                                    <li class="mb-1 font-xsm icon-start">
	                                        <a target="_self" title="Link"><i class="fal fa-calendar-check"></i><?php the_time(get_option( 'date_format' ));?></a>
	                                    </li>
	                                </ul>
	                                <h6 class="card-title lc-2 mb-0">
	                                    <a href="<?php the_permalink(); ?>" target="_self" title="Blog Link"><?php the_title(); ?></a>
	                                </h6>
	                            </div>
	                        </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

}