<?php

//------------------------------------------------------------------------------------
/**
 * Converts WordPress gallery to use Foundation block grids
 *
 * From https://federicojacobi.com/foundation-6-block-grid-wordpress-gallery/
 */
function oystershell_blockgrid_gallery( $output, $atts, $instance ) {
	$atts = shortcode_atts( array(
		'order'   => 'ASC',
		'orderby' => 'menu_order ID',
		'id'      => get_the_ID(),
		'columns' => 3,
		'size'    => 'thumbnail',
		'include' => '',
		'exclude' => '',
		'link'		=> '',
		), $atts );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => intval( $atts[ 'id' ] ), 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => intval( $atts[ 'id' ] ), 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) )
		return '';

	$output = '<div class="os-gallery row small-up-2 medium-up-' . intval( $atts[ 'columns' ] ) . '" >';

	foreach ( $attachments as $id => $attachment ) {
		$img        = wp_get_attachment_image_url( $id, $atts[ 'size' ] );
		$img_srcset = wp_get_attachment_image_srcset( $id, $atts[ 'size' ] );
		switch ($atts[ 'link' ]) {
			case 'file':
				$img_url = wp_get_attachment_image_url( $id, 'full' );
				$link01 = '<a href="' . esc_url( $img_url ) . '">';
				$link02 = '</a>';
				break;
			case 'none':
				$link01 = '';
				$link02 = '';
				break;
			default:
				$img_url = get_attachment_link( $id );
				$link01 = '<a href="' . esc_url( $img_url ) . '">';
				$link02 = '</a>';
				break;
		}

		$data_caption = ( ! $attachment->post_excerpt ) ? '' : ' data-caption="' . esc_attr( $attachment->post_excerpt ) . '" ';
		$caption = ( ! $attachment->post_excerpt ) ? '' : '<div class="wp-caption-text">' . esc_attr( $attachment->post_excerpt ) . '</div>';

		$output .= '<div class="column">'
			. $link01
			. '<img src="' . esc_url( $img ) . '" ' . $data_caption . ' class="th" alt="' . esc_attr( $attachment->title ) . '"  srcset="' . esc_attr( $img_srcset ) . '" sizes="(max-width: 50em) 87vw, 680px" />'
			. $link02
			. $caption
			. '</div>';
	}

	$output .= '</div>';

	return $output;
}
add_filter( 'post_gallery', 'oystershell_blockgrid_gallery', 10, 3 );
