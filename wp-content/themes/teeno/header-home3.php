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
	<link rel="icon" href="<?php if(isset($teeno_redux_demo['favicon3']['url'])){?><?php echo esc_url($teeno_redux_demo['favicon3']['url']); ?><?php }?>">
	<?php }?> 
	<?php wp_head(); ?>
</head>
<body class="theme-color-3">
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
                        <?php if (isset($teeno_redux_demo['logo_header3_1']['url']) && $teeno_redux_demo['logo_header3_1']['url'] != '') {?>
                        <img src="<?php echo esc_url($teeno_redux_demo['logo_header3_1']['url']); ?>" alt="Brand logo">
                        <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-3-1.png" alt="Brand logo"/>
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
                        <?php if (isset($teeno_redux_demo['logo_header3']['url']) && $teeno_redux_demo['logo_header3']['url'] != '') {?>
                        <img src="<?php echo esc_url($teeno_redux_demo['logo_header3']['url']); ?>" alt="Brand logo">
                        <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-3.png" alt="Brand logo"/>
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
                            <div class="language">
                                <select class="niceselect">
                                    <option value="1">
                                        <?php if(isset($teeno_redux_demo['language1']) && $teeno_redux_demo['language1']!=''){?>
                                        <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['language1']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'English', 'teeno' );}?>
                                    </option>
                                    <option value="2">
                                        <?php if(isset($teeno_redux_demo['language2']) && $teeno_redux_demo['language2']!=''){?>
                                        <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['language2']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Chinese', 'teeno' );}?>
                                    </option>
                                    <option value="3">
                                        <?php if(isset($teeno_redux_demo['language3']) && $teeno_redux_demo['language3']!=''){?>
                                        <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['language3']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'French', 'teeno' );}?>
                                    </option>   
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <a href="<?php if(isset($teeno_redux_demo['link_login'])){?>
                            <?php echo esc_attr($teeno_redux_demo['link_login']);?>
                            <?php }else{?>
                            <?php echo esc_html__( '', 'teeno' );}?>" class="btn-icon-text" target="_self" aria-label="User" title="User">
                                <i class="fal fa-user"></i>
                                <span><?php if(isset($teeno_redux_demo['login']) && $teeno_redux_demo['login']!=''){?>
                                    <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['login']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Login', 'teeno' );}?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</body>