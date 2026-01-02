<?php 



class Navigation extends Core



{



	public $_Nav_Dashboard;



	public $_Nav_Users;



	public $_Nav_Configurations;

	public $_Nav_Testimonials;

	public $_Nav_Products;
	public $_Nav_Gallery;
	public $_Nav_Volunteer;



	public function __construct()



	{



		$_Nav_Dashboard = false;

		$_Nav_Users = false;

		$_Nav_Configurations = false;

		$_Nav_Testimonials = false;

		$_Nav_Products= false;
		$_Nav_Gallery= false;
		$_Nav_Volunteer= false;



	}



	public function setNavigation($role)



	{



		$json = file_get_contents('../navigation/roles_navigation.json');



		$nav_array = json_decode($json);



		$nav_array = get_object_vars($nav_array);



		//foreach($EmployeeRoles as $role)



		{



			



			$temp_nav_array = $nav_array[$role];



			// print_r($temp_nav_array);



			if(in_array("_Nav_Dashboard",$temp_nav_array))



				$this->_Nav_Dashboard = true;



			if(in_array("_Nav_Users",$temp_nav_array))



				$this->_Nav_Users = true;



			if(in_array("_Nav_Configurations",$temp_nav_array))



				$this->_Nav_Configurations = true;



			if(in_array("_Nav_Testimonials",$temp_nav_array))



				$this->_Nav_Testimonials = true;

			if(in_array("_Nav_Products",$temp_nav_array))



				$this->_Nav_Products = true;

		    if(in_array("_Nav_Gallery",$temp_nav_array))

				$this->_Nav_Gallery = true;

			if(in_array("_Nav_Volunteer",$temp_nav_array))

				$this->_Nav_Volunteer = true;		



		}



	}







}



?>