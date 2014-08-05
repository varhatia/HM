<?php
include_once 'common/header.php';
session_start();
?>
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signin to HobbyMate</h1>
        </div>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-lock"></i> Signin to HobbyMate</h4>
            <div class="widget-body">
              <div class="center-align">
               <?php
    	          	if (isset($_SESSION['errormsg'])) {
	       		?>
        		      	<span style="color: red;"><?php 	echo $_SESSION['errormsg'] ;?></span>	
              	<?php
              		 unset($_SESSION['errormsg']) ;
              		}
              	?>

                <form class="form-horizontal form-signin-signup" action="../backend/login.php" method="post">
                  <input type="hidden" name="action" value="verify">
                   <input type="text" name="username" placeholder="Email">
                  <input type="password" name="password" placeholder="Password">
                  <div class="remember-me">
                    <div class="pull-left">
                      <label class="checkbox">
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                    <div class="pull-right">
                      <a href="#">Forgot password?</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <input type="submit" value="Signin" class="btn btn-primary btn-large">
                </form>
                <h4><i class="icon-question-sign"></i> Don't have an account?</h4>
                <a href="signup.php" class="btn btn-large bottom-space">Signup</a>
                 
                <h4><i class="icon-thumbs-up"></i> Sign in with third party account</h4>
                <ul class="signin-with-list">
                  <!-- li>
                    <a class="btn-twitter">
                      <i class="icon-twitter icon-large"></i>
                      Signin with Twitter
                    </a>
                  </li-->
                  <li>
                    <a class="btn-facebook" href="https://localhost/frontend/fbconnect.php">
                      <i class="icon-facebook icon-large"></i>
                      Signin with Facebook
                    </a>
                  </li>
                  <!-- li>
                    <a class="btn-google">
                      <i class="icon-google-plus icon-large"></i>
                      Signin with Google
                    </a>
                  </li>
                  <li>
                    <a class="btn-github">
                      <i class="icon-github icon-large"></i>
                      Signin with Github
                    </a>
                  </li-->
                </ul>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: MAIN CONTENT -->


<?php
include_once 'common/footer.php';
?>
