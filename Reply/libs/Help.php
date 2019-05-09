<?php
namespace Reply\libs;

class Help {
	
	public function __construct($search) {
		$this->case = substr($search,1);

	}
	
	public function execute() {
		
		switch($this->case) {
			case 'help':
				
			break;

			case 'showhashtag':
				
				
					
			break;

			default:
				$result = 'not found';
			break;

		}
		

	}



}
?>
