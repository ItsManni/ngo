<?php
class Dashboard extends Core
{
	private $conn;
	public function __construct($conn)
	{
		$this->conn = $conn;
		$this->setTimeZone();
	}

	public function GetAdminDashboardStats($center_filter)
	{
		$stats = array();
		$filter_branch = "";
		$filter_center = "";
		if($center_filter != -1)
		{
			$filter_branch = " AND BranchID = $center_filter";
			$filter_center = " AND CenterID = $center_filter";
		}

        // $filter = " where IsActive = 1";
		// $stats['TotalCaseStudies'] = $this->_getTotalRows($this->conn,'casestudies', $filter);

        $filter = " where IsActive = 1";
		$stats['TotalTeams'] = $this->_getTotalRows($this->conn,'teams', $filter);

        // $filter = " where IsActive = 1";
		// $stats['TotalBlogs'] = $this->_getTotalRows($this->conn,'blogs', $filter);

        // $filter = " where IsActive = 1";
		// $stats['TotalStaticPage'] = $this->_getTotalRows($this->conn,'staticpages', $filter);

        $filter = " where IsActive = 1";
		$stats['TotalContactEnquiry'] = $this->_getTotalRows($this->conn,'join_us', $filter);


		/*$filter = " where Mode = 'Offline'".$filter_center;
		$stats['TotalOfflineCourses'] = $this->_getTotalRows($this->conn,'courses_fee', $filter);

		$filter = " where Mode = 'Online'".$filter_center;
		$stats['TotalOnlineCourses'] = $this->_getTotalRows($this->conn,'courses_fee', $filter);*/

		return $stats;
	}
}
?>
