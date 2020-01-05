<?php
/**
 * Loop Name: Content Hero
 */
$banner = get_field('banner', get_the_ID());
if($banner) {
    $bannerHtml = wp_get_attachment_image( $banner, "hero-thumb", "", array( "class" => "img-responsive" ) );
} elseif (has_post_thumbnail()) {
    $bannerHtml = get_the_post_thumbnail( get_the_ID(), "hero-thumb" );
} else {
    $bannerHtml = '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-item -hero'); ?>>
    <div class="info">

        <header class="entry-header">
            <?php
                $category = get_the_category();
                if ( $category[0] ) {
                   echo '<p class="cat _heading"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></p>';
                }
            ?>
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <div class="s-button">
                <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">อ่านบทความ</a>
            </div>
        </header>

        <div class="entry-summary hide">
            <?php the_excerpt();?>
        </div>

    </div>
    <div class="pic">
        <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
            <?php echo $bannerHtml; ?>
        </a>
    </div>
</article>