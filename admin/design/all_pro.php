
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>image</th>
                <th>brand</th>
                <th>category</th>
                <th>count</th>
                <th>control</th>
            </tr>



            <?php
include("fun/connect.php");
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
while ( $row = $result->fetch_assoc()) {

?>


            <tr>
                <td><?php  echo $row['id'];   ?></td>
                <td><?php  echo $row['name'];   ?></td>
                <td><?php  echo $row['price'];   ?></td>
                <td><?php $img =  $row['image'];  
                
                echo "<img style='width:100px;height:100px' src='images/$img'>";
                ?></td>
                <td><?php  $brand_id =  $row['brand'];  
				$brand_sql = "SELECT * FROM brand WHERE id = '$brand_id'";
				$brand_result = $conn->query($brand_sql);
				$brand_row = $brand_result->fetch_assoc();
				echo $brand_row['name']; 

				
				
				?></td>
                <td><?php $cat_id = $row['cat'];  
				$cat_sql = "SELECT * FROM category WHERE id = '$cat_id'";
				$cat_result = $conn->query($cat_sql);
				$cat_row = $cat_result->fetch_assoc();
				echo $cat_row['name'];
				
				
				
				
				?></td>
                <td><?php  echo $row['count'];   ?></td>
                <td>
                <a href="?action=edit&id=<?php  echo $row['id'];   ?>"><button class="btn btn-primary">Edit</button></a>
                <a href="fun/delete_pro.php?id=<?php  echo $row['id'];   ?>"><button class="btn btn-danger">Delete</button></a>

                </td>
            </tr>

 <?php

}


?>
  
    </table>
<br>
    <a href="?action=add"><button class="btn btn-success">Add New</button></a>