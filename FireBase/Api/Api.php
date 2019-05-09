<?php
namespace FireBase\Api;


class Api {
	private $token;
	private $tags;
	public function __construct() {
		$file_path = __DIR__.'/../data/secert.json';
		$data = file_exists($file_path) ? json_decode(file_get_contents($file_path),true) : false;
		
		if(!$data ||!isset($data['idToken']) || $data['time'] <= time()) {
			$data = json_decode(shell_exec("curl -X POST  -H 'Content-Type: application/json' -d '{\"email\":\"yheric455042@gmail.com\",\"password\":\"zxc21220\",\"returnSecureToken\":true}' 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyPassword?key=AIzaSyAV0bieK68HnFMo0wcC8sm5SYuMTnkVb5o'"),true);
			$data['time'] = time() + (int)$data['expiresIn'];
			
			file_put_contents($file_path,json_encode($data));
		}
		$this->token = !isset($data['idToken']) ? false : $data['idToken'];
		$this->tags = $this->get();
	}


	public function get($topic) {
		if(!$this->token) {
			return false;
		} else {
			return array_values(json_decode(shell_exec("curl 'https://euphoric-anchor-238602.firebaseio.com/save/$topic.json?auth=$this->token'"),true));
		
		}
		
	}

	
	public function set($topic,$data) {
		$data = json_encode($data);

		if(!$this->token || in_array($data,$this->tags)) {
			return (!$this->token) ? false : true;
		} else {
			return shell_exec("curl -X POST -H 'Content-Type: application/json' -d '$data' 'https://euphoric-anchor-238602.firebaseio.com/save/$topic.json?auth=$this->token'");
		}
	}

}



?>
