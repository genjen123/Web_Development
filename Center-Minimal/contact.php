<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' href='index.css' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand|Raleway">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="links.js"></script>
    <title>Contact</title>
    
    <!-- CSS STYLE -->
    <style>
        .error { 
            color: red; 
            font-size: 10pt;
        }
        .formType { font-size: 12pt; }
        
        .info { 
            max-width: 500px; 
            font-size: 11pt;
        }
        
        input[type=text], textarea {
            border: 1px solid #AEAEAE;
            padding: 5px;
            border-radius: 3px;
            max-width: 700px;
        }
        
        input[type=submit] {
            letter-spacing: 1px;
            font-size: 14pt;
            color: white;
            background-color: #4190BC;
            min-width: 100px;
            min-height: 40px;
            border-radius: 3px;
            border: solid 2px #4190BC;
            margin-bottom: 20px;
        }
        
        input[type=submit]:hover {
            font-weight: 600;
            color: #4190BC;
            background-color: white;
            border: solid 2px #4190BC;
        }
    </style>
    
    <!-- Updates the Title margin -->
    <script>
    $(document).ready(function(){
        updateTitle();
        $(window).resize(updateTitle);
        
        function updateTitle() {
            if($(window).width() < 550) { $("div.title").css("margin-top", 40); }
            else{ $("div.title").css("margin-top", 20); }
        }
    });
    </script>
</head>

<body>
<!-- Navigation bar -->
<div id="navigation">
    <a href="index.html">HOME</a> /
    <a href="about.html">ABOUT</a> /
    <a href="portfolio.html">PORTFOLIO</a> /
    <a href="contact.php" style="color:#38B6B6">CONTACT</a>
</div>
    
<div class="container outer">
    <div class="middle">
        <div class="main">
            <!-- Header -->
            <div class="col-lg-12" style="text-align:left">
                <div class="row">
                    <div class="title">Contact</div>
                    <p class="info">
                        Got a <b>project</b> or have further <b>questions</b>? 
                        Feel free to contact me using the form below or directly 
                        by email at <i>youremail@source.com</i> 
                    </p>
                </div>
                
                <!-- Contact Form -->
                <?php
                    $name = $subject = $email = $message = $nameErr = $emailErr = $messageErr = "";
                    $checkName = $checkEmail = $checkMessage = false;
                    
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        //check and validate mandatory name
                        if(empty($_POST["name"])) { 
                            $nameErr = "Name is required"; 
                            $checkName = false;
                        }
                        else { 
                            $name = test_input($_POST["name"]);
                            $checkName = true;
                            
                            if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
                                $nameErr = "Invalid name format"; 
                                $checkName = false;
                            }
                        }
                        
                        //check optional subject, else submit a standard subject
                        if(!empty($_POST["subject"]))
                        { $subject = test_input($_POST["subject"]); }
                        
                        //check and validate mandatory email address
                        if(empty($_POST["email"])) { 
                            $emailErr = "Email is required"; 
                            $checkEmail = false;
                        }
                        else { 
                            $email = test_input($_POST["email"]);
                            $checkEmail = true;
                            
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                                $emailErr = "Invalid email format"; 
                                $checkEmail = false;
                            }
                        }
                        
                        //check and validate mandatory email message
                        if(empty($_POST["message"])) { 
                            $messageErr = "Message is required"; 
                            $checkMessage = false;
                        }
                        else { 
                            $message = test_input($_POST["message"]); 
                            $checkMessage = true;
                        }
                        
                        $sendTo = "j.t.nguyen1994@gmail.com";
                        $sendFrom = "From: " . $email;
                    }
                    
                    //trims unnescessary characters
                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                ?>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <b class="formType">Name:</b> 
                    <span class="error"> * <?php echo $nameErr ?> </span> <br>
                    <input type="text" name="name" value="<?php echo $name; ?>" style="width:250px">
                    <br><br>
                    
                    <b class="formType">Subject:</b> <br> 
                    <input type="text" name="subject" value ="<?php echo $subject; ?>" style="width:250px">
                    <br><br>
                    
                    <b class="formType">Email:</b> 
                    <span class="error"> * <?php echo $emailErr ?> </span> <br>
                    <input type="text" name="email" value="<?php echo $email; ?>" style="width:250px">
                    <br><br>
                    
                    <b class="formType">Message:</b> 
                    <span class="error"> * <?php echo $messageErr ?> </span> <br>
                    <textarea name="message" rows="6" style="width:400px"><?php echo $message; ?></textarea>
                    <br><br>
                    
                    <input type="submit" name="submit" value="Submit">
                    <?php
                        if($checkName && $checkEmail && $checkMessage) { 
                            if(empty($_POST["subject"]))
                            { $subject = "Form submission from website"; }
                            
                            mail($sendTo, $subject, $message, $sendFrom);
                            header('Location: thanks.html');
                            exit;
                        }
                    ?>
                </form>
                
                <!-- Other account links -->
                <div class="row" id="links" style="text-align:center">
                    <a href="#">
                        <img src="img/GitHub-Original.png" width="35px" height="35px" title="GitHub" id="git">
                    </a>
                    
                    <a href="#">
                        <img src="img/LinkedIn-Original.png" width="35px" height="35px" title="LinkedIn" id="linked">
                    </a>
                    
                    <a href="#" download>
                        <img src="img/Download-Original.png" width="35px" height="35px" title="Download Resume" id="download">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>