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
  <h1>Login Page</h1>
  <hr>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<div class="panel panel-default">
<?php 

if (count($errors) > 0) { 

  print '<div class="alert alert-danger" role="alert">'; 
  print_r($errors[)
  print '. Goto <a href="login2.php">login page</a> to authenticate.</div>';
  
} else { 
  ?>
<script>
  </script>
    OAuth.initialize('Your-public-key');

    //Example with Twitter with the cache option enabled
    OAuth.popup('spotify', {cache: true}).done(function(spotify) {
    alert('apirequest');
    }).fail(function(err) {
    alert('fail');
    })


  </script>
      <div class="alert alert-success" role="alert">
    </div>
<?php 
}
?>
	</div>
  </div>
</div>

<?php include 'tmpl/footer.php'; ?>
	
