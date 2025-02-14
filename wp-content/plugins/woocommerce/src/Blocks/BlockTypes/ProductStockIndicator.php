<?php
namespace Automattic\WooCommerce\Blocks\BlockTypes;

use Automattic\WooCommerce\Blocks\Utils\StyleAttributesUtils;

/**
 * ProductStockIndicator class.
 */
class ProductStockIndicator extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'product-stock-indicator';

	/**
	 * API version name.
	 *
	 * @var string
	 */
	protected $api_version = '3';

	/**
	 * Register script and style assets for the block type before it is registered.
	 *
	 * This registers the scripts; it does not enqueue them.
	 */
	protected function register_block_type_assets() {
		return null;
	}

	/**
	 * Register the context.
	 */
	protected function get_block_type_uses_context() {
		return [ 'query', 'queryId', 'postId' ];
	}

	/**
	 * Get product types that should not display stock indicators.
	 *
	 * @return array
	 */
	protected function get_product_types_without_stock_indicator() {
		return array( 'external', 'grouped', 'variable' );
	}

	/**
	 * Include and render the block.
	 *
	 * @param array    $attributes Block attributes. Default empty array.
	 * @param string   $content    Block content. Default empty string.
	 * @param WP_Block $block      Block instance.
	 * @return string Rendered block type output.
	 */
	protected function render( $attributes, $content, $block ) {
		if ( ! empty( $content ) ) {
			parent::register_block_type_assets();
			$this->register_chunk_translations( [ $this->block_name ] );
			return $content;
		}
		$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : '';
		$product = wc_get_product( $post_id );

		if ( ! $product || in_array( $product->get_type(), $this->get_product_types_without_stock_indicator(), true ) ) {
			return '';
		}

		$availability = $product->get_availability();

		if ( empty( $availability['availability'] ) ) {
			return '';
		}

		$low_stock_amount   = $product->get_low_stock_amount();
		$total_stock        = $product->get_stock_quantity();
		$is_low_stock       = $low_stock_amount && $total_stock <= $low_stock_amount;
		$classes_and_styles = StyleAttributesUtils::get_classes_and_styles_by_attributes( $attributes );

		$classnames  = isset( $classes_and_styles['classes'] ) ? ' ' . $classes_and_styles['classes'] . ' ' : '';
		$classnames .= sprintf( ' wc-block-components-product-stock-indicator--%s', $availability['class'] );

		$is_backorder_notification_visible = $product->is_in_stock() && $product->backorders_require_notification();

		if ( empty( $content ) && $is_backorder_notification_visible && $total_stock > 0 ) {
			$low_stock_text = sprintf(
				/* translators: %d is number of items in stock for product */
				__( '%d left in stock', 'woocommerce' ),
				$total_stock
			);
		}

		$output_text = $low_stock_text ?? $availability['availability'];

		$output  = '';
		$output .= '<div class="wc-block-components-product-stock-indicator wp-block-woocommerce-product-stock-indicator ' . esc_attr( $classnames ) . '"';
		$output .= isset( $classes_and_styles['styles'] ) ? ' style="' . esc_attr( $classes_and_styles['styles'] ) . '"' : '';
		$output .= '>';
		$output .= wp_kses_post( $output_text );
		$output .= '</div>';

		return $output;
	}
}
