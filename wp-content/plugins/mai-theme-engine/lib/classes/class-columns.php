<?php

/**
 * Build columns wrap.
 *
 * @access  private
 */
class Mai_Columns {

	private $args;

	private $content;

	public function __construct( $args = array(), $content = null ) {

		$this->args    = $args;
		$this->content = $content;

		// Parse defaults and args.
		$this->args = shortcode_atts( array(
			'align'      => '',
			'align_cols' => '',
			'align_text' => '',
			'bottom'     => '',   // Bottom margin. none, xxxs, xxs, xs, sm, md, lg, xl, xxl
			'class'      => '',   // HTML classes (space separated)
			'gutter'     => 'md', // Space between columns (xxxs, xxs, xs, sm, md, lg, xl, xxl) only
			'id'         => '',   // Add HTML id
			'style'      => '',   // Inline styles
			'top'        => '',   // Top margin. none, xxxs, xxs, xs, sm, md, lg, xl, xxl
		), $this->args, 'columns' );

		// Sanitize args.
		$this->args = array(
			'align'      => mai_sanitize_keys( $this->args['align'] ),
			'align_cols' => mai_sanitize_keys( $this->args['align_cols'] ),
			'align_text' => mai_sanitize_keys( $this->args['align_text'] ),
			'bottom'     => sanitize_key( $this->args['bottom'] ),
			'class'      => mai_sanitize_html_classes( $this->args['class'] ),
			'gutter'     => sanitize_key( $this->args['gutter'] ),
			'id'         => sanitize_html_class( $this->args['id'] ),
			'style'      => sanitize_text_field( $this->args['style'] ),
			'top'        => sanitize_key( $this->args['top'] ),
		);

	}

	/**
	 * Return the columns HTML.
	 *
	 * @return  string|HTML
	 */
	function render() {

		// Bail if no content.
		if ( null === $this->content ) {
			return;
		}

		// Row attributes.
		$attributes = array(
			'class' => mai_add_classes( $this->args['class'], 'columns-shortcode row' ),
			'id'    => ! empty( $this->args['id'] ) ? $this->args['id'] : '',
		);

		// Add gutter.
		$attributes['class'] = mai_add_classes( mai_get_gutter_class( $this->args['gutter'] ), $attributes['class'] );

		// Add row align classes.
		$attributes['class'] = mai_add_row_align_classes( $attributes['class'], $this->args );

		// Add top margin classes.
		if ( mai_is_valid_top( $this->args['top'] ) ) {
			$attributes['class'] = mai_add_classes( mai_get_top_class( $this->args['top'] ), $attributes['class'] );
		}

		// Add bottom margin classes.
		if ( mai_is_valid_bottom( $this->args['bottom'] ) ) {
			$attributes['class'] = mai_add_classes( mai_get_bottom_class( $this->args['bottom'] ), $attributes['class'] );
		}

		// Maybe add inline styles.
		$attributes = mai_add_inline_styles( $attributes, $this->args['style'] );

		// Only do_shortcode cause mai_get_processed_content() happens inside each col.
		return sprintf( '<div %s>%s</div>', genesis_attr( 'flex-row', $attributes, $this->args ), do_shortcode( $this->content ) );
	}

}
