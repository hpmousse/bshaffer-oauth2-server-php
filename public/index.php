<?php

session_start();

require '../app/OAuthIO.php';

$provider_name = '';
$errors = array();

if (isset($_SESSION['oauthio']['auth']) &&
	count($_SESSION['oauthio']['auth']) > 0) {
	
	reset($_SESSION['oauthio']['auth']);
	$provider_name = key($_SESSION['oauthio']['auth']);
}

$provider = new OAuthIO($provider_name);
$provider->init();


try {
	
	$client = $provider->getClient();

} catch (\Exception $e) {
	$errors[] = $e->getMessage();
}


include 'tmpl/header.php';

?>

<div class="container">
  <h1>Home Page</h1>
  <hr>

<?php 

if (count($errors) > 0) { 

	print '<div class="alert alert-danger" role="alert">' . 
	$errors[0] . '. Goto <a href="login.php">login page</a> to authenticate.</div>';
	
} else { 
	if ($client !== false) {
	
		$me = $client->me();
		print '<div class="alert alert-success" role="alert">' .
		sprintf('Well done %s! You have authenticated using %s.',
			$me['name'], ucfirst($provider_name)
		) . '</div>';
		
	}
}

?>

</div>

<?php include 'tmpl/footer.php'; ?>