<?php 

include './db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
   $id = intval($_POST['id']);

// Getting the img in db
   $result = $conn->query("SELECT img_path FROM photos WHERE id = $id");
   if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       
       unlink($row['img_path']);
       
    }
    
    // Delete from db
   $conn->query("DELETE FROM photos WHERE id = $id");

   header('Location: input.php');

   exit;
}



?>
    