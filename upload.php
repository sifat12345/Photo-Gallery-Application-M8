<?php 

include './db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
   $title = $_POST['title'];
   $img = $_FILES['img_path'];
    echo '<pre>';
    // print_r($_FILES['img_path']);
}


if(isset($img) && $img['tmp_name'] !== ""){
    // $up_dir ="upload/";
    $file_path = "upload/". basename($img['name']);
    // echo $file_path;
    if(move_uploaded_file($img['tmp_name'], $file_path)){
        $conn->query("INSERT INTO photos (title, img_path) VALUES('$title', '$file_path')");
    header('Location: input.php');
        exit;    
    }else{
        header('Please, Select A File'); 
    }

}



?>
    