<?php
 
 class GoogleAuth
 {
 	private $db;
 	private $client;
 
 	public function __construct(DB $db, Google_Client $googleClient)
	{
 		$this->db = $db;
 		$this->client = $googleClient;
 
 		$this->client->setClientId('83830223009-j6fg89flkpgigc1g739ucjoch87cgfhi.apps.googleusercontent.com');
 		$this->client->setClientSecret('KPrJlxreeijSfZl8l11JzF3E');
		$this->client->setRedirectUri('http://localhost/Us/index.php');
 		$this->client->setScopes('email');
		
		
	}	
		
	public function checkToken()
 	{
 		if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token']))
 		{
 			$this->client->setAccessToken($_SESSION['access_token']);
 		}
 		else
 		{
 			return $this->client->createAuthUrl();
 
 		}
 
 		return '';
 
 	}
	
	public function login()
 	{
 		if(isset($_GET['code']))
 		{
 			$this->client->authenticate($_GET['code']);
 
			
			$_SESSION['access_token'] = $this->client->getAccessToken();
 
 			$this->storeUser($this->getpayload());
			//store user in db
 
 			return true;
 
 		}
 		return false;
 
 
 	}
	public function logout()	{
		unset($_SESSION['access_token']);

	}
	
	public function getPayload(){
		return json_decode(json_encode($this->client->verifyIdToken()->getAttributes()))->payload;
	}
	
	public function storeUser($payload)
	{
		$sql = "
			INSERT INTO google_users (google_id, email)
			VALUES ({payload->id},'{payload->email}')
			ON DUPLICATE KEY UPDATE id = 
			";
			$this->db->query($sql);
	}