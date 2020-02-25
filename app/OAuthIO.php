<?php

require_once '../vendor/autoload.php';
require_once 'config.inc.php';

use OAuth_io\OAuth;

class OAuthIO {
	
	protected $provider;
	protected $oauth;
	
	public function __construct($provider) {
		$this->provider = $provider;
		$this->oauth = new OAuth();
	}
	
	/**
	 * init: Initialise the OAuth_io
	 */
	public function init() {
		$this->oauth->initialize(
			PUBLIC_KEY, SECRET_KEY
		);
	}
	
	/**
	 * auth: 	Make the authentication process
	 * @param: 	callback => uri to goto after authentication
	 * @throw:	NotInitializedException
	 */
	public function auth($callback) {
		$this->oauth->redirect(
			$this->provider,
			$callback
		);
	}
	
	/**
	 * getClient: Get a request_object from OAuth_io
	 * @param: 	opt => options passed to authenticate process
	 * @throw: 	NotAuthenticatedException
	 * @return: Request object on success
	 */
	public function getClient($opt = null) {
		if ($opt === null) {
			$client = $this->oauth->auth($this->provider, array(
				'redirect' => true
			));
		} else {
			$opt['redirect'] = true;
			$client = $this->oauth->auth($this->provider, $opt);
		}
			
		return $client;
	}
	
}

