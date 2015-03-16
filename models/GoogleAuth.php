<?php
 
 class GoogleAuth
 {
 	private $db;
 	private $client;
 
 	public function __construct(DB $db, Google_Client $googleClient)
	{
 		$this->db = $db;
 		$this->client = $googleClient;
 
 		$this->client->setClientId('256362204593-v2b5mt42rsl6ospfd8ejvl07i4ncb5cm.apps.googleusercontent.com');
 		$this->client->setClientSecret('68yIh6rI2Cf8krqevCl4kdE4');
		$this->client->setRedirectUri('http://localhost/Us/account.php');
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
}