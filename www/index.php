<?php
	require('./cors/cors.php');
	require_once('./db/db.php');

	// require_once('./api/api.php');

	// $day = 'Thursday';
	// $date = 31;

	// echo 'The date is '.$day.' '.$date;
	// $text = 'Hello';
	// $text .= ' World';

	// echo("this is server request method".$_SERVER['REQUEST_METHOD'])

	$cors = new Cors();
	$db = new DB("db", "dockerTest", "root", "docker");

	// $db = new DB("192.168.99.100", "dockerTest", "root", "docker");

	$cors->cors();

	if($_SERVER['REQUEST_METHOD'] == "GET") {
		// echo "Hello World";
		$result = $db->showAll();
		foreach($result as $row) {
			print_r($row);
		}
	} else if($_SERVER['REQUEST_METHOD'] == "POST") {
		$request_body = file_get_contents('php://input');
		$request_body = json_decode($request_body, true);
		print_r($request_body);
		
		$api = $request_body["api"];
		$action = $request_body["action"];
		$id = $request_body["parameters"]["id"];
		$email = $request_body["parameters"]["email"];
		$alarms = $request_body["parameters"]["alarms"];
		$notes = $request_body["parameters"]["notes"];

		$data = array(':id'=>$id, ':email'=>$email, ':alarms'=>$alarms, ':notes'=>$notes);
		if($action == "create") {
			$result = $db->create($data);
		} else if($action == "update") {
			$result = $db->update($data);
			echo $result;
		}

		// switch($action) {
		// 	case "create":

		// 	case "delete":

		// 	default:

		// }
	} else {
		http_response_code(405);
	}

	// print("hello")

	// class APIResult
	// {
	//     public $status = "ok";
	//     public $data;
	//     public $jwt;
	//     public $jwt_error = null;
	// }

	// $test = new APIResult;
	// $test->data = "this is data";

	// print_r($test)
?>