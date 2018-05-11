<?php
	class DB {
		private $pdo;

		public function __construct($host, $dbname, $username, $password) {
			$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}

		public function query($query, $params=array()) {
			$statement = $this->pdo->prepare($query);
			$statement->execute($params);

			if(explode(' ', $query)[0] == 'SELECT') {
				$data = $statement->fetchAll();
				return $data;
			}
		}

		public function create($params=array()) {
			$message = '';
			try {
				$statement = $this->pdo->prepare("INSERT INTO user(id, email, alarms, notes)
												VALUES(:id, :email, :alarms, :notes)");
				$statement->execute($params);
				$message = "success";
				return $message;
			} catch(PDOException $ex) {
				$message = $ex->getMessage();
				return $message;
			}
		}

		public function update($params=array()) {
			$message= '';
			try {
				$statement = $this->pdo->prepare("UPDATE `user`   
												SET email = :email,
													alarms = :alarms,
													notes = :notes 
												WHERE id = :id");
				$statement->execute($params);
				$message = "success";
				return $message;
			} catch(PDOException $ex) {
				$message = $ex->getMessage();
				return $message;
			}
		}

		public function showAll() {
			$statement = $this->pdo->prepare("SELECT * FROM user");
			$statement->execute();
			$data =  $statement->fetchAll();
			return $data;
		}

		// public function insert($query, $params=array())  {
		// 	echo $params;
		// }
	}
?>