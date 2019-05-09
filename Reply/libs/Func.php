<?php

namespace Reply\libs;

class Func {
	private $hashtag;
	private $url;

	public function __construct($search) {
		
		$userSend = !(sizeof(explode('_',$search)) === 1) ? explode('_',$search) : explode('-',$search);
		$this->setUrl(implode('-',$userSend));
		$this->addHashTag($userSend[0]);
		
	}

	public function execute() {
		return $this->validUrl() ? $this->hashtag."\n".$this->url : 'not found';
	}	

	private function setUrl($replace) {
		
		$this->url = 'https://www.php.net/manual/en/function.'.$replace.'.php';
	}


	private function addHashtag($type) {
		
		$this->hashtag = '#'.$type;	
	}
	
	private function validUrl() {
		
		$contents = @file_get_contents($this->url);
		
		return (intval(explode(' ',$http_response_header[0])[1]) < 400); 
	}
	
	


}
?>
