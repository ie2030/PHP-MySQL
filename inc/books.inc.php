<?php
class Book{

  private $db;

  public function __construct($database) {
      $this->db = $database;
  }

  public function allbooks() {
    $sql = "SELECT* from book group by Title  order by BookID DESC;";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function allbooktitles() {
      $sql = "select BookID,Title, Price, Publisher from book";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function onebook($BookID) {
      $sql = 'Select* from book where BookID = :BookID';
      $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':BookID', $BookID, PDO::PARAM_STR);
      $stmt->execute();
        $book=$stmt->fetch(PDO::FETCH_OBJ);
        return $book;/**/
  }

 
  }


 

?>
