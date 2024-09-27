<?php $teeno_redux_demo = get_option('redux_demo'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="author" content="pxdraft">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Lilon- Portfolio Template">
	<meta name="description" content="Lilon- Portfolio Template">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?>
	<link rel="icon" href="<?php if(isset($teeno_redux_demo['favicon7']['url'])){?><?php echo esc_url($teeno_redux_demo['favicon7']['url']); ?><?php }?>">
	<?php }?> 
	<?php wp_head(); ?>
</head>
<body class="theme-color-6">
	<!-- Preloader start -->
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <!-- Preloader end -->

    <!-- Header-area start -->
    <header class="header-area header-2" data-aos="fade-down">
        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" target="_self" title="Teeno">
                        <?php if (isset($teeno_redux_demo['logo_header6']['url']) && $teeno_redux_demo['logo_header6']['url'] != '') {?>
                        <img src="<?php echo esc_url($teeno_redux_demo['logo_header6']['url']); ?>" alt="Brand logo">
                        <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-6.png" alt="Brand logo"/>
                        <?php } ?>
                    </a>
                </div>
                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" target="_self" title="Teeno">
                        <?php if (isset($teeno_redux_demo['logo_header6_1']['url']) && $teeno_redux_demo['logo_header6_1']['url'] != '') {?>
                        <img src="<?php echo esc_url($teeno_redux_demo['logo_header6_1']['url']); ?>" alt="Brand logo">
                        <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-6-1.png" alt="Brand logo"/>
                        <?php } ?>
                    </a>
                    <!-- Navigation items -->
                    <div class="collapse navbar-collapse">
                        <?php 
                            wp_nav_menu( 
                            array( 
                                'theme_location'  => 'primary',
                                'container'       => '', 
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'menu'            => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new teeno_wp_bootstrap_navwalker(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul class="navbar-nav mobile-item mx-auto %2$s"> %3$s </ul>',
                                'depth'           => 0, 
                                )
                        ); ?>
                    </div>
                    <div class="more-option mobile-item">
                        <div class="item">
                            <a href="<?php if(isset($teeno_redux_demo['link_login'])){?>
                            <?php echo esc_attr($teeno_redux_demo['link_login']);?>
                            <?php }else{?>
                            <?php echo esc_html__( '', 'teeno' );}?>" class="btn btn-lg btn-primary bg-secondary btn-fancy" target="_blank" aria-label="Download" title="Download">
                                <span><?php if(isset($teeno_redux_demo['download']) && $teeno_redux_demo['download']!=''){?>
                                    <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['download']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Download', 'teeno' );}?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header-area end -->

</body>