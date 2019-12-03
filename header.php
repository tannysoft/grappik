<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php 
        wp_head(); 
        if ( function_exists( 'plant_css' ) ) { plant_css(); }
        if ( function_exists( 'plant_var' ) ) { plant_var(); } 
    ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar_d' )) { $bodyClass = 'headbar-d'; } if (is_active_sidebar( 'headbar_m' )) { $bodyClass .= ' headbar-m'; } ?>

<body <?php body_class($bodyClass); ?>>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } 
    $headerClass = 's-' . $GLOBALS['s_header_style_m'] . '-m s-' . $GLOBALS['s_header_style_d'] .  '-d -' . $GLOBALS['s_header_layout'];
    if($GLOBALS['s_header_effect'] == 'overlay') {
        $headerClass .= ' -overlay';
    }
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
    <div id="page" class="site">

        <header id="masthead" class="site-header _heading <?php echo $headerClass; ?>"
            data-scroll="<?php echo $GLOBALS['s_header_scroll']; ?>">

            <div class="s-container">

                <div class="site-branding">
                    <div class="site-logo"><?php seed_logo(); ?></div>
                    <?php seed_title(); ?>
                </div>

                <div class="action-left">
                    <?php seed_header_action($GLOBALS['s_left_area'], $GLOBALS['s_left_area_phone'], $GLOBALS['s_left_area_custom'] ); ?>
                </div>

                <div class="action-right">
                    <?php seed_header_action($GLOBALS['s_right_area'], $GLOBALS['s_right_area_phone'], $GLOBALS['s_right_area_custom'] ); ?>
                </div>

                <nav id="site-nav-d" class="site-nav-d _desktop">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
                </nav>


                <div class="site-action">
                    <?php 
                        if (is_active_sidebar( 'action' )) {
                            dynamic_sidebar( 'action' );
                        }
                        if ( ! empty( $GLOBALS['s_header_action'] ) ) {
                            foreach ( $GLOBALS['s_header_action'] as $action ) {
                                switch ($action) {
                                    case 'search':
                                        echo '<a class="site-search s-modal-trigger m-user" onclick="return false;" data-popup-trigger="site-search"><i class="si-search-o"></i></a>';
                                        break;
                                    case 'cart':
                                        $cart_url = '';
                                        if ( function_exists( 'wc_get_cart_url' ) ) {
                                            $cart_url = wc_get_cart_url();
                                        }
                                        echo '<a class="site-cart" href="' .  $cart_url . '" title="' . __( 'View your shopping cart', 'seed' ) . '">';
                                        echo '<i class="si-' . $GLOBALS['s_cart_icon'] . '"><b id="cart-count" class="hide"></b></i>';
                                        echo '</a>';
                                        break;
                                    case 'my-account':
                                        seed_member_menu();
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                    ?>

                </div>


            </div>
            <nav id="site-nav-m" class="site-nav-m">
                <div class="s-container">
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
                </div>
            </nav>
        </header>

        <div class="s-modal -full" data-s-modal="site-search">
            <span class="s-modal-close"><i class="si-cross-o"></i></span>
            <?php get_search_form(); ?>
        </div>

        <div class="site-header-space"></div>

        <?php 
		if (is_front_page()) {
			if (is_active_sidebar( 'home_banner' )) {
				echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
			} 
		} else {
			if (is_active_sidebar( 'page_banner' )) {
				echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
			}
		}
		?>

        <div id="content" class="site-content">