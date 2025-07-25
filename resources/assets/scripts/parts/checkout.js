export class Checkout {
    init() {
        this.CheckoutSelect();
        // this.switchBtn();
        this.RemovePlaceholder();
    }

    CheckoutSelect() {
        $('#billing_country,#shipping_country').select2({
            minimumResultsForSearch: Infinity, // Hides the search box
            width: '100%', // Makes it responsive
            dropdownAutoWidth: true,
            dropdownCssClass: "pmpro_form_field-select",
        });
    }

    // switchBtn() {
    //     $(".switch-btn-bg").click(
    //         function () {
    //             $(this).addClass("active");
    //             console.log("abc");
    //         },
    //         function () {
    //             $(this).removeClass("active");
    //         }
    //     )
    // }

    RemovePlaceholder() {
        $(document).ready(function () {
            // Target the specific input field
            var $input = $('#Field-numberInput');

            // Find the label associated with this input
            var $label = $('label[for="Field-numberInput"]');

            // Get label text
            var labelText = $.trim($label.text());

            // Set the placeholder with the label text
            if (labelText && $input.length) {
                $input.attr('placeholder', labelText);
                $label.hide(); // Optionally use .remove() if you want to completely remove it
            }
        });

    }
}