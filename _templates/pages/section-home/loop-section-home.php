<?php
/**
 * The loop that displays sub pages in a section.
 *
 */
?>
<div id="col-3a" class="large-8 medium-8 columns">
  <div class="content-area">
    <div id="section-pages" class="section-pages site-content" role="complementary">
      <h2 class="assistive-text"><?php _e( 'In this section', 'oystershell' ); ?></h2>
    <?php

      $subsections = get_pages( array(
        'child_of' => $post->ID,
        'parent' => $post->ID,
        'sort_order' => 'ASC',
        'sort_column' => 'menu_order'
        ) );

      foreach( $subsections as $page ) {

      $content = $page->post_content;
      if ( ! $content ) // Check for empty page
        continue;

      $excerpt = $page->post_excerpt;

      if ( ! $excerpt ) {
        $excerpt = wp_trim_words( $content, $num_words = 55, $more = '...' );
      }

      $excerpt = apply_filters( 'the_content', $excerpt );
    ?>
    <div class="section-pages-subsection hentry">
      <h3 class="section-pages-subsection-title"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h3>
      <div class="section-pages-subsection-excerpt"><?php echo $excerpt; ?></div>
    </div>
    <?php
      } //End foreach ?>
    </div><!-- #section-pages .section-pages -->
  </div>
</div><!-- #col-3a -->
