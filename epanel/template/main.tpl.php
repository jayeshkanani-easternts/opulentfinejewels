<?php include "includes/header.php"; ?>
<body>
  <section id="container">
	<!--header start-->
		<header class="header white-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>
            <!--logo start-->
            <a href="index.php" class="logo">EASTERN<span>Admin</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
				<ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!--<img alt="" src="img/avatar1_small.jpg">-->
                            <span class="username"><?=$_SESSION['username']?></span>
                            <b class="caret"></b>
                        </a>
						<?php 
						$flag = 0;
						if($_SESSION['group'] == 1)
						{
							$flag = 1;
						}
						
						?>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
							<?php
							if($flag == 1)
							{
							echo '	
							
							<li><a href="index.php?controller=user&action=usergroup&subaction=listData" title="Manage Permission"><i class="fa fa-user"></i>&nbsp;Manage<br>User Groups</a></li>
                            <li><a href="index.php?controller=user&action=user&subaction=listData" title="Manage Permission"><i class="fa fa-user"></i>&nbsp;Manage<br>Users</a></li>
                            <li><a href="index.php?controller=permission&action=permission&subaction=listData" title="Manage Permission"><i class="fa fa-lock"></i>&nbsp;Manage<br>Permission</a></li>
							';
							}
							?>
						  
						  
						  
						  
						<li><a href="index.php?controller=user&action=changepwd" title="Change Password"><i class="fa fa-asterisk"></i>&nbsp;Change<br>Password</a></li>
						<li><a href="logoff.php" title="Logout"><i class="fa fa-power-off"></i>&nbsp;Logout</a></li>
                        </ul>
					</li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
					<?php 
					if($_REQUEST['controller'] == ""){
						$class='class="active"';
					}
					else
					{
						$class='';
					}
					?>
                      <a <?php echo $class; ?> href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <?php
				  
				  if($_SESSION['group'] == 1)
				  {
					  echo '<li><a '; 
					  if($_REQUEST['controller'] == 'analytics') 
						  echo 'class="active"'; 
					  echo ' href="index.php?controller=analytics&action=dashboard&subaction=listData">
                          <i class="fa fa-bar-chart"></i>
                          <span>Google Analytics</span>
                      </a>
                      </li>';
				  }
				
				  ?>
				  
				  <?php
					$q = "select * from permission_master where group_id = '".$_SESSION['group']."'"; 
					$r = ets_db_query($q);

					$per = array();

					while($arr = ets_db_fetch_array($r))
					{
						$q1 = "select module_controller from module_master where module_id = '".$arr['module_id']."'";
						$r1 = ets_db_query($q1);
						$controller = ets_db_fetch_assoc($r1);
						$p = $arr['permissions'];
						$per[$controller['module_controller']] = $arr['permissions'];
					}

					?>
				  <?php 
				  if($per['pages'])
				  {
						 echo '<li class="sub-menu">
						  <a href="javascript:;" class="';
						  if($_REQUEST['controller'] == 'pages') 
						  echo 'active'; 
						  echo   '"><i class="fa fa-file-text-o"></i>
							  <span>Pages</span>
						  </a>
						  <ul class="sub">
							<li><a href="index.php?controller=pages&action=pages&subaction=listData">List Page</a></li>
							<li><a href="index.php?controller=pages&action=pageimages&subaction=listData">Page Images</a></li>
							<li><a href="index.php?controller=pages&action=homecontent&subaction=editmaincontentform">Manage Home Content</a></li>
						  </ul>
						</li>'; 
				  }
				  ?>				  
				  <?php
				  if($per['slider'])
				  {
						  echo '<li>
							  <a href="index.php?controller=slider&action=slider&subaction=listData" class="';
							  if($_REQUEST['controller'] == 'slider') 
								  echo 'active'; 
							  echo '">
								  <i class="fa fa-picture-o"></i>
								  <span>Slider Image</span>
							  </a>
						  </li>'; 
				  }
				  ?>
                  <?php
				  if($per['banner'])
				  {
						  echo '<li>
							  <a href="index.php?controller=banner&action=banner&subaction=listData" class="';
							  if($_REQUEST['controller'] == 'banner') 
								  echo 'active'; 
							  echo '">
								  <i class="fa fa-picture-o"></i>
								  <span>Banner Image</span>
							  </a>
						  </li>'; 
				  }
				  ?>
				  
				
				  
                

				  <?php

                  if ($per['jobs'] ) 
                  {

	                      echo '<li class="sub-menu">
	                      <a href="javascript:;" class="';
	                      if ($_REQUEST['controller'] == 'jobs')
	                          echo 'active';
	                      echo '" >
	                        <i class="fa fa-picture-o"></i>
							<span>Jobs</span>
	                      </a>
	                      <ul class="sub">
	                     
	                           <li><a href="index.php?controller=jobs&action=jobs&subaction=listData">Manage Jobs</a></li>
	                          
	                    </ul>
	                  </li>';
                    }
                  ?>
                
                  
				  <?php 
				  if($per['news'])
				  {
						 echo '<li class="sub-menu">
						  <a href="index.php?controller=news&action=news&subaction=listData" class="';
						  if($_REQUEST['controller'] == 'news') 
						  echo 'active'; 
						  echo   '"><i class="fa fa-newspaper-o"></i>
							  <span>News</span>
						  </a>

						</li>';
				  }
				  ?>
                  
				  <?php /*
				  if($per['services'])
				  {
						 echo '<li class="sub-menu">
						  <a href="index.php?controller=services&action=services&subaction=listData" class="';
						  if($_REQUEST['controller'] == 'services') 
						  echo 'active'; 
						  echo   '"><i class="fa fa-quote-left"></i>
							  <span>Products</span>
						  </a>

						</li>'; 
				  }
				  */?>

                  <?php

//                                      if ($per['producttype'] || $per['productoptions'] ) {
                  echo
                  '<li class="sub-menu">
                      <a href="javascript:;" class="';
                  if ($_REQUEST['controller'] == 'products')
                      echo 'active';
                  echo '" >
                      <i class="fa fa-building"></i>
                          <span>Projects</span>
                      </a>
                      <ul class="sub">';
                  echo '<li><a href="index.php?controller=products&action=producttype&subaction=listData">Manage Type</a></li>';

                  echo '</ul>
                  </li>';
//                                      }

                  ?>

                  <?php
                  if ($per['brochure']) {
                      echo
                      '<li>
                      <a href="index.php?controller=brochure&action=brochure&subaction=listData" class="';
                      if ($_REQUEST['controller'] == 'brochure')
                          echo 'active';

                      echo '">
                          <i class="fa fa-users"></i>
                          <span>Brochure Downloads</span>
                      </a>
                  </li>';
                  }
                  ?>
				  
				  <?php /*
				  if($per['testimonial'])
				  {
					 echo '<li class="sub-menu">
                      <a href="javascript:;" class="';
					  if($_REQUEST['controller'] == 'testimonial') 
					  echo 'active'; 
                      echo   '"><i class="fa fa-quote-left"></i>
                          <span>Testimonial</span>
                      </a>
                      <ul class="sub">
						<li><a href="index.php?controller=testimonial&action=testimonialtype&subaction=listData">Testimonial Type</a></li>
						<li><a href="index.php?controller=testimonial&action=testimonial&subaction=listData">Testimonial</a></li>
					  </ul>
					</li>'; 
				  }
				  */?>
                  
				  <?php /*
				  if($per['faq'])
				  {
					 echo '<li class="sub-menu">
                      <a href="javascript:;" class="';
					  if($_REQUEST['controller'] == 'faq') 
					  echo 'active'; 
                      echo   '"><i class="fa fa-quote-left"></i>
                          <span>FAQ</span>
                      </a>
                      <ul class="sub">
						<li><a href="index.php?controller=faq&action=faqtype&subaction=listData">Faq Type</a></li>
						<li><a href="index.php?controller=faq&action=faq&subaction=listData">Faq</a></li>
					  </ul>
					</li>'; 
				  }
				  */?>
				  
				  
				  <?php 
				  if($per['gallery'])
				  {
						 echo '<li class="sub-menu">
						  <a href="javascript:;" class="';
						  if($_REQUEST['controller'] == 'gallery') 
						  echo 'active'; 
						  echo   '"><i class="fa fa-file-image-o"></i>
							  <span>Gallery</span>
						  </a>
						  <ul class="sub">
							<li><a href="index.php?controller=gallery&action=album&subaction=listData">Album</a></li>
							<li><a href="index.php?controller=gallery&action=gallery&subaction=listData">Gallery</a></li>
						  </ul>
						</li>'; 
				  }
				  ?>

                 <!-- --><?php
/*                  if($per['personality'])
                  {
                      echo '<li class="sub-menu">
						  <a href="index.php?controller=personality&action=personality&subaction=listData" class="';
                      if($_REQUEST['controller'] == 'personality')
                          echo 'active';
                      echo   '"><i class="fa fa-quote-left"></i>
							  <span>Famous Personality</span>
						  </a>
						</li>';
                  }
                  */?>

				 
				
				  <?php
				  /*if($per['job'])
				  {
						  echo '<li>
							  <a href="index.php?controller=job&action=job&subaction=listData" class="';
							  if($_REQUEST['controller'] == 'job') 
								  echo 'active'; 
							  echo '">
								  <i class="fa fa-users"></i>
								  <span>Career</span>
							  </a>
						  </li>'; 
				  }*/
				  ?>
				  
				  <?php
				  if($per['contact'])
				  {
						  echo '<li>
							  <a href="index.php?controller=contact&action=contact&subaction=listData" class="';
							  if($_REQUEST['controller'] == 'contact') 
								  echo 'active'; 
							  echo '">
								  <i class="fa fa-users"></i>
								  <span>Inquiry</span>
							  </a>
						  </li>';
				  }
				  ?>
				  
				  <?php
/*				  if($per['appointment'])
				  {
						  echo '<li>
							  <a href="index.php?controller=appointment&action=appointment&subaction=listData" class="';
							  if($_REQUEST['controller'] == 'appointment') 
								  echo 'active'; 
							  echo '">
								  <i class="fa fa-users"></i>
								  <span>Appointment</span>
							  </a>
						  </li>';
				  }
				  */?>
	
				  
				  <?php
				   if($per['subscription'])
				   {
//					   if(strpos($_SESSION['userper'],'v') !== false) {
						   echo
						  '<li>
							  <a href="index.php?controller=subscription&action=subscription&subaction=listData" class="';
							  if($_REQUEST['action'] == 'subscription') 
								  echo 'active'; 

							  echo '">
								  <i class="fa fa-pencil-square"></i>
								  <span>Subscription List</span>
							  </a>
						  </li>';
//					   }
				   }
				  ?>
				  

                  <?php
                  if($per['job'])
                  {
                      echo '<li>
                      <a href="index.php?controller=job&action=job&subaction=listjob" class="';
                      if($_REQUEST['controller'] == 'job')
                          echo 'active';
                      echo '">
                          <i class="fa fa-cogs"></i>
                          <span>Jobs</span>
                      </a>
                  </li>';
                  }
                  ?>
                  
                  <?php 
				  if($per['settings'])
				  {
						 echo '<li class="sub-menu">
						  <a href="javascript:;" class="';
						  if($_REQUEST['controller'] == 'settings') 
						  echo 'active'; 
						  echo   '"><i class="fa fa-cog"></i>
							  <span>Settings</span>
						  </a>
						  <ul class="sub">
							<li><a href="index.php?controller=settings&action=epanel&subaction=addForm">e-Panel Settings</a></li>
							<li><a href="index.php?controller=settings&action=website&subaction=addForm">Website Settings</a></li>
						  </ul>';
				  }
				  ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
		<section class="wrapper">
            <!--state overview start-->
            <div class="container-fluid">
				<div class="row admin-container">
					<div class="box col-sm-12">
						<?php  include $header_include; ?>
						<div class="box-content">
							<?php 	include $content_include;?>
						</div>
					</div>
				</div>
			</div>	
		</section>
      </section>
	  <footer class="site-footer">
          <div class="text-right">
             <?php 
				$powered = unserialize($epanel_arr['powered_by']);
			 ?>
			 <strong>Copyright &copy; <?php echo $powered['title']; ?> | Powered By : <strong><a href="<?php echo $powered['link']; ?>" target="_blank" class="footer"> Eastern Techno Solutions.</strong>
          </div>
      </footer>
      <!--footer end-->
  </section>
	<!-- DONT TOUCH --  js placed at the end of the document so the pages load faster -->
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  </body>
</html>
