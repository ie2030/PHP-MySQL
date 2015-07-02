<?php
class Book{

	private $dbh;

	public function __construct($database) {
	    $this->dbh = $database;
	}

	public function allbook() {
		$sql = "SELECT book.BookID,	Category, Title, Author, Publisher, Synopsis, PageNum, PubDate, ReleaseDate, Price from book order by BookID";
		$stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
		
	public function onebook($BookID) {
		$sql = 'SELECT* from book where BookID = :BookID';
        $stmt = $this->dbh->prepare($sql);
  	    $stmt->bindParam(':BookID', $BookID, PDO::PARAM_STR);	
		$stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
}
	
	
	public function findbook($Title) {
			$sql = "select book.BookID, Category,  Title, Author, Publisher, Synopsis, PageNum, PubDate, ReleaseDate, Price from book where Title like :Title group by Title";
	        $stmt = $this->dbh->prepare($sql);
	  	    $stmt->bindValue(':Title', "%".$Title."%", PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	
	
  public function addbook($BookID, $Category, $Title, $Author, $Publisher, $Synopsis, $PageNum, $PubDate, $ReleaseDate, $Price)
{
  $this->dbh->beginTransaction();
  $stmt= $this->dbh->prepare("INSERT INTO book (BookID,	Category, Title, Author, Publisher, Synopsis, PageNum, PubDate, ReleaseDate, Price) values (:BookID, :Category, :Title, :Author, :Publisher, :Synopsis, :PageNum, :PubDate, :ReleaseDate, :Price) ON DUPLICATE KEY UPDATE  Publisher= (Publisher = :Publisher);");
   $stmt->bindValue(':BookID', $BookID, PDO::PARAM_STR);
   $stmt->bindValue(':Category', $Category, PDO::PARAM_STR);
   $stmt->bindValue(':Title', $Title, PDO::PARAM_STR);
   $stmt->bindValue(':Author', $Author, PDO::PARAM_STR);
   $stmt->bindValue(':Publisher', $Publisher, PDO::PARAM_STR);
   $stmt->bindValue(':Synopsis', $Synopsis, PDO::PARAM_STR);
   $stmt->bindValue(':PageNum', $PageNum, PDO::PARAM_STR);
   $stmt->bindValue(':PubDate', $PubDate, PDO::PARAM_STR);
   $stmt->bindValue(':ReleaseDate', $ReleaseDate, PDO::PARAM_STR);
   $stmt->bindValue(':Price', $Price, PDO::PARAM_STR);
   $add=$stmt->execute();
	
   if($add){
		$this->dbh->commit();
  }
  else   $this->dbh->rollback();
}

public function updatebook($BookID, $Category, $Synopsis, $Price) {
    $sql = 'UPDATE book SET 
	Category = :Category,
	Synopsis= :Synopsis,
    Price = :Price
    WHERE BookID = :BookID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':BookID', $BookID,PDO::PARAM_STR);
   	$stmt->bindParam(':Category', $Category,PDO::PARAM_STR);
    $stmt->bindParam(':Synopsis', $Synopsis ,PDO::PARAM_STR);
	$stmt->bindParam(':Price', $Price ,PDO::PARAM_STR);
	$stmt->execute();
}

public function deleterecord($BookID){
	
	$sql = 'DELETE from book WHERE BookID = :BookID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':BookID', $BookID,PDO::PARAM_STR);//binParam pass value but not parameter if use bindValu can pass both
	$stmt->execute();
	
}

}	
?>
