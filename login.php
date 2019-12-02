<?php
include('header.php');
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="studentlogin.php" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

<br>  <br><br><br><br><br><br><br><br>
<?php
include('footer.php');
?>
