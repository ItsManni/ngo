<?php



class Core

{

	public function getURL()

	{

		if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)

		{

			$_URL = "http://localhost/";

			return $_URL;

		}else{

			$_URL = "https://example.com/";

		}

	}

	public function setTimeZone()

	{

		date_default_timezone_set('Asia/Kolkata');

	}



	public function datecheck($input_date)

	{



		// Check if the input date is in "yyyy-mm-dd" format

		if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $input_date)) {

		    // Date is already in the desired format

		    $new_date = $input_date;

		} else {

		    // Split the input date into day, month, and year

		    $date_parts = explode('/', $input_date);



		    // Determine the format (2-digit year or 4-digit year)

		    if (strlen($date_parts[2]) == 2) {

		        // Assuming 20 is the cutoff for the year (e.g., 20 -> 2020, 22 -> 2022)

		        $year = (int) $date_parts[2] < 20 ? "20" . $date_parts[2] : "19" . $date_parts[2];

		    } else {

		        $year = $date_parts[2];

		    }



		    // Create a new date string in yyyy-mm-dd format

		    $new_date = date("Y-m-d", strtotime("$year-$date_parts[1]-$date_parts[0]"));

		}

		return $new_date;

	}



	public function ensureCorrectDateFormat($dateStr)

	{

	    // Check if the date is already in Y-m-d format

	    $d = DateTime::createFromFormat('Y-m-d', $dateStr);

	    if ($d && $d->format('Y-m-d') === $dateStr) {

	        return $dateStr;

	    } else {

	        // Convert from m/d/Y to Y-m-d

	        $d = DateTime::createFromFormat('m/d/Y', $dateStr);

	        if ($d) {

	            return $d->format('Y-m-d');

	        } else {

	            // Handle invalid date format

	            return null;

	        }

	    }

	}



	public function _InsertTableRecords($conn, $sql)

	{

		$response = array();

		$result = mysqli_query($conn, $sql);

		if ($result) {

			$response['message'] = "Data Inserted";

			$response['error'] = false;

			$lastId = mysqli_insert_id($conn);

			$response['last_insert_id'] = $lastId;

		} else {

			$response['sql'] = $sql;

			$response['error'] = true;

			$error = mysqli_error($conn);

			$response['message'] = $error;

			echo $sql;

			echo $error;

		}

		return $response;

	}



	function _InsertPreparedData($conn,$tableName, $columns, $values)

	{

		$response = array();

		$response['error'] = false;

		$response['message'] = "Data inserted successfully";

		// Prepare a statement with placeholders for column names and values

		$sql = "INSERT INTO $tableName (".implode(", ", $columns).") VALUES (".rtrim(str_repeat("?, ", count($columns)), ", ").")";

		$stmt = $conn->prepare($sql);



		// Bind parameters

		$types = str_repeat("s", count($values));

		$stmt->bind_param($types, ...$values);

		if (!$stmt->bind_param($types, ...$values)) {

			$response['error'] = true;

		    $response['message'] = "Failed to bind parameters: " . $stmt->error;

		    $stmt->close();

		    return $response;

	  	}



		  // Execute statement

		if (!$stmt->execute()) {

			$response['error'] = true;

			$response['message'] = "Failed to execute statement: " . $stmt->error;

			$stmt->close();

			return $response;

		}



		// Close statement and database connection

		$stmt->close();

		return $response;

	}



	public function _UpdateTableRecords($conn, $table_name, $query_parameter)

	{

		$response = array();

	   	$sql = "UPDATE $table_name SET $query_parameter";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			$response['message'] = "Data Updated";

			$response['error'] = false;

		} else {

			$response['sql'] = $sql;

			$response['error'] = true;

			$error = mysqli_error($conn);

			$response['message'] = $error;

			echo $sql;

			echo $error;

		}

		return $response;

	}



	public function delete_identity_filter($conn, $table, $query)

	{

		$sql = "Delete from $table $query";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			return true;

		}

		return false;

	}



	public function _getTableRecords($conn, $table_name, $where)

	{

		$response = array();

		$sql = "Select * from $table_name $where";

		//echo $sql;

		$result = mysqli_query($conn, $sql);

		if ($result) {

			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {

					array_push($response, $row);

				}

			}

		} else {

			//echo $sql;

		}

		return $response;

	}





	public function _getTableDetails($conn,$table_name, $where)

	{

		$sql = "Select * from $table_name $where";

		$result=mysqli_query($conn,$sql);

		if($result)

			$row = $result->fetch_assoc();

		else

		{

			$error = mysqli_error($conn);

			echo $sql;

			echo $error;

		}

		return $row;

	}

	public function _debug_getTableDetails($conn,$table_name, $where)

	{

		$sql = "Select * from $table_name $where";

		$result=mysqli_query($conn,$sql);

		if($result)

			$row = $result->fetch_assoc();

		else

		{

			$error = mysqli_error($conn);

			echo $sql;

			echo $error;

		}

		return $row;

	}

	public function _getTableRecordsassoc($conn, $table_name, $where)

	{

		$response = array();

		$sql = "Select * from $table_name $where";

		$result = mysqli_query($conn, $sql);

		if ($result)

		{

			if ($result->num_rows > 0)

			{

				$row = $result->fetch_assoc() ;

				return $row;

			}

		}

		else

		{

			//echo $sql;

		}

		//return $row;

	}

	public function check_unique_identity_filter($conn, $table, $filter)

	{

		$sql = "Select * from $table $filter";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			if ($result->num_rows > 0) {

				return false;

			}

		}

		return true;

	}

	public function _getTotalRows($conn, $table, $filter)

	{

		if ($filter == "") {

			$sql = "Select COUNT(*) as no_count from $table";

		} else {

			$sql = "Select COUNT(*) as no_count from $table $filter";

		}

		//echo $sql;

		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			return $row['no_count'];

		} else {

			return 0;

		}

	}

	public function _getTotalSUM($conn, $table, $column, $filter)

	{

		if ($filter == "") {

			$sql = "Select SUM($column) as total from $table";

		} else {

			$sql = "Select SUM($column) as total from $table $filter";

		}

		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			return $row['total'];

		} else {

			return 0;

		}

	}



	public function _getMaxIdentityValue($conn, $table, $column)

	{

		$sql = "Select COALESCE(MAX($column),0) as max_value from $table";

		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			return $row['max_value'];

		} else {

			return 0;

		}

	}

	public function _getMaxIdentityValue_filter($conn, $table, $column, $where_query)

	{

		$sql = "Select COALESCE(MAX($column),0) as max_value from $table $where_query";

		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			return $row['max_value'];

		} else {

			return 0;

		}

	}



	public function getEmployeeDetailsfromID($conn,$EmployeeID)

	{

		$where = " where ID = $EmployeeID";

		return _getTableDetails($conn,'employees',$where);

	}



	public function generateArraywithKey($data_array)

	{

		$array_temp = array();

		foreach($data_array as $data)

		{

			$ID = $data['ID'];

			$array_temp[$ID] = $data;

		}

		return $array_temp;

	}

	public function generateArraywithKeyName($data_array,$KeyName)

	{

		$array_temp = array();

		foreach($data_array as $data)

		{

			$array_temp[$data[$KeyName]] = $data;

		}

		return $array_temp;

	}

	public function sendMailRequest($postdata,$url)

	{

		//$url = $this->getURL();

		$postdata = json_encode($postdata);

		$resource = $url;

		$ch = curl_init($resource);

		curl_setopt($ch, CURLOPT_URL, $resource);

		curl_setopt($ch, CURLOPT_POST, TRUE);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

		curl_setopt($ch, CURLOPT_USERAGENT, 'api');

		curl_setopt($ch, CURLOPT_TIMEOUT, 1);

		curl_setopt($ch, CURLOPT_HEADER, 0);

		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, false);

		curl_setopt($ch, CURLOPT_FORBID_REUSE, true);

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);

		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);

		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

		curl_exec($ch);

		curl_close($ch);



	}



	public function formatIndianNumber($number) {

	    $decimal = (string)($number - floor($number));

	            $money = floor($number);

	            $length = strlen($money);

	            $delimiter = '';

	            $money = strrev($money);



	            for($i=0;$i<$length;$i++){

	                if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){

	                    $delimiter .=',';

	                }

	                $delimiter .=$money[$i];

	            }



	            $result = strrev($delimiter);

	            $decimal = preg_replace("/0\./i", ".", $decimal);

	            $decimal = substr($decimal, 0, 3);



	            if( $decimal != '0'){

	                $result = $result.$decimal;

	            }



	            return $result;

	}

	public function cleantext($str)

	{

		$str = addslashes($str);

		$str = trim($str);

		return $str;

	}



	public function formatAmountInINR($num)

	{

	    $explrestunits = "" ;

	    if(strlen($num)>3) {

	        $lastthree = substr($num, strlen($num)-3, strlen($num));

	        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits

	        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.

	        $expunit = str_split($restunits, 2);

	        for($i=0; $i<sizeof($expunit); $i++) {

	            // creates each of the 2's group and adds a comma to the end

	            if($i==0) {

	                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer

	            } else {

	                $explrestunits .= $expunit[$i].",";

	            }

	        }

	        $thecash = $explrestunits.$lastthree;

	    } else {

	        $thecash = $num;

	    }

	    return $thecash; // writes the final format where $currency is the currency symbol.

	}

	public function getNameFSLetter($name) {

		$parts = explode(" ", $name);

		if (count($parts) > 1) {

			return substr($parts[0], 0, 1) . substr($parts[1], 0, 1);

		} else {

			return substr($name, 0, 1);

		}

	}

	public function _RemoveSpaces($str)

	{

		$str_without_spaces = str_replace(' ', '', $str);

		return $str_without_spaces;

	}

	public function convertDateFormat($date)

	{

		$dateString = $date;

		$dateObject = DateTime::createFromFormat('m/d/Y', $dateString);

		$formattedDate = $dateObject->format('Y-m-d');

		return $formattedDate;

	}



	public function _UpdatePreparedData($conn, $table, $updateData, $whereCondition)
   {
    $response = ['error' => true, 'message' => ''];

    try {
        // Generate SET part of query
        $setPart = [];
        $values = [];

        foreach ($updateData as $column => $value) {
            $setPart[] = "`$column` = ?";
            $values[] = $value;
        }

        $setString = implode(', ', $setPart);
        $sql = "UPDATE `$table` SET $setString WHERE $whereCondition";

        $stmt = $conn->prepare($sql);

        if ($stmt->execute($values)) {
            $response['error'] = false;
            $response['message'] = "Update successful.";
        } else {
            $response['message'] = "Failed to update.";
        }

    } catch (Exception $e) {
        $response['message'] = "Exception: " . $e->getMessage();
    }

    return $response;
}

}

