<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="//gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-EQFVQXBB22"></script>-->
    <!--<script>-->
    <!-- window.dataLayer = window.dataLayer || [];-->
    <!--    function gtag(){dataLayer.push(arguments);}-->
    <!--    gtag('js', new Date());-->

    <!--    gtag('config', 'G-EQFVQXBB22');-->
    <!--</script>-->
</head>

<body <?php isset($_GET['rtl']) ? body_class('rtl') : body_class() ; ?> >

	<?php if( get_theme_mod( 'global_preload', 'yes' ) == 'yes' ){ ?>
		<div id="ova-loader">
            <svg class="page-loader" width="50" height="50">
				<circle cx="25" cy="25" r="10" />
				<circle cx="25" cy="25" r="20" />
			</svg>
	    </div>
    <?php } ?>

	<?php if( get_theme_mod('global_show_custom_cursor','no') == 'yes' ) { ?>
		<div id="ova-custom-cursor__cursor"></div>
	    <div id="ova-custom-cursor__cursor-border"></div>
	<?php } ?>

	<?php
	    if ( function_exists( 'wp_body_open' ) ) {
	        wp_body_open();
	    }
    ?>
    
	<div class="wrap-fullwidth"><div class="inside-content">

	
<?php echo apply_filters( 'infetech_render_header', '' ); ?>