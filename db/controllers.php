<?php
class Controll
{
   private $db;

   public function __construct($conn)
   {
      $this->db = $conn;
   }

   public function getAllKrathu()
   {
      try {
         $sql = "SELECT * FROM krathu";
         $stmt = $this->db->prepare($sql);
         $stmt->execute();

         $krathus = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $krathus;
      } catch (PDOException $e) {
         // throw $e;
         echo $e->getMessage();
      }
   }

   public function getKrathu($krathu_id)
   {
      try {
         $sql = "SELECT * FROM krathu WHERE krathu_id = :krathu_id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':krathu_id', $krathu_id, PDO::PARAM_INT);
         $stmt->execute();

         $krathu = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $krathu;
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   public function createKrathu($krathu_name, $details, $full_name, $id_card)
   {
      try {
         // SQL query for inserting data into krathu table
         $sql = "INSERT INTO krathu (krathu_name, details, full_name, id_card) VALUES (:krathu_name, :details, :full_name, :id_card)";

         // Prepare the SQL statement
         $stmt = $this->db->prepare($sql);

         // Bind parameters with values
         $stmt->bindParam(':krathu_name', $krathu_name, PDO::PARAM_STR);
         $stmt->bindParam(':details', $details, PDO::PARAM_STR);
         $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
         $stmt->bindParam(':id_card', $id_card, PDO::PARAM_STR);

         // Execute the SQL statement
         $stmt->execute();

         // Return true if insertion successful
         return true;
      } catch (PDOException $e) {
         // If any errors occur during execution, catch the exception and display the error message
         echo "Error: " . $e->getMessage();
         // Return false to indicate failure
         return false;
      }
   }

   public function addComment($krathu_id, $details, $full_name, $id_card)
   {
      try {
         // SQL query for inserting data into comment table
         $sql = "INSERT INTO comments (krathu_id, details, c_full_name, c_id_card) VALUES (:krathu_id, :details, :c_full_name, :c_id_card)";

         // Prepare the SQL statement
         $stmt = $this->db->prepare($sql);

         // Bind parameters with values
         $stmt->bindParam(':krathu_id', $krathu_id, PDO::PARAM_INT);
         $stmt->bindParam(':details', $details, PDO::PARAM_STR);
         $stmt->bindParam(':c_full_name', $full_name, PDO::PARAM_STR);
         $stmt->bindParam(':c_id_card', $id_card, PDO::PARAM_STR);

         // Execute the SQL statement
         $stmt->execute();

         // Return true if insertion successful
         return true;
      } catch (PDOException $e) {
         // If any errors occur during execution, catch the exception and display the error message
         echo "Error: " . $e->getMessage();
         // Return false to indicate failure
         return false;
      }
   }

   public function getComments($krathu_id)
   {
      try {
         $sql = "SELECT * FROM comments WHERE krathu_id = :krathu_id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':krathu_id', $krathu_id, PDO::PARAM_INT);
         $stmt->execute();

         $krathu = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $krathu;
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }
}
