<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery App</title>
    <?php include './css.php' ?>
    <?php include './db.php' ?>
    
</head>
<body>
    <div class="container">
        <h1>Photo Gallery</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Photo Title"  required>
            <input type="file" name="img_path" accept="image/*"  required>
            <button type="submit">Upload</button>
        </form>
        <hr>
        

        <!-- Photo Details -->
      <?php
        $result = $conn->query("SELECT * FROM photos ORDER BY cr_at DESC");
        if($result->num_rows > 0):
            while($row = $result->fetch_assoc()):      

        ?>

            <div style="margin-top:55px">
                <h2><?= $row['title']; ?></h2>
                    <img src="<?= $row['img_path']; ?>" alt="Image">
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
             
            </div>

            <?php  endwhile; 
              else:
                echo 'No Photo Added';
              endif
            
            ?>

    </div>
    
    

</body>
</html>