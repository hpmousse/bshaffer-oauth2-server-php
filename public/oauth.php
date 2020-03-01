<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';
require_once '../app/config.inc.php';

use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize(PUBLIC_KEY, SECRET_KEY);

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
              <a href ="../login.php?p=google">
                <i class="fa fa-google fa-3x"></i>
                <b>Google+</b>
              </a>
            </div>
            <div class="col-md-2">
              <a href ="../login.php?p=facebook">
                <i class="fa fa-facebook fa-3x"></i>
                <b>Facebook</b>
              </a>
            </div>
            <div class="col-md-2">
              <a href ="../login.php?p=spotify">
                <i class="fa fa-spotify fa-3x"></i>
                <b>Spotify</b>
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
	
