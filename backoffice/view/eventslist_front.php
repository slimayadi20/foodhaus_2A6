


<?php 

/* require 'php/courses/core/coursemanager.php'; */
//require '/opt/lampp/htdocs/Formini/php/courses/core/courseManager.php';
require_once __DIR__ . '../controller/evenement_C.php' ;
//var_dump(__DIR__) ;
$manager =new evenement_C () ;

if(!isset($_GET['id']))
{

	$reponse=$manager->afficherevenement() ;
}






while($data=$reponse->fetch())
{
?>






						<!-- News Block Three -->
						<div class="row">
							<div class="col-md-8 col-lg-9">
								<div class="impic-blo4 hov-img-zoom bo-rad-10 pos-relativeage">
									<a href="event.php?id=<?=$data['id'] ?>"><img src="images/resource/<?=$data['img'] ?>" alt="" /></a>
								</div>
								<div class="text-blo4 p-t-33">
									<h4 class="p-b-16">
												<a href="blog-detail.html" class="tit9"><?=$data['title'] ?></a>
									</h4>

									<div class="txt32 flex-w p-b-24">
									<span>
									<?=$data['id'] ?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									<?=$data['date'] ?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										Cooking, Food
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>
								<p>
								<?=$data['description'] ?>
								</p>

								
							</div>
						</div>
 <?php
}
 ?>         
            