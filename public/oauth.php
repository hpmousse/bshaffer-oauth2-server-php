<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';
require_once '../app/config.inc.php';

use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize(PUBLIC_KEY, SECRET_KEY);

  $request_object = $oauth->auth('spotify', array(
    'credentials' => $credentials
  ));

  print "<br>printr:";print_r($request_object);
  print "<br>vardump:";var_dump($request_object);




include 'tmpl/header.php';

?>

<div class="container">
  <h1>Login Page</h1>
  <hr>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<div class="panel panel-default">


	</div>
  </div>
</div>

<?php include 'tmpl/footer.php'; ?>
	
