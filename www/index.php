<?php
	require_once('./db/db.php');
	// require_once('./api/api.php');

	// $day = 'Thursday';
	// $date = 31;

	// echo 'The date is '.$day.' '.$date;
	// $text = 'Hello';
	// $text .= ' World';

	// echo("this is server request method".$_SERVER['REQUEST_METHOD'])

	$db = new DB("192.168.99.100", "dockerTest", "root", "docker");


	if($_SERVER['REQUEST_METHOD'] == "GET") {
		echo "Hello World";
	} else if($_SERVER['REQUEST_METHOD'] == "POST") {
		$request_body = file_get_contents('php://input');
		$request_body = json_decode($request_body, true);
		print_r($request_body);
		
		$api = $request_body["url"];
		$action = $request_body["action"];
		$phone = $request_body["parameters"]["phone"];
		$name = $request_body["parameters"]["name"];

		echo $api;
		echo $phone;
		echo $name;
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

<!-- {
	"url":"/api",
	"action": "data",
	"parameters": {
		"phone": 8109024516691
	}
} -->
