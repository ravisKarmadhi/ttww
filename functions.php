<?php
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

add_image_size('Thumbnail', 700, 700, true);
add_image_size('Medium', 1200, 1200, true);
add_image_size('Fullscreen', 2700, 2700, true);

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Theme Options',
      'menu_title' => 'Theme Options',
      'menu_slug' => 'theme-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}




add_filter('woocommerce_default_address_fields', 'override_address_fields');
function override_address_fields($address_fields)
{
  $address_fields['first_name']['placeholder'] = 'First Name…';
  $address_fields['last_name']['placeholder'] = 'Last Name…';
  $address_fields['address_1']['placeholder'] = 'Address Line 1…';
  $address_fields['address_2']['placeholder'] = 'Address Line 2…';
  $address_fields['state']['placeholder'] = 'State...';
  $address_fields['city']['placeholder'] = 'City...';
  return $address_fields;
}

add_filter('woocommerce_checkout_fields', function ($fields) {

  $fields['billing']['billing_postcode']['placeholder'] = __('Postcode*…', 'woocommerce');
  $fields['billing']['billing_phone']['placeholder'] = __('Mobile number*…', 'woocommerce');
  $fields['billing']['billing_email']['placeholder'] = __('Email Address…', 'woocommerce');
  $fields['billing']['billing_company']['placeholder'] = __('Company…', 'woocommerce');
  $fields['billing']['billing_city']['required'] = false;

  // Shipping fields
  $fields['shipping']['shipping_postcode']['placeholder'] = __('Postcode*…', 'woocommerce');
  $fields['shipping']['shipping_phone']['placeholder'] = __('Mobile number*…', 'woocommerce'); // If phone is needed
  $fields['shipping']['shipping_email']['placeholder'] = __('Email Address…', 'woocommerce'); // If email is needed
  $fields['shipping']['shipping_company']['placeholder'] = __('Company…', 'woocommerce');
  $fields['shipping']['shipping_city']['required'] = false;

  return $fields;
});


add_filter('woocommerce_checkout_fields', 'remove_unwanted_billing_fields');

function remove_unwanted_billing_fields($fields)
{
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_city']);

  // Shipping
  unset($fields['shipping']['shipping_company']);
  unset($fields['shipping']['shipping_state']);
  unset($fields['shipping']['shipping_city']);


  return $fields;
}



function custom_woocommerce_checkout_fields($fields)
{

  $fields['billing']['billing_house_number'] = array(
    'type' => 'text',
    'value' => '',
    'placeholder' => __('House Number*…', 'text-domain'),
    'required' => true,
    // 'class' => array('col-lg-6'),
    'clear' => true,
    'priority' => 80,
    'custom_attributes' => array(
      'name' => 'billing_house_number'
    ),
  );

  // Shipping house number
  $fields['shipping']['shipping_house_number'] = array(
    'type' => 'text',
    'value' => '',
    'placeholder' => __('House Number*…', 'text-domain'),
    'required' => true,
    // 'class' => array('col-lg-6'),
    'clear' => true,
    'priority' => 80,
    'custom_attributes' => array(
      'name' => 'shipping_house_number'
    ),
  );


  $fields['billing']['billing_email'] = array('priority' => 30,);

  $fields['shipping']['shipping_email'] = array('priority' => 30,);

  return $fields;
}
add_filter('woocommerce_checkout_fields', 'custom_woocommerce_checkout_fields');


add_action('woocommerce_after_checkout_form', 'copy_custom_fields_script');
function copy_custom_fields_script()
{
?>
  <script type="text/javascript">
    jQuery(function($) {
   
      function copyHouseNumber() {
        if ($('#ship-to-different-address-checkbox').length && !$('#ship-to-different-address-checkbox').is(':checked')) {
          let billingHouse = $('input[name="house_number"]').val();
          $('input[name="shipping_house_number"]').val(billingHouse);
        }
      }

   
      copyHouseNumber();


      $('#ship-to-different-address-checkbox').change(function() {
        copyHouseNumber();
      });

  
      $('input[name="house_number"]').on('input', function() {
        if (!$('#ship-to-different-address-checkbox').is(':checked')) {
          $('input[name="shipping_house_number"]').val($(this).val());
        }
      });
    });
  </script>
<?php
}



/**
 * Remove Woocommerce Select2 - Woocommerce 3.2.1+
 */
function woo_dequeue_select2()
{
  if (class_exists('woocommerce')) {
    wp_dequeue_style('select2');
    wp_deregister_style('select2');

    wp_dequeue_script('selectWoo');
    wp_deregister_script('selectWoo');
  }
}
add_action('wp_enqueue_scripts', 'woo_dequeue_select2', 100);


// 1. Add a new "Venue Email" field to Venue edit screen
add_filter('tribe_events_venue_columns', function ($columns) {
  $columns['venue_email'] = __('Email', 'text-domain');
  return $columns;
});

add_action('save_post_tribe_venue', function ($post_id) {
  if (isset($_POST['venue_email'])) {
    update_post_meta($post_id, '_venue_email', sanitize_email($_POST['venue_email']));
  }
});

add_action('add_meta_boxes', function () {
  add_meta_box(
    'tribe-venue-email',
    __('Venue Email', 'text-domain'),
    function ($post) {
      $value = get_post_meta($post->ID, '_venue_email', true);
      echo '<label for="venue_email">' . __('Venue Email:', 'text-domain') . '</label>';
      echo '<input type="email" name="venue_email" id="venue_email" value="' . esc_attr($value) . '" style="width:100%;" />';
    },
    'tribe_venue',
    'normal',
    'default'
  );
});


add_filter('woocommerce_add_to_cart_fragments', 'custom_cart_count_fragments');
function custom_cart_count_fragments($fragments)
{
  ob_start();
?>
  <div class="product-count bradon-medium font22 leading22 res-font10 text-white" id="header-cart-count">
    <?php echo WC()->cart->cart_contents_count; ?>
  </div>
<?php
  $fragments['#header-cart-count'] = ob_get_clean();
  return $fragments;
}

add_action('wp_enqueue_scripts', 'custom_enqueue_cart_refresh_script');
function custom_enqueue_cart_refresh_script()
{
  wp_enqueue_script(
    'custom-cart-refresh',
    get_template_directory_uri() . '/resources/assets/scripts/parts/quantity.js',
    array('jquery', 'wc-cart-fragments'),
    '1.0',
    true
  );
}

add_filter('woocommerce_shipping_method_title', 'custom_rename_flat_rate_label', 10, 2);

function custom_rename_flat_rate_label($label, $method)
{
  if ($method->method_id === 'flat_rate') {
    $label = 'Delivery';
  }
  return $label;
}

add_filter('woocommerce_shipping_package_name', 'custom_shipping_section_title', 10, 3);

function custom_shipping_section_title($package_name, $i, $package)
{
  return '';
}


// Modify the "Return to cart" link text
add_filter('woocommerce_cart_url', 'custom_return_to_cart_text');

function custom_return_to_cart_text($url)
{
  // Check if the current page is the checkout page
  if (is_checkout()) {
    // Find and replace the "Return to cart" link text in the WooCommerce cart URL
    return str_replace('Return to cart', 'Amend', $url);
  }
  return $url;
}


// Remove the Order Comments field from checkout
function remove_order_comments_field( $fields ) {
  unset( $fields['order']['order_comments'] );
  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'remove_order_comments_field' );


add_filter('woocommerce_product_single_add_to_cart_text', 'custom_add_to_basket_button_text'); // Single product page
add_filter('woocommerce_product_add_to_cart_text', 'custom_add_to_basket_button_text'); // Archive product page
function custom_add_to_basket_button_text() {
  return __('Add to basket', 'woocommerce');
}


add_action('woocommerce_checkout_update_order_review', function($post_data) {
	parse_str($post_data, $parsed_data);

	$method = isset($parsed_data['delivery_method']) ? sanitize_text_field($parsed_data['delivery_method']) : null;

	if ($method) {
		WC()->session->set('selected_delivery_method', $method);
	} else {
		WC()->session->__unset('selected_delivery_method');
	}
});
add_filter('woocommerce_package_rates', function($rates, $package) {
	$selected = WC()->session->get('selected_delivery_method');

	// If not selected or not "home", remove shipping
	if ($selected !== 'home') {
		return [];
	}

	return $rates;
}, 10, 2);




