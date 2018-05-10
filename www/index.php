<?php
	require_once('./db/db.php');
	// require_once('./api/api.php');

	// $day = 'Thursday';
	// $date = 31;

	// echo 'The date is '.$day.' '.$date;
	// $text = 'Hello';
	// $text .= ' World';

	// echo("this is server request method".$_SERVER['REQUEST_METHOD'])

	$db = new DB("127.0.0.1", "dockerTest", "root", "docker");


	$request_body = file_get_contents('php://input');
	print($request_body);

	if($_SERVER['REQUEST_METHOD'] == "GET") {
		echo "Hello World";
	} else if($_SERVER['REQUEST_METHOD'] == "POST") {
		echo "POST";
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
