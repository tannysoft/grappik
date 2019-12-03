</div>
<!--#content-->
<?php 
$the_query = new WP_Query( array( 'pagename' => 'footer' ) );
if ($the_query->have_posts()) : 
    echo '<aside id="footpage" class="site-footpage"><div class="s-container">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        the_content();
    }
    wp_reset_postdata();
    echo '</div></aside>';
?>


<?php elseif (is_active_sidebar( 'footbar' ) ) : ?>

<aside id="footbar" class="site-footbar">
    <div class="s-container">
        <?php dynamic_sidebar( 'footbar' ); ?>
    </div>
</aside>

<?php else: ?>

<div class="site-footer-space"></div>
<footer id="colophon" class="site-footer">
    <div class="s-container">
        <div class="site-info">
            <?php if ($GLOBALS['s_footer'] ) { echo $GLOBALS['s_footer'];} ?>
        </div>
    </div>
</footer>
<?php endif; ?>

</div>
<!--#page-->

<?php /* FOR S-MODAL */ ?>
<div class="s-modal-bg"></div>
<?php wp_footer(); ?>
</body>

</html>