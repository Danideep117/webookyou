<?php 
/*
 * Template Name: Home Templates
 * Description: A Page Template with a Page Builder design.
 */
$teeno_redux_demo = get_option('redux_demo');
get_header(); ?>
	<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
			<?php endwhile; ?>
		<?php }else {
		echo esc_html__( 'Teeno Home Templates', 'teeno' );
	}?>
<?php get_footer(); ?>