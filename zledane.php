<?php	

class zledane{
	
	public function __construct() {

		if(isset($_SESSION['ile']) and $_SESSION['ile'] >= 3)
		{
			$czas = date("g:i");
			unset($_SESSION['ile']);
			$_SESSION['czas']  = strtotime($czas . "+120sec");
		}

		if(isset($_SESSION['czas']) and $_SESSION['czas'] < strtotime(date("g:i")))
		{
			unset($_SESSION['czas']);
			$_SESSION['ile'] = 0;
		}
	
	}
}
?>
