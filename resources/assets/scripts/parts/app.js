export class App {
  init() {
    // Jab DOM ready ho
    $(document).ready(function () {
      // .payment element ko .customer_details ke turant baad insert karo
      $('#payment').insertAfter('#customer_details');
    });

  }
}
