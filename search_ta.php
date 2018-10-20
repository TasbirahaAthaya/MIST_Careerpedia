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
    $syear=$_SESSION["syear"];
    $spubnum=$_SESSION["spubnum"];
    $stopic=$_SESSION["stopic"];
    $sgpa=$_SESSION["sgpa"];
    $sdep=$_SESSION["sdep"];
    $sdeg=$_SESSION["sdeg"];
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
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
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
<style>
table, th, td {
    /*border: 1px solid grey;*/
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
    height: 250px;
   
}
tr
{
    hover{background-color:#f5f5f5};
}
/*.button {
    background-color: #4CAF50;  Green 
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;  Safari 
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: green;
    color: black;
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: green;
    color: black;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}*/


</style>    
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
  <form id="search-box" method="post" action="#">
    <input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search People,Education, job....">
  <span class="vd_menu-search-submit"><i class="fa fa-search"></i> </span>
  </form>
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
        <span class="badge vd_bg-red"><?php printf("%d",$msg_num); ?> </span>        
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar.jpg"></div> 
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-2.jpg"></div>  
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-3.jpg"></div> 
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-4.jpg"></div> 
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
                            <div class="menu-icon"><img alt="example image" src=src="<?php echo $imgsrc; ?>"></div>  
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-6.jpg"></div> 
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-7.jpg"></div> 
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-8.jpg"></div> 
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
        <span class="badge vd_bg-red"><?php printf("%d",$noti_num); ?></span>        
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
                            <div class="menu-icon vd_green"><img alt="example image" src="img/avatar/avatar.jpg"></div> 
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
                            <div class="menu-icon vd_green"><img alt="example image" src="img/avatar/avatar.jpg"></div> 
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
                <img src="<?php echo $imgsrc; ?>" alt="profile picture" />               
            </span>
            <span class="mega-name">
                <?php echo $fname; ?> <i class="fa fa-caret-down fa-fw"></i> 
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
     <!--<div class="vd_content-wrapper"> <!-- remove this two line if u need it in full page-->
      <!--<div class="vd_container">-->
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header"> 
              <ul class="breadcrumb">
                  <li><a href="homepage.php">Home</a> </li>
                <li><a href="#">Pages</a> </li>
                <li class="active"> <?php echo $fullname; ?> 's Profile</li>
              </ul>
            
 
            </div>
          </div>


        <div class="vd_title-section clearfix" >
            <div class="vd_panel-header">
              <h1>TA/RA Search Result: The most eligible ones to be granted your offer!!! </h1>
             
          </div>
        </div>
          <div class="vd_content-section clearfix">
            <div class="row">
                
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
        <?php
            $query = "Select * from ta_circ where dept='".$sdep."' AND gpa=".$sgpa." AND topic ='".$stopic."' AND pubsum=".$spubnum." AND gyear='".$syear."' AND avail=1";
            $st=  oci_parse($conn, $query);
            oci_execute($st);
            $numrowss=oci_fetch_all($st, $outarr);
            $circ_id;
            if($numrowss > 0)
            {
                $srow=  oci_fetch_array($st);
                $_SESSION["cur_circ"]=$circ_id=$srow[0];
                goto start_query;
            }
            $query = "Select ta_seq.nextval from dual";
            $st=  oci_parse($conn, $query);
            oci_execute($st);
            $srow=  oci_fetch_array($st);
            $_SESSION["cur_circ"]=$circ_id=$srow[0];
            
            $query = "Insert into ta_circ VALUES(".$circ_id.", '".$sdep."','".$sdeg."',".$sgpa.",'".$stopic."',".$spubnum.",'".$syear."',1)";
            $st=  oci_parse($conn, $query);
            oci_execute($st);
            start_query:
            $query = "Select distinct st.username, st.pubnum from  st,edu,publications where 
                st.username=edu.username AND edu.dept='".$sdep."' AND edu.degree='".$sdeg."'  AND edu.grade >= ".$sgpa." ";
            if($spubnum != 0)
            {
                $query = $query." AND st.pubnum >= ".$spubnum."";
            }
            
            if($stopic != 0)
            {
                $query = $query." AND st.username=publications.username AND publications.topic = '".$stopic."'";
            }
            if($syear != "")
            {
                $query = $query." AND st.username=edu.username  AND edu.dept='".$sdep."' AND edu.gyear = '".$syear."'";
              
            }
            $query = $query." ORDER BY st.username ASC, st.pubnum DESC";
            //echo $query;
            $st=  oci_parse($conn, $query);
            oci_execute($st);  
        
        echo"    
            <div class=\"w3-container\">


            <table class=\"w3-table-all\">
            ";  
              
              $ctr=1;
                while(($row = oci_fetch_array($st)) != false)
                {
                    $newusername=$row[0];
                        $newquery = "SELECT role from all_user where username='".$newusername."'";
                           $newst=  oci_parse($conn, $newquery);
                           oci_execute($newst);
                           $newrow=  oci_fetch_array($newst);
                           $newrole=$newrow[0];
                           $newmap = array(
                               "Instructor" => "Inst",
                               "Student" => "St",
                               "Recruiter" => "Rec"
                           );

                           $newtable = $newmap[$newrole];
                           $newquery = "SELECT * FROM ".$newtable." WHERE username = '".$newusername."'";
                           $newst=  oci_parse($conn, $newquery);
                           oci_execute($newst);
                           $newrow=  oci_fetch_array($newst);   
                           $newfname=$newrow[0];
                           $newlname=$newrow[1];
                           $newfullname=$newfname.' '.$newlname;    
                           $nqr2="Select * from edu where username='".$newusername."' AND degree = '".$sdeg."' AND dept = '".$sdep."' AND grade >=".$sgpa;
                           $st2=oci_parse($conn, $nqr2);
                           oci_execute($st2);
                           $erow=  oci_fetch_array($st2);
                           $nqr3="Select * from publications where username='".$newusername."' AND topic='".$stopic."'";
                           $st3=oci_parse($conn, $nqr3);
                           oci_execute($st3);
                           $npub_topic=oci_fetch_all($st3, $outarr);
                           $_SESSION["type"]=1;
                           
                     echo "   
                        <tr>
                        <td><b>".$ctr."</b></td>
                        <td><img src=\"".$newrow[8]."\" alt=\"Display Picture\" width=\"200\" height=\"200\" /></td>
                        <td class=\"w3-large\"><b><div class=\"w3-card w3-green w3-container\">Name:</b> ".$newfullname." </div><br /><b><div class=\"w3-card w3-green w3-container\"> Number of Publication :</b> ".$newrow[9]."</div> <br /> <b><div class=\"w3-card w3-green w3-container\">".$sdeg."</b> completed from <b>".$erow[3]."</b> at year <b>".$erow[4]."</div></b> <br /><b><div class=\"w3-card w3-green w3-container\">Achieved GPA ".$erow[2]."</b> on a scale of 4.00<br/></div><br/> <div class=\"w3-card w3-green w3-container\"> Has ".$npub_topic." publications on the topic ".$stopic." <br /></div></td>
                        <td><form><button class=\"w3-btn w3-border-yellow w3-round-large w3-ripple w3-blue\" type=\"submit\" formaction=\"view_profile.php\" formmethod=\"get\" value=\"".$newusername."\" name=\"vprofile_btn\">View Profile</button><br /></form><br/> <form><button class=\"w3-btn w3-border-yellow w3-round-large w3-ripple w3-blue\" type=\"submit\" formaction=\"offer_ta.php\" formmethod=\"get\" value=\"".$newusername."\" name=\"offer_btn\">Offer TA/RA</button></form><br /></td>
                        </tr>";
                    $ctr++;
                }
                ?>
            </table>
        


      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
  </div>
</div>
          </div>
        </div>
  </div>
    

  <!-- .container --> 

<!-- .content -->
