<?php
class Database extends PDO{

	public $dbserver = '';
    public $database = '';
	public $username = '';
	public $password = '';

	public function __construct(){
		$this->dbserver = 'localhost';
		$this->database = 'dima-bookshop';
		$this->username = 'root';
		$this->password = 'root';
      try {
		parent::__construct("mysql:host=".$this->dbserver.";dbname=".$this->database, $this->username, $this->password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
	    echo '<br>Problem with Connecting to the database - ';
	    exit ($e->getMessage());
     }
	}
}
	$dbh  = new Database;
?>