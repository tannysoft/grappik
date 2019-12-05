<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>

<?php 
	$singleclass ='';
	if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
		$singleclass = 'single-area';
	} 
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="main-header main-single">
	<div class="s-container">
		<div class="kt-row-column-wrap featured-image">
			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
				<?php if(has_post_thumbnail()) { the_post_thumbnail('full');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
			</a>
		</div>
	</div>
</div>
<?php // seed_banner_title(get_the_ID()); ?>

<div class="s-container main-body <?php echo($singleclass);?> <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

            <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

            <?php wp_reset_postdata(); ?>

        </main>
    </div>

    <?php 
	switch ($GLOBALS['s_blog_layout_single']) {
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
<?php endwhile; ?>

<?php
    wp_reset_query();
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags(get_the_ID());
    
    if ($tags) {
?>

<!-- Related -->
<div class="s-sec related">
    <div class="s-container">
        <header>
            <h2 class="s-title">บทความใกล้เคียง</h2>
        </header>
        <div class="s-grid -d3">
            <?php
                $tag_ids = array();
                foreach($tags as $individual_tag) {
                    $tag_ids[] = $individual_tag->term_id;
                    //$tag_name[] = $individual_tag->name;
                }
                //echo '<div class="hide">';
                //var_dump($tag_name);
                //echo '</div>';
                $args=array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page'=> 3, // Number of related posts to display.
                    'caller_get_posts' => 1
                );
                
                $my_query = new wp_query( $args );

                if($my_query->found_posts>0) {
                
                    while( $my_query->have_posts() ) {
                        $my_query->the_post();
                        echo '<div class="slider">';
                        get_template_part( 'template-parts/content', 'card' );
                        echo '</div>';
                    }

                } else {
                    $args=array(
                    'posts_per_page'=> 3, // Number of related posts to display.
                    'post__not_in' => array(get_the_ID()),
                    'caller_get_posts' => 1
                    );
                    
                    $my_query = new wp_query( $args );

                    
                    while( $my_query->have_posts() ) {
                        $my_query->the_post();
                        echo '<div class="slider">';
                        get_template_part( 'template-parts/content' );
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
    }
    $post = $orig_post;
    wp_reset_query();
?>
<?php get_footer(); ?>