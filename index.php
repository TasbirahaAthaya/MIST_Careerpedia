<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MIST CareerPdeia</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style1.css">
<!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    
  </head>

  <body>
  <?php
    session_start();
    //connecting to database
    $conn = oci_connect('mist','mist','localhost/XE');
    //creating a hashmap
    $map = array(
        "Instructor" => "Inst",
        "Student" => "St",
        "Recruiter" => "Rec"
    );
  ?>
  <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h2><strong><font color="#66CDAA"><b>MIST CareerPedia</b></font></strong></h2>
                            <div class="description">
                            	<p>         A career and employment oriented social network..
                            	</p>
                            </div>
                        </div>
                    </div>

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
                <label class="sr-only" for="form-firstname">First Name</label>
                <input type="text" name="form-firstname" placeholder="First Name" class="form-firstname form-control" id="form-firstname">
            </div>
        
            <div class="field-wrap">
                <label class="sr-only" for="form-lasttname">First Name</label>
		<input type="text" name="form-lastname" placeholder="Last Name" class="form-lastname form-control" id="form-lastname">
            </div>
          </div>

          <div class="field-wrap">
            <label class="sr-only" for="form-email">Email</label>
            <input type="email" name="form-email" placeholder="Email" class="form-email form-control" id="form-email">
          </div>
          <div class="field-wrap">
          <label class="sr-only" for="form-username">Username</label>
            <input type="text" name="form-username" placeholder="Username" class="form-username form-control" id="form-username">
          </div>
          <div class="field-wrap">
            <label class="sr-only" for="form-password">Password</label>
            <input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password">
          </div>
          <div class="field-wrap">
            <label class="sr-only" for="form-type">I am</label>
            <select name="table" style="height:100%; width: 100%;border-radius: 5px;padding: 10px; line-height: 100%;">
                <option value="Instructor" selected="selected"> <br><b>Instructor</b><br> </option>
                <option value="Student"> <br><b>Student</b><br> </option>
                <option value="Recruiter"> <br><b>Recruiter</b><br> </option>
            </select>
          </div>
          <button type="submit" class="button button-block" name="Join">Join Now</button>
          </form>
          <?php
            if((isset($_POST["Join"])))
            {
                
                $fname = $_POST["form-firstname"];
                $lname = $_POST["form-lastname"];
                if($fname == "" || $lname == "")
                {
                    echo"
                    <script>
                        alert(\"Please insert both first and lastname\");
                    </script>
                    ";
                    goto loop_end1;
                }
                $email = $_POST["form-email"];
                if($email == "")
                {
                    echo"
                    <script>
                        alert(\"Input Email\");
                    </script>
                    ";   goto loop_end1;                  
                }
                $query = "SELECT * From all_user WHERE email = '".$email."'";
                $st = oci_parse($conn, $query);
                oci_execute($st);
                $numofrows=  oci_fetch_all($st, $outarr);
                if($numofrows > 0)
                {
                    echo"
                    <script>
                        alert(\"Email already in Use\");
                    </script>
                    ";          goto loop_end1;       
                }
                $username="";
                if((isset($_POST["form-username"])))
                {
                    $username = $_POST["form-username"];
                }
                else{
                     echo"
                    <script>
                        alert(\"Input an username\");
                    </script>
                    ";       goto loop_end1;             
                }
                $query = "SELECT * From all_user WHERE username = '".$username."'";
                $st2 = oci_parse($conn, $query);
                oci_execute($st2);
                $numofrows=  oci_fetch_all($st2, $outarr);
                if($numofrows > 0)
                {
                    echo"
                    <script>
                        alert(\"Username in Use\");
                    </script>
                    ";          goto loop_end1;       
                }
                $pw = $_POST["form-password"];
                $table = $_POST["table"];
                if($pw=="" || strlen($pw) < 8)
                {
                    echo"
                    <script>
                        alert(\"Password must be at least 8 characters long\");
                    </script>
                    ";          goto loop_end1;          
                }
                $jdate = date("d-M-Y");//24-Oct-2016 format
                $query = "INSERT INTO all_user VALUES ('".$email."','".$pw."','".$username."','".$table."', TO_DATE('".$jdate."', 'DD-MON-YYYY'))";
                $st3 = oci_parse($conn, $query);
                $bool=oci_execute($st3);

                $query = "INSERT INTO ".$map[$table]." (fname,lname,username) VALUES ('".$fname."','".$lname."','".$username."')";
                $st4 = oci_parse($conn, $query);
                $bool2=oci_execute($st4);
                if($bool2 == TRUE && $bool==TRUE)
                {
                    echo"
                    <script>
                        alert(\"Registration Successful. You may now login\");
                        location.replace(\"index2.php\");
                    </script>
                    ";
                }
                loop_end1:
            }
          ?>
          
          

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
       
        <div class="field-wrap">
          <label class="sr-only" for="form-username">Username</label>
                    <input type="text" name="form-username" placeholder="Username" class="form-username form-control" id="form-username">
        </div>

        <div class="field-wrap">
            <label class="sr-only" for="form-password">Password</label>
            <input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password">
        </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" class="button button-block" name="loginbtn"/>Log In</button>
          
          </form>
            
        </div>
        <?php
          //connecting to database
          $conn = oci_connect('mist','mist','localhost/XE');
        if((isset($_POST["loginbtn"])))
        {
            $username = $_POST["form-username"]; echo $username;
            $pw=$_POST["form-password"];
            $query = "SELECT pw From all_user WHERE username = '".$username."'";
            $st = oci_parse($conn, $query);
            oci_execute($st);
            if(($row=  oci_fetch_array($st)) != false)
            {
                $found_pw=$row[0];
                if($found_pw != $pw)
                {
                    echo "
                        <script>
                            alert(\"Username & password doesn't match\");
                            location.replace(\"index2.php\");
                        </script>
                        "; goto endd;
                }
                else{
                    $query = "SELECT * From ckpoint WHERE username = '".$username."'";
                    $st = oci_parse($conn, $query);
                    oci_execute($st);
                    $numofrows=  oci_fetch_all($st, $outarr);
                    if($numofrows > 0)
                    {
                        $_SESSION["username_s"]=$username;
                     echo "
                        <script>
                            alert(\"Login Successful\");
                            location.replace(\"homepage.php\");
                        </script>
                        ";                
                    }
                    else{
                        $_SESSION["username_s"]=$username;
                      echo "
                        <script>
                            alert(\"Login Successful\");
                            location.replace(\"edit-profile.php\");
                        </script>
                        ";                    
                    }
                }
            }
            else{
                    echo "
                        <script>
                            alert(\"Username doesn't exist\");
                            location.replace(\"index2.php\");
                        </script>
                        "; goto endd;            
            }            
        }

        endd:
        ?>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h4>By clicking Join Now you agree to MIST CareerPedia's User Agreement, Privacy Policy and Cookie Policy.</h4>
                        	
                        </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
        <!-- Javascript -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="assets/js/index.js"></script>
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    
    
  </body>
</html>
