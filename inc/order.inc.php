<?php
class Order{

	private $dbh;

	public function __construct($database) {
	    $this->dbh = $database;
	}

	public function allorders() {
		$sql = "select orders.OrderID, orders.CustomerID, OrderDate, Status from orders order by OrderID";
		$stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


    public function onerecord($OrderID) {
	 $sql = 'Select * from  customer, orders where
	  customer.CustomerID = orders.CustomerID and OrderID = :OrderID';
	 $stmt =$this->dbh->prepare($sql);
     $stmt->bindParam(':OrderID', $OrderID, PDO::PARAM_STR);
	 $stmt->execute();
     return $stmt->fetch();
	}




public function addord($CustomerID, $OrderDate, $Status) {
     $stmt= $this->dbh->prepare("INSERT INTO orders (CustomerID, OrderDate, Status) values (:CustomerID, :OrderDate, :Status)");
    
	$stmt->bindValue(':CustomerID', $CustomerID, PDO::PARAM_STR);
	 $stmt->bindValue(':OrderDate', $OrderDate, PDO::PARAM_STR);
	 $stmt->bindValue(':Status', $Status, PDO::PARAM_STR);
     $add1=$stmt->execute();
	 
}
	
	public function updaterecord($OrderID, $OrderDate, $Status) {
		
	 $sql = 'UPDATE orders SET
	 OrderDate = :OrderDate,
	 Status = :Status
	 WHERE OrderID = :OrderID ';
     $stmt = $this->dbh->prepare($sql);
     $stmt->bindValue(':OrderID', $OrderID,PDO::PARAM_STR);
	 $stmt->bindValue(':OrderDate', $OrderDate,PDO::PARAM_STR);
	 $stmt->bindValue(':Status', $Status,PDO::PARAM_STR);
	 $stmt->execute();
    }


	public function deleterecord($OrderID) {
     $sql = 'DELETE from orders WHERE OrderID = :OrderID';
     $stmt = $this->dbh->prepare($sql);
     $stmt->bindValue(':OrderID', $OrderID,PDO::PARAM_STR);
 	 $stmt->execute();
	 
    
}
}
?>
