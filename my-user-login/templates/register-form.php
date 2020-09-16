<form method="post" action="<?= the_permalink() ?>">
<?php
if (isset($_SESSION['register-errors']) && !empty($_SESSION['register-errors'])) : 
?>
<div class="alert alert-danger">
    <ul>
<?php
    foreach ($_SESSION['register-errors'] as $key => $msg) {
        echo '<li>' . $key . ': ' . $msg . '</li>';
    }
?>
    </ul>
</div>
<?php
   unset($_SESSION['register-errors']);
endif;
?>
<input type="hidden" name="action" value="my-custom-register">
<input type="hidden" name="nonce" value="<?= wp_create_nonce('my-custom-register')?>">
  <!-- <div class="container"> -->
  <p>Welcome, You're just a moments away from becoming a part of the buisness inn</p>
        <div class="form-group">
            <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Full name" name="username" required>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone" name="phone" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" name="email" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="date" aria-describedby="emailHelp" placeholder="Birth date" name="birthday" required>
        </div>

        <button type="submit" class="btn join-btn">Send</button>
    <!-- <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter UserName" name="username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>


    <label for="psw-repeat"><b>Birthday</b></label>
    <input type="date" placeholder="Enter Birthday" name="birthday" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
</form>