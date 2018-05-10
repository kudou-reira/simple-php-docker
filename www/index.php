<?php
	require_once('./db/db.php');
	// require_once('./api/api.php');

	// $day = 'Thursday';
	// $date = 31;

	// echo 'The date is '.$day.' '.$date;
	// $text = 'Hello';
	// $text .= ' World';

	// echo("this is server request method".$_SERVER['REQUEST_METHOD'])

<<<<<<< HEAD
	$db = new DB("127.0.0.1", "dockerTest", "root", "docker");

=======
	$db = new DB("192.168.99.100", "dockerTest", "root", "docker");
>>>>>>> 991324580963ec13b11271f789d3fee423e7efcb


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
