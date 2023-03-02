<?php

include("fun/connect.php");

$id = $_GET['id'];

$select= "SELECT * FROM products WHERE id = '$id' ";

$sql = $conn -> query($select);

$row1 = $sql -> fetch_assoc();




?>

<form method="POST" action="fun/do_edit_pro.php" enctype="multipart/form-data">

<input type="hidden" value="<?= $row1['id'] ?>" name="id">

                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name" value="<?=  $row1['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price" value="<?php  echo $row1['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count" value="<?=  $row1['count'] ?>">
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="descr" style="height:150px;" > <?=  $row1['descr'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image">
                    <br>
                    <img style="width:150px;height:150px" src="images/<?= $row1['image'] ?>" alt="">
                </div>
              
                <div class="form-group">
                    <label for="category" style="font-weight: bold;"> Category :</label>
                    <select class="form-control" name="category">

                    <?php

    include("fun/connect.php");

    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){


        ?>
    <option value="<?= $row['id']?>" <?php
    
    
    if($row['id'] == $row1['cat']){ echo " selected"; }
    
    ?>><?= $row['name']?></option>
        <?php
    }




?>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand" style="font-weight: bold;"> Brand :</label>
                    <select class="form-control" name="brand">
                        

                    <?php

$sql = "SELECT * FROM brand";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){


    ?>
                <option value="<?= $row['id']?>"  <?php
    
    
    if($row['id'] == $row1['brand']){ echo " selected"; }
    
    ?>><?= $row['name']?></option>
    <?php
}




?>


                    </select>
                </div>

                <input type="submit" value="Update Product" class="form-control btn btn-info">
               

                
                

            </form>