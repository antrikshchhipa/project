<?php include("connection.php");?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Navigation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="style/style.css">
	   <link rel="stylesheet" href="style/style1.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
	</head>

<body>

<!--Header-->	
<?php 
    include("header.php");
	$query = mysql_query("Select * from `question`");
	
	
?>
<!--/Header-->



<!--Icons-->
<br><br>

<div class = "container" style="padding-left:0; padding-right:0;" >			
	<div class="media_div col-sm-7 col-xs-12 question-outer " >
			<?php 
			 $i=1;
				while($row=mysql_fetch_array($query))
				{	?>
			
			<div class="col-sm-8 col-xs-12 question-display">
							<p><b><?php echo $i.".</b>  ".$row['question'] ;?></p>
							
									<ul class="options clearfix" >
										<li>
											<span>
												<a href="JavaScript:void(0)">A.
												<?php echo $row['opt1']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a href="JavaScript:void(0)">B.
												<?php echo $row['opt2']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a href="JavaScript:void(0)">C.
												<?php echo $row['opt3']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a href="JavaScript:void(0)">D.
												<?php echo $row['opt4']; ?>
												</a>
											</span>
										</li>
										
											
									</ul>
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="view-answer" href="#">&nbsp;View Answer</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="discuss" href="#">&nbsp;Discuss in forum</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="workspace" href="#">&nbsp;Workspace</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="report" href="#">&nbsp;Report</a>
							</div>
						</div> <br> <br> <br>
						
			 <?php $i++;  }?>	
	</div>
	


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
