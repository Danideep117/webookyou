<?php $teeno_redux_demo = get_option('redux_demo');?> 
	<!-- Footer Links Start-->
<!-- Start Footer 
    ============================================= -->
    <footer class="footer-area bg-primary-light radius-0">
        <div class="footer-top pt-100 pb-70">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="100">
                            <div class="navbar-brand">
                                <a href="<?php echo esc_url(home_url('/')); ?>" target="_self" title="Link">
                                    <?php if (isset($teeno_redux_demo['logo_footer4']['url']) && $teeno_redux_demo['logo_footer4']['url'] != '') {?>
                                    <img class="lazyload blur-up" src="<?php echo esc_url($teeno_redux_demo['logo_footer4']['url']); ?>" alt="Brand Logo">
                                    <?php } else { ?>
                                    <img class="lazyload blur-up" src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-4.png" alt="Brand Logo"/>
                                    <?php } ?>
                                </a>
                            </div>
                            <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-area-1' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                            <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                               <?php dynamic_sidebar( 'footer-area-2' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                            <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                               <?php dynamic_sidebar( 'footer-area-3' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                            <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                               <?php dynamic_sidebar( 'footer-area-4' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                            <?php if ( is_active_sidebar( 'footer-area-5' ) ) : ?>
                               <?php dynamic_sidebar( 'footer-area-5' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top ptb-30">
            <div class="container">
                <?php if ( is_active_sidebar( 'footer-area-6' ) ) : ?>
                   <?php dynamic_sidebar( 'footer-area-6' ); ?>
                <?php endif; ?>
                <div class="copy-right-content mt-20">
                    <span>
                        <?php if(isset($teeno_redux_demo['footer_copyright'])){?>
                        <?php echo esc_attr($teeno_redux_demo['footer_copyright']);?>
                        <?php }else{?>
                        <?php echo esc_html__( '© Copyright 2023 Teeno | All Rights Reserved.', 'teeno' );}?>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->


    <div class="go-top"><i class="fal fa-angle-up"></i></div>
<?php wp_footer(); ?>