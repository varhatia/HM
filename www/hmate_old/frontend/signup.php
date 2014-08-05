<?php
include 'common/header.php';
session_start();
?>

<script type="text/javascript" src="js/validator.js"></script>

<script type="text/javascript">
function verifySubmit() {
	if(checkEmail($('[name="username"]').attr('value'))) {
		return validatepwd($('[name="password"]').attr('value'),$('[name="password_confirmation"]').attr('value'))
	}
	return false ;
	
}

</script>
       <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signup to HobbyMate</h1>
        </div>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-gift"></i> Be a part of HobbyMate</h4>
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
                <form class="form-horizontal form-signin-signup" action="../backend/login.php" method="post" onsubmit="return verifySubmit();">
                  <input type="hidden" name="action" value="create">
                  <input type="text" name="username" placeholder="Email">
                  <input type="password" name="password" placeholder="Password">
                  <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                  <div>
                    <input type="submit" value="Signup" class="btn btn-primary btn-large"  >
                  </div>
                </form>
                <h4><i class="icon-question-sign"></i> Already have an account?</h4>
                <a href="signin.php" class="btn btn-large bottom-space">Signin</a>
                <!-- 
                <h4><i class="icon-thumbs-up"></i> Sign in with third party account</h4>
                <ul class="signin-with-list">
                  <li>
                    <a class="btn-twitter">
                      <i class="icon-twitter icon-large"></i>
                      Signin with Twitter
                    </a>
                  </li>
                  <li>
                    <a class="btn-facebook">
                      <i class="icon-facebook icon-large"></i>
                      Signin with Facebook
                    </a>
                  </li>
                  <li>
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
                  </li>
                </ul>
                 -->
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
