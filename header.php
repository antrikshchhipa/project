<?php 
session_start();
require ('connection.php');
?>
<script>

</script>
	<div class="row" style="position:fixed; z-index:100; background-color:white; width:100% !important; margin-left:0px; margin-right:0px; ">
		     <!--upper strip-->
			<div class="col-xs-12" style="background-color:white; height:10px;">
			</div>
			
			<!--Navigation div-->
			<div class="col-md-12" style="background-color:; height:73px;">
				
				    <!--Logo-->
				
					<div  class="col-md-3 col-sm-3 col-xs-6" style=" position:relative; min-height:1px; padding-right:15px; padding-left:15px; height:83px;">
					 <a href="index.php"><img src="images/logo.png" style="max-width:100%; max-height:100%;"></a>
					</div>
				
				
				 <!--search and sign in-->
					<div class="col-md-9 col-sm-9 col-xs-6" style="background-color:; height:73px; ">
						<div style="float:right; padding-top: 2%;">
							<ul id="nav_search"style=" ">
							<?php 
							if(isset($_SESSION['username']))
							{  ?>
							<li class="nav_li user_info">
							   <div class="dropdown" style="display:table;">
									<div class="login_info dropdown-toggle" id="user_dropdown" data-toggle="dropdown">
										<span class="glyphicon glyphicon-user" style="margin-top: 1%;"></span>&nbsp;&nbsp;<?php echo $_SESSION['username'];?>
										<span class="caret"></span>
									</div>
									<ul class="dropdown-menu user-drop" role="menu">
										<div class="arrow-up"></div>
										<li role="menuitem"><?php echo $_SESSION['email'];?></li>
										<li class="divider"></li>
										<li role="menuitem" class="logout">
										<a href="JavaScript:void(0)">Logout</a></li>
									</ul>
								</div>
						   </li>
							<?php } 
							else {?>
							<li class="nav_li user_info">
								<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#signup" style="padding: 8px 12px;background-color: #031658; color:#fff;">Login / Register</button>
							</li>
							<?php }?>
							<li class="nav_li"  id="search" >
								<form   class="navbar-form navbar-left">
									<div class="form-group" style=" border-style:solid; border-width:thin;">
									  <input type="text" class="form-control" placeholder="Search" style=" border-width: 0 !important; border-style:solid; border-width:thin;">
									 </div>	
									  <button type="submit" class="btn btn-default glyphicon glyphicon-search headdiv"></button>
								</form>
							</li>
							    
						   </div>
					</div>
			</div>
		</div>	
			
				
			<!--Menu bar-->
			
				<div style="padding-top:90px;">	
              	<div class="col-xm-12 search-mobile">
					<form class="navbar-form search-form" style="margin-left:15px; margin-right:auto;">
						<div class=" form-group" style=" border-style:solid; border-width:thin; width:80%; float:left;">
						     <input type="text" class="form-control" placeholder="Search" style=" border-width: 0 !important;">
						 </div>	
						<button type="submit" class="btn btn-default glyphicon glyphicon-search headdiv" style="margin-top:-1px;"></button>
				    </form>
				</div>				
				<div class="topnav" style="background-color:#e84c4c !important; padding-left:4%;" id="myTopnav">
				  <a href="#home">Home</a>
				  <a href="#about">About</a>
				  <a href="#news">G.K.</a>
				  <a href="#contact">Reasoning</a>
				  <a href="#about">Maths</a>
				  <a href="#home">English</a>
				  <a href="#news">Engineering</a>
				  <a href="#contact">Medical</a>
				  <a href="#about">Interview</a>
				  <a href="#contact">Test</a>
				  <a href="javascript:void(0);" style="font-size:15px; margin:0px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
				
				
			</div>
			
		

				
				
				
	<!--modal for Signup -->
		<div class="container">	
			<div id="signup" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width:80%; margin-top:90px; margin-left:auto; margin-right:auto;">
				
					
							<!-- modal Content #ffffb3-->
							<div class = "modal-content"> 
								
									<div class="modal-header" style="background-color:#e84c4c !important;">
										<button type="button" id="close-modal" class="close" data-dismiss="modal">&times;</button>
									</div>
								
									
								<div class="modal-body" style="padding:25px;" >
									<div class="row" id="modal" >
										  
											<div class="col-xs-12 col-md-6 login">
												<div class="col-xs-12 col-md-12">
													<h2 style="color:#031658">Login</h2><br>
													<!-- Login form-->
													<form class="login_form">
														<div class="form-group">
														  <label>Email:</label>
														  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
														</div>
														<div class="form-group">
															<label for="pwd">Password:</label>
															<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
														</div>
														<div class="checkbox">
														  <label><input type="checkbox" name="remember"> Remember me</label>
														</div>
														<button type="submit" id="login" class="btn btn-default" style="background-color:#031658; color:white;">Login</button>
													</form>
												</div>
												
												<!--Facebook Login -->
												<div class="col-xs-12 col-md-12">
													<h3 class="text-danger" style="text-align:center; font-weight:bold;">OR</h3>
													<div id="status"></div>
													<!-- Facebook login or logout button -->
													<button onclick="fbLogin()" id="fbLink"><img src="images/fblogin.png" alt="Login with Facebook"></img></button>
													<!-- Display user profile data -->
													<div id="userData"></div>
												</div>
												
											</div>
											
											
										<div class="col-xs-12 col-md-6 login" >
											<!-- Register form-->
											<h2 style="color:#031658;">Register</h2><br>
											<form class="register_form" method="post">
												<div class="form-group">
												  <label>User Name:</label>
												  <input type="text" class="form-control"  placeholder="Enter Your Name" name="name" required>
												</div>
												<div class="form-group">
												  <label>Email:</label>
												  <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
												</div>
												<div class="form-group">
												  <label>Password:</label>
												  <input type="password" class="form-control password" placeholder="Enter Password" name="password" autocomplete="off" onDrop="return false" onselectstart="return false" onpaste="return false;" onCopy="return false"   required>
												  <div></div>
												</div>
												<div class="form-group">
												  <label>Confirm Password:</label>
												  <input type="password" class="form-control confirm_password" placeholder="Retype Passsword" name="confirm_password" autocomplete="off" onselectstart="return false" onpaste="return false;" onCopy="return false"  required>
												   <div></div>
												</div>
												
												<div class="checkbox">
												  <label><input type="checkbox" class="tnc" name="remember" required checked><a href="">I agree term & Conditions</a></label>
												</div>
												<div id="register_result"></div>
												<button  type="submit" id="register" class="btn btn-default" style="background-color:#031658; color:white;">Register</button>
											</form>
										</div>
									</div>	
								</div>
								<div class="modal-footer" style="background-color:#e84c4c !important; height:50px;">
									
								</div>
								
							</div>
							
						
				</div>
			</div>	
		</div>