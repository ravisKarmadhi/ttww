export class Parts{

    init() {
       jQuery(document).ready(function($) {
	function updateShippingVisibility() {
		const selected = $('input[name="delivery_method"]:checked').val();

		if (selected === 'home') {
			$('.shipping-section').slideDown();
		} else {
			$('.shipping-section').slideUp();
		}

		// Important: Trigger WooCommerce to recalculate totals
		$('body').trigger('update_checkout');
	}

	// Bind event
	$(document).on('change', 'input[name="delivery_method"]', updateShippingVisibility);

	// On page load
	updateShippingVisibility();
});
    }
}
