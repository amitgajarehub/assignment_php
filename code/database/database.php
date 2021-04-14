<?php 

/**
 * CRUD Functionality
 */
Class Database
{	
	public $db;
	public function __construct($servername, $username, $password, $database)
	{
		$this->db = new mysqli($servername, $username, $password, $database);
		if ($this->db->connect_error) {
		  die("Connection failed: " . $this->db->connect_error);
		}
	}

	public function insert($table, $data)
	{		
		$keys = array_keys($data);
		$columns = implode(", ",$keys);
		$values = implode("', '", $data);
		if ($table) {

			$insert = "INSERT INTO ".$table." (".$columns.") VALUES ('".$values."')";
			return $success = $this->db->query($insert);
		}
	}

	public function update($id, $table, $data)
	{
		foreach ($data as $columns => $value) {
		    $sets[] = "".$columns. "= '".$value."'";
		}
		$col_val = implode(', ', $sets);
		$update = "UPDATE ".$table." SET ".$col_val." where id=".$id."";
		return $result = $this->db->query($update);
	}

	public function delete($table, $id)
	{
		$delete = "DELETE FROM ".$table." where id=".$id."";
		return $success = $this->db->query($delete);
	}
}

$db = new Database("localhost", "root", "", "ns_php");

 ?>