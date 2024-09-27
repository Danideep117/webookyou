<?php
$teeno_redux_demo = get_option('redux_demo');
get_header('none'); ?>
<div class="error-area ptb-100">
    <div class="container">
        <div class="error-content">
            <?php if (isset($teeno_redux_demo['logo_404']['url']) && $teeno_redux_demo['logo_404']['url'] != '') {?>
            <img class="lazyload" data-src="<?php echo esc_url($teeno_redux_demo['logo_404']['url']); ?>" alt="image" />
            <?php } else { ?>
            <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/assets/images/404.svg" alt="image" />
            <?php } ?>

            <h3>
              <?php if(isset($teeno_redux_demo['404_heading'])){?>
              <?php echo esc_attr($teeno_redux_demo['404_heading']);?>
              <?php }else{?>
              <?php echo esc_html__( 'Ooops! Page Not Found', 'teeno' );}?>
            </h3>
            <p>
                <?php if(isset($teeno_redux_demo['404_title'])){?>
                <?php echo esc_attr($teeno_redux_demo['404_title']);?>
                <?php }else{?>
                <?php echo esc_html__( 'The page you are looking for might have been removed had its name changed or is temporarily unavailable.', 'teeno' );}?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-lg btn-primary" title="Back to Home" target="_self">
              <?php if(isset($teeno_redux_demo['404_btn'])){?>
              <?php echo esc_attr($teeno_redux_demo['404_btn']);?>
              <?php }else{?>
              <?php echo esc_html__( 'Back to Home', 'teeno' );}?>
            </a>
        </div>
    </div>
</div>
<?php get_footer('none'); ?>