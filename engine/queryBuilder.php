<?php 

class queryBuilder {

	public $pdo;

	function __construct(){
		// connect db
	    $host = 'localhost';
	    $db   = 'marlindev';
	    $user = 'root';
	    $pass = '';
	    $charset = 'utf8';
	    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";    
	    $this->pdo = new PDO($dsn, $user, $pass);
	}

	//get list of all objects
	function all($tableInDatabase){

		// request into db
			$sql = "SELECT * FROM $tableInDatabase"; 


			$statement = $this->pdo->quote($sql); 
		// preparing request into db	
			$statement = $this->pdo->prepare($sql); 

		// doing true	
			$statement->execute(); 

		// get data in assoc massive	
			$results = $statement->fetchAll(PDO::FETCH_ASSOC); 

			return $results;
	}

	//delete object by id
	function deleteOneById($tableInDatabase, $id){

	    // request into db
	        $sql = "DELETE FROM $tableInDatabase WHERE id=:id"; 


	        $statement = $this->pdo->quote($sql); 
	    // preparing
	        $statement = $this->pdo->prepare($sql); 
	    
	    // doing true
	        $statement->bindParam(":id", $id); 

	    // doing true    
	        $statement->execute();     
	}

	//get object by ib
	function getOneById($tableInDatabase, $id){

		$sql = "SELECT * FROM $tableInDatabase WHERE id=:id"; // request into db
		$statement = $this->pdo->quote($sql); 
		$statement = $this->pdo->prepare($sql); // preparing 
		$statement->bindParam(":id", $id);
		$statement->execute(); // doing true

		$results = $statement->fetch(PDO::FETCH_ASSOC);

		return $results;
	}

	//save new object
	function addNew($tableInDatabase, $data){

		//keys for requests to database
		$keys = array_keys($data);
		$stringOfKeysForTables = implode(',', $keys);
		$stringOfKeysForLabels = ":" . implode(',:', $keys);

		$sql = "INSERT INTO $tableInDatabase ($stringOfKeysForTables) VALUES ($stringOfKeysForLabels)";
		$statement = $this->pdo->quote($sql); 
		$statement = $this->pdo->prepare($sql);

		//example 1
		// $statement->bindParam(":title", $_POST['title']); 
		// $statement->bindParam(":content", $_POST['content']);
		// $result = $statement->execute();

		//example 2
		$result = $statement->execute($data);		
	}

	//edit\update object
	function updateOne($tableInDatabase, $data){
		
		$fields = '';
		foreach ($data as $key => $value) {
			$fields .= $key . "=:" . $key . ",";
		}
		$fields = rtrim($fields, ',');

	    // request into db
			$sql = "UPDATE $tableInDatabase SET $fields WHERE id=:id"; 

			$statement = $this->pdo->quote($sql); 
		 // preparing 
			$statement = $this->pdo->prepare($sql);

		// doing true
			$statement->execute($data); 		
	}

	function checkOne($tableInDatabase, $email, $pass)	{		

		$sql = "SELECT * FROM $tableInDatabase WHERE email=:email AND pass=:pass LIMIT 1";
		$statement = $this->pdo->quote($sql); 
		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(":email", $email);
		$statement->bindParam(":pass", md5($pass));
		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_ASSOC);
		return $user;
	}
}