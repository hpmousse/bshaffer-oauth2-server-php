<?php

session_start();
// session_unset();

require '../app/OAuthIO.php';

if (isset($_SESSION['oauthio']['auth']) &&
	count($_SESSION['oauthio']['auth']) > 0) {
	
	header('Location: /index.php');
	exit();
}

if (isset($_GET['p']) &&
	empty($_GET['p']) == false) {
	
	$provider_name = $_GET['p'];
	$provider = new OAuthIO($provider_name);
	$provider->init();
	
	try {
	
		// Execute authentication process
		$provider->auth('/index.php');
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}

include 'tmpl/header.php';

?>

<div class="container">
  <h1>Login Page</h1>
  <hr>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<div class="panel panel-default">
      <div class="panel-heading">LOG IN</div>
      <div class="panel-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Sign in</button>
            </div>
          </div>
        </form>
        <hr>
		<div class="container">
		  <div class="row">
			<div class="col-md-1">
			</div>
            <div class="col-md-2">
              <a href ="http://localhost/login.php?p=google">
                <i class="fa fa-google fa-3x"></i>
                <b>Google+</b>
              </a>
            </div>
            <div class="col-md-2">
              <a href ="http://localhost/login.php?p=facebook">
                <i class="fa fa-facebook fa-3x"></i>
                <b>Facebook</b>
              </a>
            </div>
            <div class="col-md-1">
            </div>
          </div>
        </div>
      </div>
	</div>
  </div>
</div>

<?php include 'tmpl/footer.php'; ?>
