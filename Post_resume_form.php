<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->
<?php
    session_start();
    $conn = oci_connect('mist','mist','localhost/XE');
    $username=$_SESSION["username_s"];
	if($username=="")
	{
		echo "
			<script>
				location.replace(\"index2.php\");			
			</script>
		
		";
	}
    $query = "SELECT role from all_user where username='".$username."'";
    $st=  oci_parse($conn, $query);
    oci_execute($st);
    $row=  oci_fetch_array($st);
    $role=$row[0];
    $map = array(
        "Instructor" => "Inst",
        "Student" => "St",
        "Recruiter" => "Rec"
    );
    
    $table = $map[$role];
    $query = "SELECT * FROM ".$table." WHERE username = '".$username."'";
    $st=  oci_parse($conn, $query);
    oci_execute($st);
    $row=  oci_fetch_array($st);   
    $fname=$row[0];
    $lname=$row[1];
    $fullname=$fname.' '.$lname;
    $username=$row[2];
    $deptname=$row[3];
    $dob=$row[4];
    $gender=$row[5];
    $phone=$row[6];
    $institute=$row[7];
    $imgsrc=$row[8];
    $query = "SELECT to_char(jdate,'dd-mon-yyyy') FROM all_user WHERE username = '".$username."'";
    $st=  oci_parse($conn, $query);
    oci_execute($st);
    $row=  oci_fetch_array($st);  
    $joining=$row[0];
    $query = "SELECT Username_rcvr  FROM user_notification WHERE Username_rcvr  = '".$username."'";
    $st=  oci_parse($conn, $query);
    oci_execute($st);
    $noti_num=oci_fetch_all($st, $outarr);
    
    $query = "SELECT Username_rcvr  FROM user_msg WHERE Username_rcvr  = '".$username."'";
    $st=  oci_parse($conn, $query);
    oci_execute($st);
    $msg_num=oci_fetch_all($st, $outarr);    
?>

<!-- Mirrored from vendroid.venmond.com/pages-user-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Oct 2016 15:01:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>MISTCAREERPEDIA</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Vendroid" />
    <meta name="description" content="User Profile Pages - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="css/font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<!-- Specific CSS -->
	    
     
    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    


        
    <!-- Responsive CSS -->
        	<link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 

	  
 
 
    <!-- for specific page in style css -->
        
    <!-- for specific page responsive in style css -->
        
    
    <!-- Custom CSS -->
    <link href="custom/custom.css" rel="stylesheet" type="text/css">



    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script> 
    <script type="text/javascript" src="js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script> 
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>     
    <![endif]-->
</head>    

<body id="pages" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="pages "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
            <div class="logo">
                <a href="homepage.php"><h4>MistCareerPedia</h4></a>
            </div>
  </div>
          <!-- vd_panel-header -->
            
          </div>  



           <div class="vd_container" >
            <div class="row">
                <div class="col-sm-5 col-xs-12">
 <!-- search option start -->                   
<div class="vd_menu-search">
  <form id="search-box" method="post" action="">
    <input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search People,Education, job....">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> <input type="submit" value="Search" name="ysearch"></span>
  </form>
    <?php
       if((isset($_POST["ysearch"])))
        {
            $searchdata = $_POST["search"];
            if($searchdata != "")
            {
                $_SESSION["sname"]=$searchdata;
                 echo" 
                                    <script>
                                        location.replace(\"search_result.php\");
                                    </script>";
                //echo  $_SESSION["sname"] ; 
                //formaction=\"view_profile.php\";              
                
            }
        }
    ?>
</div>
                </div>
                <!--search option ends -->


<!--message , noti, pic-->

                 <div class="col-sm-7 col-xs-12">
                    <div class="vd_mega-menu-wrapper">
                        <div class="vd_mega-menu pull-right">
                            <ul class="mega-ul">
        <li id="top-menu-2" class="one-icon mega-li">
       <a href="logout.php" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>   
       </a> </li>
                                <li id="top-menu-2" class="one-icon mega-li"> 
      <a href="index.php" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-envelope"></i></span> 
        <span class="badge vd_bg-red"><?php printf("%d",$msg_num); ?> </span>    <!-- php place -->    
      </a>
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
               Messages
               <div class="vd_panel-menu">
                     <span data-original-title="Message Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                        <i class="fa fa-cog"></i>
                    </span>                                                                              
                </div>
           </div>                 
           <div class="content-list content-image">
               <div  data-rel="scroll"> 
               <ul class="list-wrapper pd-lr-10">
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>" ></div> 
                            <div class="menu-text"> Do you play or follow any sports?
                                <div class="menu-info">
                                    <span class="menu-date">12 Minutes Ago </span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>
                            </div> 
                    </li>
                    <li class="warning"> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div>  
                            <div class="menu-text">  Good job mate !
                                <div class="menu-info">
                                    <span class="menu-date">1 Hour 20 Minutes Ago </span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye-slash"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                            
                            </div> 
                     </li>    
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Just calm down babe, everything will work out.
                                <div class="menu-info">
                                    <span class="menu-date">12 Days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                                                     
                            </div> 
                    </li>                                     
                    <li>
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Euuh so gross....
                                <div class="menu-info">
                                    <span class="menu-date">19 Days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                                                        
                            </div> 
                    </li> 
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div>  
                            <div class="menu-text">  That's the way.. I like it :D
                                <div class="menu-info">
                                    <span class="menu-date">20 Days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                                                          
                            </div> 
                     </li>
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Oooh don't be shy ;P
                                <div class="menu-info">
                                    <span class="menu-date">21 Days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                             
                            </div> 
                     </li>                                     
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Hello, please call my number..
                                <div class="menu-info">
                                    <span class="menu-date">24 Days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                              
                            </div> 
                    </li> 
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Don't go anywhere, i will be coming soon
                                <div class="menu-info">
                                    <span class="menu-date">1 Month 2 days Ago</span>                                                                         
                                    <span class="menu-action">
                                        <span class="menu-action-icon" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="bottom">
                                            <i class="fa fa-eye"></i>
                                        </span>                                                                            
                                    </span>                                
                                </div>                              
                            </div> 
                     </li>                                                                                
                    
               </ul>
               </div>

            <!--   <div class="closing text-center" style="">
                    <a href="#">See All Notifications <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
    </li>  
    <li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="notification.php" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-globe"></i></span> 
        <span class="badge vd_bg-red"><?php printf("%d",$noti_num); ?></span>        <!-- php place -->  
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
                Notifications 
               <div class="vd_panel-menu">
                     <span data-original-title="Notification Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                        <i class="fa fa-cog"></i>
                    </span>                   
<!--                     <span class="text-menu" data-original-title="Settings" data-toggle="tooltip" data-placement="bottom">
                        Settings
                    </span> -->                                                              
                </div>
           </div> 



           <!--notification details -->              
           <div class="content-list">   
               <div  data-rel="scroll"> 
               <ul  class="list-wrapper pd-lr-10">
                    <li> <a href="#"> 
                            <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                            <div class="menu-text"> Someone has give you a surprise 
                                <div class="menu-info"><span class="menu-date">12 Minutes Ago</span></div>
                            </div> 
                    </a> </li>
                    <li> <a href="#"> 
                            <div class="menu-icon vd_blue"><i class=" fa fa-user"></i></div> 
                            <div class="menu-text">  Change your user profile details
                                <div class="menu-info"><span class="menu-date">1 Hour 20 Minutes Ago</span></div>
                            </div> 
                    </a> </li>    
                    <li> <a href="#"> 
                            <div class="menu-icon vd_red"><i class=" fa fa-cogs"></i></div> 
                            <div class="menu-text">  Your setting is updated
                                <div class="menu-info"><span class="menu-date">12 Days Ago</span></div>                            
                            </div> 
                    </a> </li>                                     
                    <li> <a href="#"> 
                            <div class="menu-icon vd_green"><i class=" fa fa-book"></i></div> 
                            <div class="menu-text">  Added new article
                                <div class="menu-info"><span class="menu-date">19 Days Ago</span></div>                              
                            </div> 
                    </a> </li> 
                    <li> <a href="#"> 
                            <div class="menu-icon vd_green"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Change Profile Pic
                                <div class="menu-info"><span class="menu-date">20 Days Ago</span></div>                              
                            </div> 
                    </a> </li>
                    <li> <a href="#"> 
                            <div class="menu-icon vd_red"><i class=" fa fa-cogs"></i></div> 
                            <div class="menu-text">  Your setting is updated
                                <div class="menu-info"><span class="menu-date">12 Days Ago</span></div>                            
                            </div> 
                    </a> </li>                                     
                    <li> <a href="#"> 
                            <div class="menu-icon vd_green"><i class=" fa fa-book"></i></div> 
                            <div class="menu-text">  Added new article
                                <div class="menu-info"><span class="menu-date">19 Days Ago</span></div>                              
                            </div> 
                    </a> </li> 
                    <li> <a href="#"> 
                            <div class="menu-icon vd_green"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
                            <div class="menu-text">  Change Profile Pic
                                <div class="menu-info"><span class="menu-date">20 Days Ago</span></div>                              
                            </div> 
                    </a> </li>                                                                                
                    
               </ul>
               </div>
               <div class="closing text-center" style="">
                    <a href="#">See All Notifications <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content -->         
    </li>  

     <!--profile pic small-->
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
                <img src="<?php echo $imgsrc; ?>" alt="example image" />               
            </span>
            <span class="mega-name">
                <?php echo $fullname; ?> </i> 
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
            <div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-trophy"></i></div> <div class="menu-text">My Achievements</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Messages</div><div class="menu-badge"><div class="badge vd_bg-red">10</div></div> </a>  </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-tasks
"></i></div> <div class="menu-text"> Tasks</div><div class="menu-badge"><div class="badge vd_bg-red">5</div></div> </a> </li> 
                    <li class="line"></li>                
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-lock
"></i></div> <div class="menu-text">Privacy</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-cogs"></i></div> <div class="menu-text">Settings</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class="  fa fa-key"></i></div> <div class="menu-text">Lock</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                    <li class="line"></li>                
                    <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-question-circle"></i></div> <div class="menu-text">Help</div> </a> </li>
                    <li> <a href="#"> <div class="menu-icon"><i class=" glyphicon glyphicon-bullhorn"></i></div> <div class="menu-text">Report a Problem</div> </a> </li>              
                </ul>
            </div> 
        </div> 
      </div>     
  
    </li>               
       
  <!--  <li id="top-menu-settings" class="one-big-icon hidden-xs hidden-sm mega-li" data-intro="<strong>Toggle Right Navigation </strong><br/>On smaller device such as tablet or phone you can click on the middle content to close the right or left navigation." data-step=2 data-position="left"> 
        <a href="#" class="mega-link"  data-action="toggle-navbar-right"> 
           <span class="mega-icon">
                <i class="fa fa-comments"></i> 
            </span> 
<!--            <span  class="mega-image">
                <img src="img/avatar/avatar.jpg" alt="example image" />               
            </span> -->           
            <!--<span class="badge vd_bg-red">8</span>               
        </a>  -->            
       
    </li>
    </ul>
<!-- Head menu search form ends -->                         
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 
  <!--container starts-->
  <div class="content">
    --
  <div class="container">
    <!--  <div class="vd_content-wrapper">  remove this two line if u need it in full page
      <div class="vd_container"> -->
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header"> 
              <ul class="breadcrumb">
                <li>Post_Resume_Form</li>
              </ul>
            
 
            </div>
          </div>


        <div class="vd_title-section clearfix" >
            <div class="vd_panel-header">
              <h1>Post Your Resume </h1>
              <small class="subtitle"><b>Show your academic and technical skills</b></small> </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
                
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <form id="search-data-edit" method="post" action="" class="form-horizontal" >
                    <div  class="panel-body">
                      <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"><?php echo $fullname; ?></span> </h2>
                      <br/>
                      <div class="row">
                        <div class="col-sm-3 mgbt-xs-20">
                          <div class="form-group">
                            <div class="col-xs-12">
                              <div class="form-img text-center mgbt-xs-15"> <img alt="example image" src="<?php echo $imgsrc; ?>"> </div>
                              
                              <br/>
                              <div>
                                <table class="table table-striped table-hover">
                                  <tbody>
                                   
                                    <tr>
                                      <td>Member Since</td>
                                      <td><?php echo strtoupper($joining); ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                <!-- panel widget -->
                 <div class="col-sm-9">
                <div class="tabs widget">
  <ul class="nav nav-tabs widget">
     <li> <a data-toggle="tab" href="Homepage.php"> Home <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="Student-profile.php"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li> <a data-toggle="tab" href="userBlog.php"> Blog <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
       <li class="active"> <a data-toggle="tab" href="Post_resume_form.php"> Post Resume<span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
      <?php if($role == "Instructor") {echo"<li> <a data-toggle=\"tab\" href=\"TA-RArequirements.php\"> TA/RA Circular <span class=\"menu-active\"><i class=\"fa fa-caret-up\"></i></span> </a></li>";}?>
    <?php if($role == "Recruiter"){echo "<li> <a data-toggle=\"tab\" href=\"job_circular.php\"> Job Posting Circular <span class=\"menu-active\"><i class=\"fa fa-caret-up\"></i></span> </a></li>";} ?>    
  </ul>
<!-- account settings -->
<!-- for php code-->
                        <hr/>
                        <div class="col-sm-9">
                           
                          <h3 class="mgbt-xs-15">Educational Qualification</h3>
                          <!-- form-group -->

                          <!-- form-group -->
                          <?php
                            $query = "SELECT * FROM edu WHERE username = '".$username."'";
                            $st=  oci_parse($conn, $query);
                            oci_execute($st);
                            while(($row = oci_fetch_array($st)) != FALSE)
                            {
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Degree Name</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[1]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";     
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Grade Achieved</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[2]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Institution</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[3]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Graduation Year</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[4]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Major</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[5]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Discipline</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[6]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo '<br>';
                            }
                          ?>
                          </hr>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Degree Name</label>
                            <?php $w1=""; echo $w1; ?>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Degree Name" name="ndeg">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Grade(Current GPA if you haven't graduated yet)</label>
                            <?php $w1=""; echo $w1; ?>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="number" step="0.01" class="w3-rest"  placeholder="Grade" name="ngrade">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Institute</label>
                            <?php $w1=""; echo $w1; ?>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Institute" name="ninstitute">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Graduation Year</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Graduation Year" name="ngyear">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Major</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Major" name="nmajor">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Department/Discipline</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Department.." name="ndep">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->                          

                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="nedu"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Add Qualification</button>
                        </div>
                          
                        <?php
                            if((isset($_POST["nedu"])))
                            {
                                $ninstitute = $_POST["ninstitute"];
                                $ndep=$_POST["ndep"];
                                $nmajor=$_POST["nmajor"];
                                $ngrade=$_POST["ngrade"];
                                $ndeg=$_POST["ndeg"];
                                $ngyear=$_POST["ngyear"];
                                if($ninstitute != "" && $ndep != "" && $ndeg != "" && $ngyear != "" && $nmajor != "" && $ngrade !="")
                                {
                                    $query="INSERT INTO edu VALUES('".$username."','".$ndeg."', ".$ngrade.", '".$ninstitute."', '".$ngyear."', '".$nmajor."','".$ndep."')";
                                    $st=  oci_parse($conn, $query);
                                    oci_execute($st);
                                    echo" 
                                    <script>
                                        location.replace(\"Post_resume_form.php\");
                                    </script>";
                                }
                                else{
                                    echo"
                                    <script>
                                        alert(\"All fields must be filled\");
                                    </script>";
                                }
                                
                            }
                        ?>
                          
                          <hr />
                          <!-- profile settings -->
                          <h3 class="mgbt-xs-15">Expertise</h3>
                          <?php 
                            $query = "SELECT category FROM Expertise WHERE username = '".$username."' ORDER BY eDate DESC";
                            $st=  oci_parse($conn, $query);
                            oci_execute($st);
                            $ctr=1;
                            while(($row = oci_fetch_array($st)) != FALSE)
                            {
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Expertise #".$ctr."</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[0]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                $ctr=$ctr+1;
                            }
                          
                          ?>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">New Expertise</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="expertise category.." name="nexpertise">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="nexpp"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Add Expertise</button>
                        </div>
                        
                          
                        <?php 
                            if((isset($_POST["nexpp"])))
                            {
                                $toda= date ("Y m d H:i:s", mktime ()); 
                             
                                $nexpertise=$_POST["nexpertise"];
                                if($nexpertise != "")
                                {
    
                                    $query = "SELECT category FROM Expertise WHERE username = '".$username."' AND category = '".$nexpertise."'";
                                    $st=  oci_parse($conn, $query);
                                    oci_execute($st);
                                    $numofrows=  oci_fetch_all($st,$outarr);
                                    if($numofrows > 0)
                                    {
                                        echo"
                                        <script>
                                            alert(\"Already added to qualification\");
                                        </script>";
                                    }
                                    else{
                                        $query="Insert into expertise Values('".$username."','".$nexpertise."',to_date ('".$toda."','yyyy mm dd hh24:mi:ss'))";
                                        $st=  oci_parse($conn, $query);
                                        oci_execute($st);
                                        echo" 
                                        <script>
                                            location.replace(\"Post_resume_form.php\");
                                        </script>";
                                    }

                                }
                                
                            }                       
                        ?>  
                        <hr />
                          <!-- profile settings -->
                          <h3 class="mgbt-xs-15">Interests</h3>
                          <?php 
                            $query = "SELECT category FROM interest WHERE username = '".$username."'";
                            $st=  oci_parse($conn, $query);
                            oci_execute($st);
                            $ctr=1;
                            while(($row = oci_fetch_array($st)) != FALSE)
                            {
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Interest #".$ctr."</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[0]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                $ctr=$ctr+1;
                            }
                          
                          ?>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">New Interest</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Interest category.." name="ninterest">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="nintrst"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Add Interest</button>
                        </div>
                        
                          
                        <?php 
                            if((isset($_POST["nintrst"])))
                            {
                                $ninterest=$_POST["ninterest"];
                                if($ninterest != "")
                                {

                                    $query = "SELECT category FROM interest WHERE username = '".$username."' AND category = '".$ninterest."'";
                                    $st=  oci_parse($conn, $query);
                                    oci_execute($st);
                                    $numofrows=  oci_fetch_all($st,$outarr);
                                    if($numofrows > 0)
                                    {
                                        echo"
                                        <script>
                                            alert(\"Already added to qualification\");
                                        </script>";
                                    }
                                    else{
                                        $query="Insert into interest Values('".$username."','".$ninterest."')";
                                        $st=  oci_parse($conn, $query);
                                        oci_execute($st);
                                        echo" 
                                        <script>
                                            location.replace(\"Post_resume_form.php\");
                                        </script>";
                                    }

                                }
                                
                            }                       
                        ?>
                          <hr />

                          
                          <!-- form-group -->
                          <?php
                            $query = "Select ch from choice where username='".$username."'";
                            $st=oci_parse($conn, $query);
                            oci_execute($st);
                            $numofrows=  oci_fetch_all($st, $outarr);
                            $cur_choice="";
                            if($numofrows == 0)
                            {
                                $query = "Insert into choice Values('".$username."', 'Both')";
                                $st=oci_parse($conn, $query);
                                oci_execute($st);      
                                $cur_choice="Both";
                            }
                            else{
                                $query = "Select ch from choice where username='".$username."'";
                                $st=oci_parse($conn, $query);
                                oci_execute($st);
                                $nrow = oci_fetch_array($st);
                                $cur_choice=$nrow[0];                         
                            }                         
                          ?>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Willing to</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select class="w3-rest" name="nchoice">
                                    <option value="Higher Study" <?php if($cur_choice == "Higher Study") {echo "selected = \"selected\"";} ?> >Higher Study</option>
                                    <option value="Job" <?php if($cur_choice == "Job"){ echo "selected = \"selected\"";} ?> >Job</option>
                                    <option value="Both" <?php if($cur_choice == "Both") {echo "selected = \"selected\"";} ?> >Both</option>
                                  </select>
                                </div>
                                  

                                <!-- col-xs-12 -->
                                <div class="col-xs-2">
                                    
                                  <div class="btn-action">
                                   
                                  </div>
                                  <!-- btn-action col-sm-10 --> 
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="ychoice"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update Choice</button>
                        </div>
                        <?php 
                            if((isset($_POST["ychoice"])))
                            {
                                $cur_choice=$_POST["nchoice"];
                                $query = "Update choice set ch='".$cur_choice."' where username='".$username."'";
                                $st=oci_parse($conn, $query);
                                oci_execute($st);
                                echo" 
                                <script>
                                    location.replace(\"Post_resume_form.php\");
                                </script>";
                            }
                        ?>
                          <!-- form-group -->
                          <!-- contact settings -->
                          <hr/>
                          <h3 class="mgbt-xs-15">Update Experience</h3>
                          <?php 
                            $query = "SELECT * FROM experience WHERE username = '".$username."' ORDER BY expDate DESC";
                            $st=  oci_parse($conn, $query);
                            oci_execute($st);
                            $ctr=1;
                            while(($row = oci_fetch_array($st)) != FALSE)
                            {
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Post</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[1]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";     
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Corporation</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[2]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Required Skill</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[3]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo '<br>';
                            }
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Job Post</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Post..." name="npost">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Corporation Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Company name.." name="ncorp">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Major Skill Requirement</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Skill(Algorithm, php, etc..)" name="nskill">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="njob"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Add Experience</button>
                        </div>
                        <?php 
                            if((isset($_POST["njob"])))
                            {
                                $today= date ("Y m d H:i:s", mktime ()); 
                             
                                $npost=$_POST["npost"];
                                $ncorp=$_POST["ncorp"];
                                $nskill=$_POST["nskill"];
                                if($npost != "" && $ncorp != "" && $nskill != "")
                                {
                                    $query = "insert into experience VALUES('".$username."', '".$npost."', '".$ncorp."', '".$nskill."',to_date ('".$today."','yyyy mm dd hh24:mi:ss'))";
                                    $st=oci_parse($conn, $query);
                                    oci_execute($st);
                                    
                                    

                                    $query = "SELECT category FROM Expertise WHERE username = '".$username."' AND category = '".$skill."'";
                                    $st=  oci_parse($conn, $query);
                                    oci_execute($st);
                                    $numofrows=  oci_fetch_all($st,$outarr);
                                    if($numofrows > 0)
                                    {
                                       
                                    }
                                    else{
                                        $query="Insert into expertise Values('".$username."','".$nskill."',to_date ('".$today."','yyyy mm dd hh24:mi:ss'))";
                                        $st=  oci_parse($conn, $query);
                                        oci_execute($st);
                                        echo" 
                                        <script>
                                            location.replace(\"Post_resume_form.php\");
                                        </script>";
                                    }
                                    echo" 
                                    <script>
                                        location.replace(\"Post_resume_form.php\");
                                    </script>";
                                }
                                else{
                                    echo"
                                    <script>
                                        alert(\"All fields must be filled\");
                                    </script>";
                                }
                            }
                        ?>
                          <hr/>
                          <h3 class="mgbt-xs-15">Publications Section</h3>
                          <?php 
                            $query = "SELECT * FROM publications WHERE username = '".$username."' ORDER BY pDate DESC";
                            $st=  oci_parse($conn, $query);
                            oci_execute($st);
                            $ctr=1;
                            while(($row = oci_fetch_array($st)) != FALSE)
                            {
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Publication Name</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[1]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";     
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Publication Link</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b> <a href=\"".$row[2]."\">".$row[2]."</a></b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Publication Topic</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[3]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Publication Date</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[5]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo"
                                <div class=\"form-group\">
                                  <label class=\"col-sm-3 control-label\">Publication Short Description</label>
                                  <div class=\"col-sm-9 controls\">
                                    <div class=\"row mgbt-xs-0\">
                                      <div class=\"col-xs-9\">
                                          <div class=\"w3-rest w3-border w3-center w3-border-black \" ><b>".$row[4]."</b></div>
                                      </div>
                                      <!-- col-xs-12 --> 
                                    </div>
                                    <!-- row --> 
                                  </div>
                                  <!-- col-sm-10 --> 
                                </div>";
                                echo '<br>';
                            }
                        ?>
                          <hr/>
                          <h3 class="mgbt-xs-15">New Publication Update</h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">New Publication Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Post..." name="npname">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">New Publication Link</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Company name.." name="nplink">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">New Publication Topic</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" class="w3-rest"  placeholder="Skill(Algorithm, php, etc..)" name="nptopic">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Short Description about new publication</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                    <textarea rows="3" name="npdesc">Publication short description within 4000 Characters</textarea>
                                </div>
                                <!-- col-xs-12 -->
                                <div class="col-xs-2">
                                  <!-- btn-action col-sm-10 --> 
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                        <div class="pd-20">
                          <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="npupdate"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update Publication</button>
                        </div>
                        <?php 
                        
                            if((isset($_POST["npupdate"])))
                            {
                                
                                $npname=$_POST["npname"];
                                $nplink=$_POST["nplink"];
                             $todaydt= date ("Y m d H:i:s", mktime ()); 
                                $npdesc=$_POST["npdesc"];
                                $nptopic=$_POST["nptopic"];
                              
                                if($npname != "" && $nplink != "" && $npdesc != "" && $nptopic != "" )
                                {
                                    $query = "insert into publications VALUES('".$username."', '".$npname."', '".$nplink."', '".$nptopic."','".$npdesc."',to_date ('".$todaydt."','yyyy mm dd hh24:mi:ss'))";
                                    $st=oci_parse($conn, $query);
                                    oci_execute($st);
                                    $query = "update ".$table." set pubnum = pubnum + 1 where username = '".$username."'";
                                    $st=oci_parse($conn, $query);
                                    oci_execute($st);
                                    echo" 
                                    <script>
                                        location.replace(\"Post_resume_form.php\");
                                    </script>";
                                }
                                else{
                                    echo"
                                    <script>
                                        alert(\"All fields must be filled\");
                                    </script>";
                                }
                            }
                        ?>                          <!-- form-group -->
                          
                          <!-- form-group -->
                          

                          <!-- form-group -->
                          
                          <!-- form-group --> 
                          
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --> 
                      
                    </div>
                    <!-- panel-body -->
                   
                </div>
                <!-- Panel Widget --> 
              </div>
            </form>
                  

              <!-- col-sm-12--> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->
