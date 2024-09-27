<?php $teeno_redux_demo = get_option('redux_demo');?> 
	<!-- Footer Links Start-->
<!-- Start Footer 
    ============================================= -->
    <footer class="footer-area footer-3 pt-30 bg-img" data-bg-image="<?php echo esc_url($teeno_redux_demo['bg_foooter_img2']['url']); ?>">
        <div class="container">
            <div class="contact-area shadow-lg bg-white" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <div class="section-title mb-50">
                                <?php if ( is_active_sidebar( 'footer-area-10' ) ) : ?>
                                    <?php dynamic_sidebar( 'footer-area-10' ); ?>
                                <?php endif; ?>
                            </div>
                            <?php echo do_shortcode($teeno_redux_demo['shortcode2']); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map h-100 overflow-hidden">
                            <iframe class="lazyload h-100" id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1659780709118!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right-area ptb-60">
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
        </div>
    </footer>
    <!-- Footer-area end-->


    <!-- Go to Top -->
    <div class="go-top"><i class="fal fa-angle-up"></i></div>
<?php wp_footer(); ?>