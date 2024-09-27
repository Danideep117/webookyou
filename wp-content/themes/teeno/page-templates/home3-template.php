<?php 
/*
 * Template Name: Home 3 Templates
 * Description: A Page Template with a Page Builder design.
 */
$teeno_redux_demo = get_option('redux_demo');
get_header('home3'); ?>
		<?php if (have_posts()){ ?>
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			<?php }else {
			echo esc_html__( 'Teeno Home 3 Templates', 'teeno' );
		}?>
<?php get_footer('home3'); ?>