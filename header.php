<?php echo '<div class="header_up">
				
				<div class="menu">';
					$page_name = basename($_SERVER['PHP_SELF']);
					if( $page_name == 'plan.php' || $page_name == 'count.php' || $page_name == 'interest.php' || $page_name == 'insertElement.php' || $page_name == 'deleteElement.php' || $page_name == 'graduated.php' || $page_name == 'moreInterests.php' )
					echo '<a class="active" href="plan.php"><i class="fa fa-home"></i> Home</a>
					<a href="index2.php"><i class="fa fa-address-book"></i> XML profiles</a>
					<a href="merge.php"><i class="fa fa-users"></i> Integrated profile</a>
					<a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>'; 
					else if( $page_name == 'index2.php' || $page_name == 'index3.php' || $page_name == 'index4.php' || $page_name == 'index5.php')
					echo '<a href="plan.php"><i class="fa fa-home"></i> Home</a>
					<a class="active" href="index2.php"><i class="fa fa-address-book"></i> XML profiles</a>
					<a href="merge.php"><i class="fa fa-users"></i> Integrated profile</a>
					<a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>'; 
					else if( $page_name == 'merge.php' || $page_name == 'upload.php' || $page_name == 'uploadRDF.php' )
					echo '<a href="plan.php"><i class="fa fa-home"></i> Home</a>
					<a href="index2.php"><i class="fa fa-address-book"></i> XML profiles</a>
					<a class="active" href="merge.php"><i class="fa fa-users"></i> Integrated profile</a>
					<a href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>'; 	
			else if( $page_name == 'converter.php' || $page_name == 'ocupation.php' )
					echo '<a class="active" href="../../plan.php"><i class="fa fa-home"></i> Home</a>
					<a href="../../index2.php"><i class="fa fa-address-book"></i> XML profiles</a>
					<a href="../../merge.php"><i class="fa fa-users"></i> Integrated profile</a>
					<a href="../../log/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>'; 	
					
					else if( $page_name == 'logout.php' )
					echo '<a href="plan.php"><i class="fa fa-home"></i> Home</a>
					<a href="index2.php"><i class="fa fa-address-book"></i> XML profiles</a>
					<a href="merge.php"><i class="fa fa-users"></i> Integrated profile</a>
					<a class="active" href="log/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>'; 		
?>