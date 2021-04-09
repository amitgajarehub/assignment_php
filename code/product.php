<?php 

class Product
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	public $conn;

	public function __construct($db)
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $db);
		
		// Check connection
		if ($this->conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
	}

	public function insert($table, $data)
	{		
		$keys = array_keys($data);
		$columns = implode(", ",$keys);
		$values = implode("', '", $data);
		if ($table) {

			$insert = "INSERT INTO ".$table." (".$columns.") VALUES ('".$values."')";
			return $success = $this->conn->query($insert);
		}
	}

	public function select($table)
	{
		$select = "SELECT * FROM ".$table."";
		return $success = $this->conn->query($select);
	}

	public function update($id, $table, $data)
	{
		foreach ($data as $columns => $value) {
		    $sets[] = "".$columns. "= '".$value."'";
		}
		$col_val = implode(', ', $sets);
		$update = "UPDATE ".$table." SET ".$col_val." where id=".$id."";
		$result = $this->conn->query($update);
	}

	public function delete($table, $id)
	{
		$delete = "DELETE FROM ".$table." where id=".$id."";
		return $success = $this->conn->query($delete);
	}
}

 ?>