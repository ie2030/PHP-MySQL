<?php
class Customer{

	private $dbh;

	public function __construct($database) {
	    $this->dbh = $database;
	}


	public function allcustomer() {
	    $sql = "Select customer.CustomerID, Name, Surname, Email, Phone, AddressLine, City, County, LastVisit from customer order by CustomerID";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

public function onecustomer($CustomerID) {
		$sql = 'Select * from customer where CustomerID = :CustomerID';
        $stmt = $this->dbh->prepare($sql);
  	    $stmt->bindParam(':CustomerID', $CustomerID, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
	}

	public function addcustomer($CustomerID, $Name, $Surname, $Email, $Phone, $AddressLine, $City, $County, $LastVisit) {

  $this->dbh->beginTransaction();
  $stmt= $this->dbh->prepare("INSERT INTO customer (CustomerID, Name,  Surname, Email, Phone, AddressLine, City, County, LastVisit) values (:CustomerID, :Name,  :Surname, :Email, :Phone, :AddressLine, :City, :County, :LastVisit)");
  $stmt->bindValue(':CustomerID', $CustomerID, PDO::PARAM_STR);
  $stmt->bindValue(':Name', $Name, PDO::PARAM_STR);
  $stmt->bindValue(':Surname', $Surname, PDO::PARAM_STR);
  $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
  $stmt->bindValue(':Phone', $Phone, PDO::PARAM_STR);
  $stmt->bindValue(':AddressLine', $AddressLine, PDO::PARAM_STR);
  $stmt->bindValue(':City', $City, PDO::PARAM_STR);
  $stmt->bindValue(':County', $County, PDO::PARAM_STR);
  $stmt->bindValue(':LastVisit', $LastVisit, PDO::PARAM_STR);
  $add1=$stmt->execute();
  
  if($add1){
		$this->dbh->commit();
  }
  else   $this->dbh->rollback();
}

public function updaterecord($CustomerID, $Email, $Phone, $AddressLine, $City, $County) {
    $sql = 'UPDATE customer SET 
	Email = :Email,
	Phone = :Phone,
	AddressLine = :AddressLine,
	City = :City,
	County = :County
    WHERE CustomerID = :CustomerID';
    
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindValue(':CustomerID', $CustomerID,PDO::PARAM_STR);
   	$stmt->bindValue(':Email', $Email,PDO::PARAM_STR);
    $stmt->bindValue(':Phone', $Phone ,PDO::PARAM_STR);
    $stmt->bindValue(':AddressLine', $AddressLine,PDO::PARAM_STR);
   	$stmt->bindValue(':City', $City,PDO::PARAM_STR);
    $stmt->bindValue(':County', $County ,PDO::PARAM_STR);
	$stmt->execute();
}



	public function deleterecord($CustomerID) {
    $sql = 'DELETE from customer WHERE CustomerID = :CustomerID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindValue(':CustomerID', $CustomerID,PDO::PARAM_STR);
	$stmt->execute();
}


}
?>