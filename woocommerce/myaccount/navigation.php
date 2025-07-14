<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="col-lg-4">
	<nav class="woocommerce-MyAccount-navigation w-100" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
		<div class="col-lg-10 dpt-50 dpb-50 px-4 px-lg-5 radius20">
			<ul class="list-none ps-0 mb-0" >
				<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> dmb-15">
						<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?> class="text-decoration-none aptly-bold font32 leading37 text-uppercase">
							<?php echo esc_html( $label ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>	
	</nav>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
