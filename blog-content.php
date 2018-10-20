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
                <a href="#"><h4>MistCareerPedia</h4></a>
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
      <a href="index.html" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-envelope"></i></span> 
        <span class="badge vd_bg-red">10</span>        
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
                            <div class="menu-icon"><img alt="example image" src="img/avatar/avatar-5.jpg"></div>  
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
      <a href="index.html" class="mega-link" data-action="click-trigger">
        <span class="mega-icon"><i class="fa fa-globe"></i></span> 
        <span class="badge vd_bg-red">51</span>        
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
                <img src="img/avatar/avatar.jpg" alt="example image" />               
            </span>
            <span class="mega-name">
               Abdur Rahman
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

<!--<div class="content">
  <div class="container">
     <div class="vd_content-wrapper">
      <div class="vd_container">-->

        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header"> 
              <ul class="breadcrumb">
                <li><a href="homepage.php">Home</a> </li>
                <li><a href="userBlog.php">Blog</a> </li>
                <li class="active">Blog content</li>
              </ul>
            
 
            </div>
          </div>


        <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>My Blog</h1>
              </div>
          </div>
          
                 <div class="col-sm-12">
                <div class="tabs widget" >
   <ul class="nav nav-tabs widget">
     <li> <a data-toggle="tab" href="Homepage.html"> Home <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li c> <a data-toggle="tab" href="Student-profile.html"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
    <li class="active"> <a data-toggle="tab" href="userBlog.html"> Blog <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
       <li> <a data-toggle="tab" href="Post_resume_form.html"> Post Resume<span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
       <?php if($role == "Instructor") {echo"<li> <a data-toggle=\"tab\" href=\"TA-RArequirements.php\"> TA/RA Circular <span class=\"menu-active\"><i class=\"fa fa-caret-up\"></i></span> </a></li>";}?>
    <?php if($role == "Recruiter"){echo "<li> <a data-toggle=\"tab\" href=\"job_circular.php\"> Job Posting Circular <span class=\"menu-active\"><i class=\"fa fa-caret-up\"></i></span> </a></li>";} ?>   
   </ul>


 <div class="row mgtp-20">



    <div class="col-md-8">
        <div class="panel widget light-widget panel-bd-top">
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                <h1 class="mgtp--5 font-bold">Data Structure</h1>
                <p class="vd_soft-grey">By: <a href="#">Abdur Rahman Writer</a></p>
                <hr/>
                <div class="row blog-info">
                  <div class="col-sm-3 blog-date font-sm"><i class="icon-clock  append-icon"></i><span class="vd_soft-grey"> 13 oct, 2016</span></div>
                  <div class="col-sm-3 blog-comments font-sm"><i class="fa fa-comments  append-icon"></i><span class="vd_soft-grey"> <a href="#">0 Comments</a></span></div>
                  <div class="col-sm-6 blog-tags font-sm"><i class="fa fa-tags append-icon"></i><span class="vd_soft-grey"> <a href="#">programming</a>, <a href="#">Data</a></span></div>
                </div>
                <br/>
                <br/>

<div class="row blog-content">
                  <div class="col-xs-12">
                    <p> <img src="img/blog/03.jpg" class="img-right" alt="example image">In computer science, a data structure is a particular way of organizing data in a computer so that it can be used efficiently.[1][2] Data structures can implement one or more particular abstract data types (ADT), which specify the operations that can be performed on a data structure and the computional complexity of those operations. In comparison, a data structure is a concrete implementation of the specification provided by an ADT.

Different kinds of data structures are suited to different kinds of applications, and some are highly specialized to specific tasks. For example, relational databases commonly use B-tree indexes for data retrieval,[3] while compiler implementations usually use hash tables to look up identifiers.

Data structures provide a means to manage large amounts of data efficiently for uses such as large databases and internet indexing services. Usually, efficient data structures are key to designing efficient algorithms. Some formal design methods and programming languages emphasize data structures, rather than algorithms, as the key organizing factor in software design. Data structures can be used to organize the storage and retrieval of information stored in both main memory and secondary memory. <br>
                      <br>
                      In computer science, a data structure is a particular way of organizing data in a computer so that it can be used efficiently.[1][2] Data structures can implement one or more particular abstract data types (ADT), which specify the operations that can be performed on a data structure and the computional complexity of those operations. In comparison, a data structure is a concrete implementation of the specification provided by an ADT.

Different kinds of data structures are suited to different kinds of applications, and some are highly specialized to specific tasks. For example, relational databases commonly use B-tree indexes for data retrieval,[3] while compiler implementations usually use hash tables to look up identifiers.

Data structures provide a means to manage large amounts of data efficiently for uses such as large databases and internet indexing services. Usually, efficient data structures are key to designing efficient algorithms. Some formal design methods and programming languages emphasize data structures, rather than algorithms, as the key organizing factor in software design. Data structures can be used to organize the storage and retrieval of information stored in both main memory and secondary memory.</p>
                    <br/>
                    <div class="well well-lg font-sm text-center"> "There are numerous types of data structures, generally built upon simpler primitive data types" </div>
                    <br/>
                    <p>Data structures are generally based on the ability of a computer to fetch and store data at any place in its memory, specified by a pointer—a bit string, representing a memory address, that can be itself stored in memory and manipulated by the program. Thus, the array and record data structures are based on computing the addresses of data items with arithmetic operations; while the linked data structures are based on storing addresses of data items within the structure itself. Many data structures use both principles, sometimes combined in non-trivial ways (as in XOR linking).

The implementation of a data structure usually requires writing a set of procedures that create and manipulate instances of that structure. The efficiency of a data structure cannot be analyzed separately from those operations. This observation motivates the theoretical concept of an abstract data type, a data structure that is defined indirectly by the operations that may be performed on it, and the mathematical properties of those operations (including their space and time cost)</p>
                  </div>
                </div>
                <br/>
                <br/>
            </div>
            </div>
            

    </div>


  <!-- col-md-4 -->
    <div class="col-md-4">
        <div class="panel widget light-widget panel-bd-top vd_bdt-yellow">
              <div class="panel-heading no-title"> </div>
              <div class="panel-body">
                <h2 class="mgtp--5">Recent Blogs</h2>
                <div class="content-list content-image">
                  <ul class="list-wrapper no-bd-btm">
                    <li> <a href="#">
                      <div class="menu-icon"><img src="img/blog/01-square.jpg" alt="example image"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0">Data Structure part 2</h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: January 10th, 1987 </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="menu-icon"><img src="img/blog/02-square.jpg" alt="example image"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0">Cool Obligation</h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: February 19th, 2017 </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="menu-icon"><img src="img/blog/03-square.jpg" alt="example image"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0">Get What You Want</h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: March 24th, 2014 </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="menu-icon"><img src="img/blog/01-square.jpg" alt="example image"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0">Excelent in Every Step</h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: November 1st, 2011 </div>
                        </div>
                      </div>
                      </a> </li>
                    <li> <a href="#">
                      <div class="menu-icon"><img src="img/blog/02-square.jpg" alt="example image"></div>
                      <div class="menu-text pd-5">
                        <h5 class="mgbt-xs-0">True Skill Leads Nowhere</h5>
                        <div class="menu-info">
                          <div class="menu-date font-xs">Posted: December 10th, 2014 </div>
                        </div>
                      </div>
                      </a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Panel Widget --> 
            

    </div> <!-- col-md-4 --> 


</div> <!--row endds-->
    

        

              
          
          
         
          
        </div>
        <!--row --> 
        
      </div>
    </div>
  </div>
</div>
<!-- Middle Content End --> 
