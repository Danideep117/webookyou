<?php 
$teeno_redux_demo = get_option('redux_demo');
get_header(''); ?>
<?php 
while (have_posts()): the_post();
?>
<?php if(isset($teeno_redux_demo['blog_single_image']['url']) && $teeno_redux_demo['blog_single_image']['url'] != ''){?>
<div class="page-title-area pb-100 bg-light bg-img" data-bg-image="<?php echo esc_url($teeno_redux_demo['blog_single_image']['url']); ?>" style="background: url(<?php echo esc_url($teeno_redux_demo['blog_single_image']['url']); ?>);">
<?php }else{?>
<div class="page-title-area pb-100 bg-light bg-img">
<?php }?>
    <div class="container">
        <div class="content text-center">
            <h2>
                <?php if(isset($teeno_redux_demo['heading'])){?>
                <?php echo esc_attr($teeno_redux_demo['heading']);?>
                <?php }else{?>
                <?php echo esc_html__( 'Blog Details', 'teeno' );}?>
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if(isset($teeno_redux_demo['home'])){?>
                        <?php echo esc_attr($teeno_redux_demo['home']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Home', 'teeno' );}?>
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?php if(isset($teeno_redux_demo['heading'])){?>
                    <?php echo esc_attr($teeno_redux_demo['heading']);?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Blog Details', 'teeno' );}?>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="blog-details-area pt-100 pb-60">
    <div class="container">
        <div class="row justify-content-center gx-xl-5">
            <div class="col-lg-8">
                <div class="blog-description mb-40">
                    <article class="item-single">
                        <div class="image radius-md">
                            <div class="lazy-container ratio ratio-2-3">
                                <?php if(get_post_thumbnail_id() != '') { ?>
                                    <img class="lazyload" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Blog Image">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="content">
                            <ul class="info-list">
                                <li><i class="fal fa-user"></i><?php the_author_posts_link(); ?></li>
                                <li><i class="fal fa-calendar"></i><?php the_time(get_option( 'date_format' ));?></li>
                                <li><i class="fal fa-tag"></i><?php echo get_the_tag_list(); ?></li>
                            </ul>
                            <h4 class="title">
                                <?php the_title(); ?>
                            </h4>
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
                <div class="comments">
                    <?php comments_template();?>
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

<?php endwhile; ?>
<?php get_footer(); ?>