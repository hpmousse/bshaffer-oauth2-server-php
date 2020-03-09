<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../app/OAuthIO.php';

$json = json_decode($_GET['oauthio']);
var_dump($json);

$provider_name = $json->provider;

$errors = array();

if (isset($_SESSION['oauthio']['auth']) &&
	count($_SESSION['oauthio']['auth']) > 0) {
	
	reset($_SESSION['oauthio']['auth']);
	$provider_name = key($_SESSION['oauthio']['auth']);
}

$provider = new OAuthIO($provider_name);
$provider->init();

var_dump($client);print "-vardump<br>";

try {
	
	$client = $provider->getClient();

} catch (\Exception $e) {
	$errors[] = $e->getMessage();
}

if ($client && $client !== false) {

	$me = $client->me();
		var_dump($me);print "<br>";
	$me = $client->get('/me');
		var_dump($me);print "<br>";

	try {

	$me = $client->get('/me');

	} catch (\Exception $e) {
	$errors[] = $e->getMessage();
	}
		
}


include 'tmpl/header.php';

?>

<div class="container">
  <h1>Home Page</h1>
  <hr>

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