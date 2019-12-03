<?php
/**
 * Loop Name: Content Post Detail
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <div class="entry-content">
        <p class="entry-meta">
            <?php
            if ( 'post' === get_post_type() ) {
                if ( function_exists('yoast_breadcrumb') ) { 
                    $breadcrumb = yoast_breadcrumb( '<span id="breadcrumbs" class="bc">','</span>', false);    
                } else {
                $categories_list = get_the_category_list( esc_html__( ', ', 'seed' ) );
                    if ( $categories_list ) {
                        printf( '<span class="cat-links"><i class="si-folder"></i> ' . esc_html__( '%1$s', 'seed' ) . '</span>', $categories_list );
                    } 
                }
            }
            ?>
        </p>
        <?php the_content(); ?>
        <?php wp_link_pages( array('before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seed' ),'after'  => '</div>') ); ?>

        <?php if($GLOBALS['s_blog_profile'] == 'enable') :?>
        <div class="entry-author">
            <div class="pic">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                    rel="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 160 ) ); ?></a>
            </div>
            <div class="info">
                <h2 class="name">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                        rel="author"><?php the_author(); ?></a>
                </h2>
                <?php if(get_the_author_meta( 'description' )) {
                    echo '<div class="desc">'. get_the_author_meta( 'description' ). '</div>';
                }
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <footer class="entry-footer">
        <?php seed_entry_footer(); ?>
    </footer>
</article>