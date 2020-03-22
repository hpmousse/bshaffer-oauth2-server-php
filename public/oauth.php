<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';
require_once '../app/config.inc.php';

$json = json_decode($_GET['oauthio']);
var_dump($json);

use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize(PUBLIC_KEY, SECRET_KEY);

try {
  $request_object = $oauth->auth('spotify');
} catch (\Exception $e) {
  $errors[] = $e->getMessage();
}

print "<br>printr:";print_r($request_object);
print "<br>vardump:";var_dump($request_object);




include 'tmpl/header.php';

?>

<div class="container">
	
<?php 

if (count($errors) > 0) { 

	print '<div class="alert alert-danger" role="alert">' . 
	$errors[0] . '. Goto <a href="login2.php">login page</a> to authenticate.</div>';
	
} else { 
	
			print '<div class="alert alert-success" role="alert">' .
		sprintf('Well done %s! You have authenticated using %s.',
			$me['name'], ucfirst($provider_name)
		) . '</div>';

}

?>

</div>

<?php include 'tmpl/footer.php'; ?>
	
