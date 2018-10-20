<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html><!--<![endif]-->

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
    
    $pusername=$_GET["vprofile_btn"];
    if($pusername=="")
    {
        echo "
            <script>
                location.replace(\"homepage.php\");           
            </script>
        
        ";
    }
    $pquery = "SELECT role from all_user where username='".$pusername."'";
    $pst=  oci_parse($conn, $pquery);
    oci_execute($pst);
    $prow=  oci_fetch_array($pst);
    $prole=$prow[0];
    $pmap = array(
        "Instructor" => "Inst",
        "Student" => "St",
        "Recruiter" => "Rec"
    );
    
    $ptable = $pmap[$prole];
    $pquery = "SELECT * FROM ".$ptable." WHERE username = '".$pusername."'";
    $pst=  oci_parse($conn, $pquery);
    oci_execute($pst);
    $prow=  oci_fetch_array($pst);   
    $pfname=$prow[0];
    $plname=$prow[1];
    $pfullname=$pfname.' '.$plname;
    $pusername=$prow[2];
    $pdeptname=$prow[3];
    $pdob=$prow[4];
    $pgender=$prow[5];
    $pphone=$prow[6];
    $pinstitute=$prow[7];
    $pimgsrc=$prow[8];
    $pquery = "SELECT to_char(jdate,'dd-mon-yyyy') FROM all_user WHERE username = '".$pusername."'";
    $pst=  oci_parse($conn, $pquery);
    oci_execute($pst);
    $prow=  oci_fetch_array($pst);  
    $pjoining=$prow[0];
    $uname=$_SESSION["uname1"];
            
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
                       <!-- <i class="fa fa-cog"></i>-->
                    </span>                                                                              
                </div>
           </div>                 
           <div class="content-list content-image">
               <div  data-rel="scroll"> 
               <ul class="list-wrapper pd-lr-10">
                    <li> 
                            <div class="menu-icon"><img alt="example image" src="<?php echo $imgsrc; ?>"></div> 
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

            <   <div class="closing text-center" style="">
                    <a href="#">See All Messages <i class="fa fa-angle-double-right"></i></a>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content --> 
    </li>  
    <li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="notification.php" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-globe"></i></span> 
        <span class="badge vd_bg-red"><?php printf("%d",$noti_num); ?></span> <!-- php place -->     
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> 
                Notifications 
               <div class="vd_panel-menu">
                     <span data-original-title="Notification Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                        <!--<i class="fa fa-cog"></i>-->
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
                <?php echo $fullname; ?> 
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

  <div class = "w3-container-fluid">
  <div class="w3-btn-group">
    <form><button class="w3-btn w3-dark-grey w3-text-white w3-border w3-border-white" style="width:33.3%" type="subimt" formaction="homepage.php" formmethod="get">Homepage</button></form>
    <form><button class="w3-btn w3-dark-grey w3-text-white w3-border w3-border-white" style="width:33.3%" type="subimt" formaction="Student-profile.php" formmethod="get">Profile</button></form>
    <form><button class="w3-btn w3-dark-grey w3-text-white w3-border w3-border-white" style="width:33.3%" type="subimt" formaction="Post_resume_form.php" formmethod="get">Post Resume</button></form>
  </div>
</div> 

  <!--container starts-->
  <div class="content">
  <div class="container">
     <!-- <div class="vd_content-wrapper">
      <div class="vd_container"> -->
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header"> 
           
            </div>
          </div>
   
    <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1><?php echo $pfullname; ?> </i> 's Profile</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="text-center vd_info-parent"> <img alt="example image" src="<?php echo $pimgsrc; ?>"> </div>
                    <div class="row">
                     
                      <div class="col-xs-12"> <a class="btn vd_btn vd_bg-black btn-xs btn-block no-br" href="#"></a> </div>
                    </div>
                    <h2 class="font-semibold mgbt-xs-5"><?php echo $pfullname; ?> </i> </h2>
                    <h4><?php echo $prole; ?> at <?php echo $pinstitute; ?></h4>
                    
                    <div class="mgtp-20">
                      <table class="table table-striped table-hover">
                        <tbody>
                          
                          <tr>
                            <td>Member Since</td>
                            <td> <?php echo $pjoining; ?> </td>
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

   
  <div class="tab-content">
    <div id="profile-tab" class="tab-pane active">
      <div class="pd-20">
       <form id="search-data-edit" method="post" action="" class="" >
<div class="vd_info tr"  > <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit" name="follow">
Follow </button></div>  
    <?php 
        if((isset($_POST["follow"])))
        {
            $query="INSERT INTO follow VALUES('".$username."','".$uname."')";
                                    $st=  oci_parse($conn, $query);
                                    oci_execute($st);
            
           // $ttl = "Unfollow";
            echo "
            <script> location.replace(\"homepage.php\");
            </script>
            ";
        }
        
        
        
    ?>
        </form>
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">First Name:</label>
              <div class="col-xs-7 controls"><?php echo $pfname; ?> </i> </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Last Name:</label>
              <div class="col-xs-7 controls"><?php echo $plname; ?> </i> </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">User Name:</label>
              <div class="col-xs-7 controls"><?php echo $pusername; ?> </i> </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <?php
                $pquery="select email from all_user where username='".$pusername."'";
                $pst=  oci_parse($conn, $pquery);
                oci_execute($pst);
                $prow=  oci_fetch_array($pst);
                $pemail=$prow[0];
              ?>
              <div class="col-xs-7 controls"><?php echo $pemail; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
    <!--      <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">City:</label>
              <div class="col-xs-7 controls">Dhaka</div>
              <!-- col-sm-10 --> <!--
            </div>
          </div> -->
    <!--      <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Country:</label>
              <div class="col-xs-7 controls">Bangladesh</div>
              <!-- col-sm-10 --> <!--
            </div>
          </div> -->
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Birthday:</label>
              <div class="col-xs-7 controls"><?php echo $pdob; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Interests:</label>
              <div class="col-xs-7 controls"><?php
                            $pquery = "SELECT category FROM interest WHERE username = '".$pusername."'";
                            $pst=  oci_parse($conn, $pquery);
                            oci_execute($pst);
                            $pctr="";
                            $pcn=1;
                            while(($prow = oci_fetch_array($pst)) != FALSE)
                            {
                                    if($pcn > 1)
                                    {
                                        $pctr=$pctr.',';
                                    }
                                   $pctr=$pctr.' '.$prow[0];
                                   $pcn++;
                            }
                            echo $pctr;
              ?>
              
              
              </div>
              <!-- col-sm-10 --> 
            </div>
          </div>
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Mobile:</label>
              <div class="col-xs-7 controls"><?php echo $pphone; ?></div>
              <!-- col-sm-10 --> 
            </div>
          </div>
        </div>

 <hr class="pd-10"  />
        <div class="row">
          <div class="col-sm-7 mgbt-xs-20">
            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
            <div class="content-list content-menu" style="overflow-y: scroll; height: 300px;">
              <ul class="list-wrapper">
                  <?php
                        $pquery="SELECT * FROM EXPERIENCE where username= '".$pusername."'";
                        $pst=  oci_parse($conn, $pquery);
                        oci_execute($pst);
                            echo"
                                <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_green\"><i class=\"fa  fa-circle-o\"></i></span> <span class=\"menu-text\"><b> 
                                ".$prole."</b>  at <b>".$pinstitute."</b> <span class=\"menu-info\"><span class=\"menu-date\">Currently Here</span></span> </span> </li>
                                ";                        
                        while(($prow = oci_fetch_array($pst)))
                        {
                            echo"
                                <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_green\"><i class=\"fa  fa-circle-o\"></i></span> <span class=\"menu-text\"> <b>
                                ".$prow[1]."</b>  at <b>".$prow[2]."</b> <span class=\"menu-info\"><span class=\"menu-date\"><b>Expertise Required on: ".$prow[3]."</b> </span></span> </span> </li>
                                ";
                        }
                  ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-5">
            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> EDUCATION</h3>
            <div class="content-list content-menu" style="overflow-y: scroll; height: 300px;">
              <ul class="list-wrapper">
                <?php
                    
                        $pquery="SELECT * FROM EDU where username= '".$pusername."'";
                        $pst=  oci_parse($conn, $pquery);
                        oci_execute($pst);                
                        while(($prow = oci_fetch_array($pst)))
                        {
                            $pcur_year=date("Y");
                            
                            if($pcur_year < $prow[4])
                            {
                            echo"
                            <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_grey\"><i class=\" fa  fa-circle-o\"></i></span> 
                                <span class=\"menu-text\">Currently studying <b>".$prow[1]."</b> under <b> department of ".$prow[6]."</b> at <b>".$prow[3]."</b> with major in <b>".$prow[5]."</b>
                                <span class=\"menu-info\"><span class=\"menu-date\"> Expected to graduate at <b>year ".$prow[4]."</b> with current <b>Grade: ".$prow[2]."</b> </span></span> </span> </li>  
                            ";                                
                            }
                            else {
                            echo"
                            <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_grey\"><i class=\" fa  fa-circle-o\"></i></span> 
                                <span class=\"menu-text\"> Completed <b>".$prow[1]."</b> under department of <b>".$prow[6]."</b> at <b>".$prow[3]."</b> with major in <b>".$prow[5]."</b>
                                <span class=\"menu-info\"><span class=\"menu-date\"> Graduated with <b>Grade".$prow[2]."</b> at year <b>".$prow[4]."</b> </span></span> </span> </li>  
                            ";
                            }
                        }
                
                ?>



              </ul>
            </div>            
          </div>
        </div>
        
<hr class="pd-10"  />
        <div class="row">
          <div class="col-sm-7 mgbt-xs-20">
            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>Publications</h3>
            <div class="content-list content-menu" style="overflow-y: scroll; height: 300px;">
              <ul class="list-wrapper">
                
                <?php
                    $pquery = "SELECT * FROM PUBLICATIONS WHERE username = '".$pusername."'";
                    $pst=  oci_parse($conn, $pquery);
                    oci_execute($pst);
                    
                    while(($prow= oci_fetch_array($pst)))
                    {
                        echo"
                        <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_yellow\"><i class=\" fa  fa-circle-o\"></i></span> <span class=\"menu-text\"> 
                        <b>".$prow[1]."</b>: Publication on topic: <b>".$prow[3]."</b> <br>Link: <a href=\"".$prow[2]."\">".$prow[2]."</a> <br> <span class=\"menu-info\"><span class=\"menu-date\"> Published on:<b>".$prow[4]."</b></span></span> </span> </li>
                        ";
                    }
                

                ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-5">
            <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> Expertise</h3>
            <div class="content-list content-menu" style="overflow-y: scroll; height: 300px;">
              <ul class="list-wrapper">
                <?php
                    $pquery = "SELECT * from expertise where username='".$pusername."'";
                    $pst = oci_parse($conn, $pquery);
                    oci_execute($pst);
                    
                    while(($pprow=  oci_fetch_array($pst)) != false)
                    {
                        echo "
                            <li class=\"mgbt-xs-10\"> <span class=\"menu-icon vd_green\"><i class=\"fa  fa-circle-o\"></i></span> <span class=\"menu-text\">".$pprow[1]."<span class=\"menu-info\"><span class=\"menu-date\"> </span></span> </span> </li>
                        ";
                    }
                
                ?>
              </ul>
            </div>            
          </div>
        </div>
        



