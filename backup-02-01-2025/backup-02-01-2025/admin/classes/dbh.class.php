<?php 


/**


 * DB Connect 


 */


class Dbh


{ 


	private $dbname;


	private $servername;


	private $dbusername;


	private $password;


	function __construct()


	{


		if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {


		    $this->servername = "localhost";


		    $this->dbusername = "root";


		    $this->password = "";


		    $this->dbname = "dayabhawnafoundation_web";


		}


		else


		{


			$this->servername = "localhost";
		    $this->dbusername = "u912286635_nuaoada";
		    $this->password = "~uop}Vq7B=y8";
		    $this->dbname = "u912286635_nuaoada";


		}


	}





	public function _connectodb()


	{


		$connect = new mysqli($this->servername,$this->dbusername,$this->password,$this->dbname);


		if($connect->connect_error)


		{


			print_r("Connection Error: " . $connect->connect_error);


			return false;


		}


		else


		{


			return $connect;


		}


	}


}