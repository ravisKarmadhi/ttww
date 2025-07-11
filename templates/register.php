<?php
/*
  * Template Name: Sign Up
*/

if (is_user_logged_in()) {
  wp_safe_redirect('/account/');
  exit;
}
$has_error = 0;
$login_success = '';
$fname = '';
$lname = '';
$email  = '';
$password  =  '';

if (isset($_POST['register-firstname']) && !empty($_POST['register-firstname'])) {

  $fname      =   $_POST['register-firstname'];
  $lname      =   $_POST['register-last-name'];
  $email      =   $_POST['register-email'];
  $password   =   $_POST['register-password'];
  $cnf_pwd    =   $_POST['register-confirmpassword'];


  if (false == email_exists($email) && $password == $cnf_pwd) {

    $user_name  = trim(strtolower($fname)) . trim(strtolower($lname));
    $user_id    = wp_create_user($user_name, $password, $user_email);
    $login_success = '<p class="green-success">Register Successfully. Login <a href="/my-account">here.</a></p>';

    if (is_wp_error($user_id)) {
      $login_success = '<p class="red-fail">' . $user_id->get_error_message() . '</p>';
      $has_error = 1;
    }

    if ($user_id) {
      $user_data  = wp_update_user(array('ID' => $user_id, 'user_email' => $email, 'first_name' => $fname, 'last_name' => $lname, 'phone' => $phone_num, 'email_verify' => 0));
    }
  } else {

    $has_error = 1;
    $login_success = '<p class="red-fail">Email Already Exist.</p>';
    $login_success = ($password != $cnf_pwd) ? '<p class=" ">Mismatch Password and Confirm Password.</p>' :  $login_success;
  }
}
?>

<section class="sign-up">
  <div class="container">
    <div class="row">
      <div class="col-xl-10">
        <form action="" method="POST" class="woocommerce-form woocommerce-form-register register auth-register-form">
          <div class="row">
            <div class="">
              <div class="">
                <h2 class="">Contact Information</h2>
                <h6 class="">If you already have and account, please sign in below</h6>
                <div class="">
                  <input type="text" id="register-firstname" name="register-firstname" placeholder="first name*" class="" aria-describedby="register-firstname" autofocus="" tabindex="1" value="<?php echo ($has_error == 1) ? $fname : ''; ?>" required>
                  <input type="text" placeholder="last name*" class="" id="register-last-name" type="text" name="register-last-name" aria-describedby="register-last-name" tabindex="2" required value="<?php echo ($has_error == 1) ? $lname : ''; ?>">
                  <!-- <div class="list-unstyled d-flex align-items-center mt-4"><input type="checkbox" name="" id="" class="p-0 rounded-0 me-3  "><label for="check" class="dmsans-regular textblack fontL lh-1">Please tick to subscribe to our newsletter</label></div> -->

                  <label class="">
                    <span>
                      Please tick to subscribe to our newsletter
                    </span>
                    <input type="checkbox" class="position-absolute opacity-0">
                    <span class="checkmark position-absolute top-0 start-0 bg-white border-lightgray"></span>
                  </label>

                </div>
              </div>
            </div>
            <div class="">
              <div class="">
                <h2 class="">Sign-in Information</h2>
                <div>
                  <input type="email" class="" placeholder="<?php esc_html_e('Email address*', 'woocommerce'); ?>" id="register-email" type="text" name="register-email" aria-describedby="register-email" tabindex="2" required value="<?php echo ($has_error == 1) ? $email : ''; ?>">
                  <input type="password" class="" placeholder="password*" id="register-password" name="register-password" aria-describedby="register-password" tabindex="3" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase, and at least 8 or more characters">
                  <input type="password" class="" placeholder="confirm password*" id="register-confirmpassword" name="register-confirmpassword" placeholder="" aria-describedby="register-confirmpassword" tabindex="3" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="validate_password()">
                </div>

                <div class="">
                  <label class="" id="capital">
                    <span>
                      One uppercase character
                    </span>
                    <input type="checkbox" class="" disabled>
                    <span class="checkmark"></span>
                  </label>
                  <label class="" id="number">
                    <span>
                      One number
                    </span>
                    <input type="checkbox" class="" disabled>
                    <span class="checkmark"></span>
                  </label>
                  <label class="" id="length">
                    <span>
                      8 character (min)
                    </span>
                    <input type="checkbox" class="" disabled>
                    <span class="checkmark"></span>
                  </label>
                </div>

                <div class="">
                  <button type="submit" onclick="wrong_pass_alert()" class="shop-btn" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">create my account</button>
                  <span class="">
                    <a href="<?php echo get_home_url(); ?>/my-account" class="">I already have an account</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <?php if (!empty($login_success)) : ?>
            <div class="error-message">
              <?php echo $login_success; ?>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  var myInput = document.getElementById("register-password");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  myInput.onkeyup = function() {
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }

  function validate_password() {
    var pass = document.getElementById('register-password').value;
    var confirm_pass = document.getElementById('register-confirmpassword').value;
    if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').classList.remove("invalid");
      document.getElementById('create').disabled = true;
      document.getElementById('create').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').classList.add("valid");
      document.getElementById('create').disabled = false;
      document.getElementById('create').style.opacity = (1);
    }
  }

  function wrong_pass_alert() {
    if (document.getElementById('pass').value != "" &&
      document.getElementById('confirm_pass').value != "") {
      alert("Your response is submitted");
    } else {
      alert("Please fill all the fields");
    }
  }
</script>