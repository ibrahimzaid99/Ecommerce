<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">

<?php



$select = "SELECT * FROM products ORDER BY id DESC LIMIT 3";

$query = $conn->query($select);
$x = 0;
while ($row = $query->fetch_assoc()) {
    ?>


							<div class="item <?php
                            
                            if($x == 0){
                                echo "active";
                                $x++;
                            }
                            
                            ?>">
								<div class="col-sm-6">
									<h1><span><?= $row['name']  ?></span></h1>
									<h2><?= $row['price']  ?></h2>
									<p><?= $row['descr']  ?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img style="width:300px;
                                    height:350px" src="admin/images/<?= $row['image'] ?>" class="girl img-responsive" alt="" />
									
								</div>
							</div>
                            
		    <?php
}


?>				
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->