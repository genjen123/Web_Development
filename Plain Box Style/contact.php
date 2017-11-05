<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='contact.css' type='text/css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Arimo|Muli" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Main</title>
</head>

<style>
    .error { color: red; }
    .changeColor span { color: #52886E; }
    .align-middle { transform: scale(0.90); }
</style>

<body>
    
<div class="container mainCenter">
<div class="center align-middle">
<!--HEADER-->
<!--
<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Bryan Marsh</a>
        </div>
        
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">HOME</a></li>
            <li><a href="#">ABOUT</a></li>
        </ul>
    </div>
</div>
-->

<div class="container">
    <div class="row header">
        <div class="col-md-12 text-center">
            <a class="link" href="main.html">HOME</a>
            <a class="link" href="contact.php">CONTACT</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron text-center changeColor">
                <h1>Bryan G. <span>Marsh</span></h1>
                <small class="subHead">Developer. Thinker. Builder.</small>
            </div>
        </div>
    </div>
</div>

<!--BODY-->
<div class="container">
    <!--Bio-->
    <div class="row">
        <div class="col-sm-5 col-md-4">
            <div class="about">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <img src="UCR.png" width="100px" height="100px">
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4 class="editSize">Current Status: <br />
                    <small>Software developer at Esri</small></h4>
                </div>
                
                <div class="col-sm-12">
                    asdfasdf asdfasdfasdfasdfsad
                    asdfasdfsadf
                </div>
                
                <div class="buttons">
                    <a href="#">
                        <img src="Github.png" onmouseover="this.src='Github-inverse.png'" onmouseout="this.src='Github.png'" alt="GitHub" height="20px">
                    </a>
                    <a href="https://www.linkedin.com/in/bryan-marsh-b8b52765/">
                        <img src="LinkedIn.png" onmouseover="this.src='LinkedIn-inverse.png'" onmouseout="this.src='LinkedIn.png'" alt="LinkedIn" height="20px">
                    </a>
                    <a href="#">
                        <img src="CV2.png" onmouseover="this.src='CV2-inverse.png'" onmouseout="this.src='CV2.png'" alt="CV" height="20px">
                    </a>
                </div>
            </div>
        </div>
        
        <!--Contact--> 
        <?php
        $name = $email = $subject = "";
        $nameErr = $emailErr = $subjectErr = "";
        $checkN = $checkE = $checkM = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["name"])) {
                $nameErr = "Name required";
            }
            else {
                $name = test_input($_POST["name"]);
                $checkN = true;
                
                if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Invalid name format";
                    $checkN = false;
                }
            }
            
            if(empty($_POST["email"])) {
                $emailErr = "Email required";
            }
            else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = test_input($_POST["email"]);
                $checkE = true;
                
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email address";
                    $checkE = false;
                }
            }
            
            if(empty($_POST["subject"])) {
                $subjectErr = "Message required";
            }
            else {
                $subject = test_input($_POST["subject"]);
                $checkM = true;
            }
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div class="col-sm-7 col-md-8">
            <div class="contact">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4>CONTACT: <br />
                        <small>&nbsp;&nbsp;&nbsp;</small>
                    </h4>
                </div>
                <div class="container col-sm-12">
                    <form action="" method="POST">
                        <label for="name">Name</label>
                        <span class="error"> *<?php echo $nameErr;?></span>
                        <input type="text" name="name" value="<?php echo $name;?>">
                        
                        <label for="email">Email</label>
                        <span class="error"> *<?php echo $emailErr;?></span>
                        <input type="text" name="email" value="<?php echo $email;?>">
                        
                        <label for="subject">Message</label>
                        <span class="error"> *<?php echo $subjectErr;?></span>
                        <textarea name="subject" style="height:150px"><?php echo $subject;?></textarea>
                        
                        <input type="submit" name="submit" value="Submit">
                        <?php 
                        if($checkN && $checkE && $checkM) {
                            echo "Message received - Thank you";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FOOTER-->
<div class="container-fluid footer text-center">
    <div class="col-sm-12">
        &copy 2017 <a href="#">Jenny T. Nguyen</a> - all rights reserved
    </div>
</div>
    
</div>
</div>

</body>
</html>