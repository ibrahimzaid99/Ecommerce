<form method="POST" action="fun/do_add_pro.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count">
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="descr" style="height:150px;" ></textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image">
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
                    <option value="<?= $row['id']?>"><?= $row['name']?></option>
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
                <option value="<?= $row['id']?>"><?= $row['name']?></option>
    <?php
}




?>


                    </select>
                </div>

                <input type="submit" value="Add Product" class="form-control btn btn-success">
               

                
                

            </form>