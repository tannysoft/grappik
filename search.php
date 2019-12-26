<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package seed
 */

get_header(); ?>

<?php seed_banner_title(get_the_ID()); ?>

<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

			<div class="s-grid -d2">
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->
				<div class="search-page-form"><?php get_search_form( ); ?></div>
			</div>

            <?php 
				echo '<div class="s-grid -d3">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content','card');
				endwhile; 
				echo '</div>';
			?>

            <?php seed_posts_navigation(); ?>

            <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main>
    </div>

    <?php 
	switch ($GLOBALS['s_blog_layout']) {
		case 'rightbar':
		get_sidebar('right'); 
		break;
		case 'leftbar':
		get_sidebar('left'); 
		break;
		case 'full-width':
		break;
		default:
		break;
	}
	?>
</div>

<?php get_footer(); ?>