<?php 
$teeno_redux_demo = get_option('redux_demo');
get_header();
?>
<?php if(isset($teeno_redux_demo['blog_single_image']['url']) && $teeno_redux_demo['blog_single_image']['url'] != ''){?>
<div class="page-title-area pb-100 bg-light bg-img" data-bg-image="<?php echo esc_url($teeno_redux_demo['blog_single_image']['url']); ?>" style="background: url(<?php echo esc_url($teeno_redux_demo['blog_single_image']['url']); ?>);">
<?php }else{?>
<div class="page-title-area pb-100 bg-light bg-img">
<?php }?>
    <div class="container">
        <div class="content text-center">
            <h2>
                <?php printf( esc_html__( 'Tag Archives: %s', 'teeno' ), single_tag_title( '', false ) ); ?>
            </h2>
        </div>
    </div>
</div>
<!-- Start Blog Area -->
<div class="blog-details-area pt-100 pb-60">
    <div class="container">
        <div class="row justify-content-center gx-xl-5">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
                <div class="col-lg-8">
            <?php }else{?>
                <div class="col-lg-12">
            <?php } ?>
            <div class="blog-description mb-40">
                <?php
                $idd=0;
                    while (have_posts()) : the_post();
                $idd++;
                ?>
                    <?php $img_blog = get_post_meta(get_the_ID(),'_cmb_img_blog', true); ?>
                        <article class="item-single mb-30">
                            <div class="image radius-md">
                                <a href="<?php the_permalink(); ?>" class="lazy-container ratio ratio-2-3">
                                    <?php if(get_post_thumbnail_id() != '') { ?>
                                        <img class="lazyload" src="<?php echo wp_get_attachment_url($img_blog);?>" alt="<?php the_title(); ?>">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="content">
                                <ul class="info-list">
                                    <li><i class="far fa-calendar-alt"></i><?php the_time(get_option( 'date_format' ));?></li>
                                    <li><i class="fas fa-user"></i><?php the_author(); ?></li>
                                    <li><i class="fas fa-tag"></i><?php echo get_the_tag_list(); ?></li>
                                </ul>
                                <h3 class="title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p>
                                    <?php if(isset($teeno_redux_demo['blog_excerpt'])){?>
                                    <?php echo esc_attr(teeno_excerpt_1($teeno_redux_demo['blog_excerpt'])); ?>
                                    <?php }else{?>
                                    <?php echo esc_attr(teeno_excerpt_1(40)); }?>
                                </p>
                                <a href="<?php the_permalink(); ?>"  class="btn primary-btn primary-btn-5">
                                    <?php if(isset($teeno_redux_demo['blog_button']) && $teeno_redux_demo['blog_button']!=''){?>
                                    <?php echo wp_specialchars_decode(esc_attr($teeno_redux_demo['blog_button']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Read More', 'teeno' );}?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php teeno_pagination(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="widget-area">
                    <?php get_sidebar(); ?>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->
<?php
get_footer();
?>