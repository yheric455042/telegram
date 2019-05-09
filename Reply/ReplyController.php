<?php
namespace Reply;

use Reply\libs\Func; 


class ReplyController {
	private $class;
	public function __construct($type,$search) {
		$class = '\\'.__NAMESPACE__.'\\libs\\'.$type;
		$this->class = new $class($search);
	
	}

	public function returnExecute() {
		return $this->class->execute();	

	}
}






?>
