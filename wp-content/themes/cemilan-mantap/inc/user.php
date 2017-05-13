<?php 
/**
 * User Function
 *
 * @author 	Sandi Andrian <sandi@kodrindonesia.com>
 * @since  	May 1, 2017
 **/

require __DIR__ . "/twitter/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

function cm_social_login() {
	$user_email = $_POST['cm_reg_email'];

	if(empty($user_email)) {
		echo json_encode(array('error' => 'true', 'message' => '<div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="alert alert-warning">Email not found.</div></div></div>'));
	} else {
		if(email_exists($user_email) == true) {
			//get user based on email
			$user = get_user_by('email', $user_email);

			//autologin
			wp_set_current_user($user->ID, $user->user_email);
			wp_set_auth_cookie($user->ID);
       		echo json_encode(array('error' => false, 'message' => 'User: ' . $user->user_email));
		} else {
			//email not exists need to register 
			echo json_encode(array('error' => 'true', 'message' => 'not registered'));
		}
	}

	die();
}
add_action('wp_ajax_nopriv_cm_social_login', 'cm_social_login');

function cm_twitter_login() {
	global $session;
	define('CONSUMER_KEY', get_field('twitter_consumer_key','options'));
	define('CONSUMER_SECRET', get_field('twitter_consumer_secret','options'));
	define('OAUTH_CALLBACK', get_field('twitter_redirect_url','options'));

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

	// var_dump($connection); exit;
	$content = $connection->get("account/verify_credentials");
	$request_token = $connection->oauth('oauth/request_token');
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

	return $url;

	// header('Content-Type: application/json');
	// echo json_encode(array(
	// 	'error' => false,
	// 	'login_url' => $url
	// ));
	// die();
}
add_action('wp_ajax_nopriv_cm_twitter_login', 'cm_twitter_login');


/**
 * Function to check twitter login
 *
 * @author 		Sandi Andrian <sandi@kodrindonesia.com>
 * @since 		May 1, 2017
 **/

function cm_check_twitter_login() {
	define('CONSUMER_KEY', get_field('twitter_consumer_key','options'));
	define('CONSUMER_SECRET', get_field('twitter_consumer_secret','options'));
	define('OAUTH_CALLBACK', get_field('twitter_redirect_url','options'));
	$request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

	if (!empty($_GET['oauth_token']) && $_GET['oauth_token'] != null) {
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	    $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);

	    //get email and credentials
	    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	    $user = $connection->get("account/verify_credentials", ['include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true']);
	    
	    //login or register ?
	    // var_dump($user); exit;
	    echo '<script>window.opener.postMessage("_TW|'.$user->name.'|'.$user->email.'", "*"); window.top.close();</script>'; 
	    die();
	}
}