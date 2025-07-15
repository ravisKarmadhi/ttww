export class App {
  init() {
    this.Payment();
    this.CheckBox();
  }

  Payment() {
    $(document).ready(function () {
      // .payment element ko .customer_details ke turant baad insert karo
      $('#payment').insertAfter('#customer_details');
    });
  }

  CheckBox() {
    $(document).ready(function () {
      // Find the outer label with checkbox
      $('.form-checkbox').each(function () {
        var $checkmark = $(this).find('.checkmark');
        var $input = $(this).find('input[type="checkbox"]');

        // Move checkmark after the input
        $input.after($checkmark);
      });
    });
  }
}
