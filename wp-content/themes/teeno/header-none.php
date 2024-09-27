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
	<link rel="icon" href="<?php if(isset($teeno_redux_demo['favicon']['url'])){?><?php echo esc_url($teeno_redux_demo['favicon']['url']); ?><?php }?>">
	<?php }?> 
	<?php wp_head(); ?>
</head>
<body class="theme-color-1">
    <!-- Preloader start -->
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    <!-- Preloader end -->

    
</body>