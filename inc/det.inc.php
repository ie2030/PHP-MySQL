<?php
class OrdersDetails{

	private $dbh;

	public function __construct($database) {
	    $this->dbh = $database;
	}

	public function allorders() {
		$sql = "SELECT orderdetails.OrderID, orderdetails.BookID, Quantity from orderdetails order by OrderID ";
		$stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
public function onedetrec ($OrderID, $BookID, $Quantity) {
   $sql = 'SELECT* from orderdetails where
   BookID = orderdetails.BookID and OrderID = orderdetails.OrderID and Quantity = Quantity';
   $stmt =$this->dbh->prepare($sql);
   $stmt->bindParam(':OrderID', $OrderID, PDO::PARAM_STR);
   $stmt->execute();
     return $stmt->fetch();
  }

public function updatedetails ($Quantity) {
    
   $sql = 'UPDATE orderdetails SET
   Quantity = :Quantity
   
   WHERE OrderID = :OrderID and BookID = :BookID';
   $stmt = $this->dbh->prepare($sql);
   $stmt->bindValue(':OrderID', $OrderID,PDO::PARAM_STR);
   $stmt->bindValue(':BookID', $BookID,PDO::PARAM_STR);
   $stmt->bindValue(':Quantity', $Quantity,PDO::PARAM_STR);
   $stmt->execute();
}
}
?>