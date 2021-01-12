<?php

error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$messagesent = 2;
$display = "";

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['email']) && $_POST['email']!='')
{
    if(isset($_POST['name']) && $_POST['name']!='')
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
                        // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            

            try {
                //Server settings
                $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'dummymail02022000@gmail.com';                     // SMTP username
                $mail->Password   = 'dummypass02';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress('diptayan2k@gmail.com', 'Joe User');     // Add a recipient
            

                $username = $_POST['name'];
                $usermail = $_POST['email'];
                $message = $_POST['message'];

            
                $body = "";

                $body .= "From: ".$username."\r\n";
                $body .= "Email: ".$usermail."\r\n";
                $body .= "Message:\r\n ".$message."\r\n";

                $body = nl2br($body);

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Form Submission';
                $mail->Body    = $body;
                
            
                

                $mail->send();
                $messagesent = 1;
                $display = "Message sent successfully";

                

               
            } catch (Exception $e) {
                $messagesent = 0;
                $display = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            
        }
    }

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diptayan Biswas</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script language="Javascript" type="text/javascript" src="script.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>

<body style = "background-color: #212529;">

    <?php
        if($messagesent==1) {
        $messagesent = 2;
        ?>
            
            <br>
            <br>
            <h3 style = "color: white; text-align : center;">Message sent Successfully !!</h3>
            <h5 style = "color: white; text-align : center;">Redirecting to the previous page...</h5>
            <script>
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 3000);
            </script>
    
        <?php

        }
        else if($messagesent==0){
            $messagesent = 2;
            ?>
                <br>
                <br>
                <h3 style = "color: white; text-align : center;"> <?php echo $display; ?> </h3>
                <h5 style = "color: white; text-align : center;">Redirecting to the previous page...</h5>
                <script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 3000);
                </script>
                
            <?php
            
        }

        else
        {
    ?>

    <!--Header-->
    <header>
        <div class="smart-scroll">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">&nbsp Diptayan Biswas</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li><a class="nav-link" href="#home">&nbsp Home </a></li>
                            <li><a class="nav-link" href="#edu1">&nbsp Education </a></li>
                            <li><a class="nav-link" href="#skil">&nbsp Skills </a></li>
                            <li><a class="nav-link" href="#exp">&nbsp Experience </a></li>
                            <li><a class="nav-link" href="#cp">&nbsp Competetive Programming </a></li>
                            <li><a class="nav-link" href="#pro">&nbsp My works </a></li>
                            <li><a class="nav-link" href="#cnt">&nbsp Contact </a></li>
                        </ul>

                    </div>
                </div>
            </nav>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </div>
    </header>

    <!--About me section-->
    <div class="profile" id="home" style = "overflow-x: hidden;">
        <br>
        <br>
        <br>
        <br>
        <img class="pic"  src="images/diptayan.jpg" alt="" style="border-radius: 50%;">
        <br>

        <div class="output" id="output" style="height : 105px;">
            <h1 class="cursor" style="font-size: 29px;"></h1>

        </div>
        <div class = "lmao" data-aos = "fade-up">
            <p class="profile-links">


                <a class = "zoom" href="https://www.linkedin.com/in/diptayan-biswas-6814b1137/" target=_blank><img
                        src="images/linkedin1.png" alt="" class="icon" style="border-radius: 50%;"></a>
                &nbsp
                &nbsp
                <a class = "zoom" href="mailto: diptayan2k@gmail.com" target=_blank><img src="images/email.png" alt="" class="icon"
                        style="border-radius: 50%;"></a>
                &nbsp
                &nbsp
                <a class = "zoom" href="https://github.com/diptayan2k" target=_blank><img src="images/github.png" alt=""
                        class="icon"></a>
                &nbsp
                &nbsp
                <a class = "zoom" href="https://codeforces.com/profile/kakarotto_sama" target=_blank><img src="images/codeforces.png"
                        alt="" class="icon"></a>
                &nbsp
                &nbsp
                <a class = "zoom" href="https://www.codechef.com/users/diptayan" target=_blank><img src="images/codechef1.png" alt=""
                        class="icon" style="border-radius: 50%;"></a>

            </p>
            <br>
            <br>
        </div>

        <div class="about-me" data-aos="fade-down">
            <h2 style="text-align: center;">About Me</h1>



                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">

                        <p style="text-align: justify; padding-top: 30px;color: rgba(255, 255, 255, 0.705);">

                            I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive Coding
                            and
                            different fields
                            of Computer Science. I am proficient in Data Structures, Algorithms and also familiar with
                            CS
                            core subjects, Machine
                            Learning and Frontend Development. I am a 6-star coder on Codechef and an Expert on
                            Codeforces. I have been doing Competetive coding for 2 years and I also have decent ranks in
                            many coding contests.
                            Currently I am open for SDE roles and looking for opportunities in the field of Software
                            Engineering.
                        </p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="row">


                            <div class="col-6 " style="text-align: center; padding: 5px;">
                                <br>Currently
                            </div>
                            <div class="col-6 " style="text-align: center; padding: 5px;">
                                <br>Student
                            </div>
                            <div class="gradient-border"></div>

                            <div class="col-6 " style="text-align: center; padding: 5px;">
                                Graduating in
                            </div>
                            <div class="col-6" style="text-align: center; padding: 5px;">
                                2021
                            </div>
                            <div class="gradient-border"></div>

                            <div class="col-6 " style="text-align: center; padding: 5px;">
                                Location

                            </div>
                            <div class="col-6 " style="text-align: center; padding: 5px;">
                                Kolkata, India
                            </div>



                            <div class="col-6" id="wrapper" style="padding: 15px">

                                <button type="button" class="btn btn-dark"
                                    style="color: blanchedalmond; background-color:#343a40; ">Contact
                                    Me</button>
                            </div>
                            <div class="col-6" id="wrapper" style="padding: 15px">
                                <button type="button" class="btn btn-dark"
                                    style="color: blanchedalmond; background-color:#343a40;">Download
                                    CV</button>
                            </div>

                        </div>
                        <div id="edu1"></div>



                    </div>
                </div>
        </div>
    </div>

    <!--Education-->

    <div class="education" id="education" style="background-color:#343a40; overflow-x: hidden ;">
        <br>
        <br>
        <h1 class="section-heading" data-aos = "zoom-in" style="text-align : center; margin-top: 10px;"><span
                style="color: blanchedalmond;/* border: 2px solid blanchedalmond;*/ padding: 8px 25px; border-radius: 6px;">
                My Education</span></h1>
        <br>
        <div class="main-timeline">

            <!-- start experience section-->
            <div class="timeline">
                <div class="icon"></div>
                <div class="date-content">
                    <div class="date-outer" data-aos="zoom-in">
                        <span class="date" style="z-index:1000;">
                            <span class="month" style=" color:cornsilk !important;">2017 - 2021</span>
                            <span class="year" style=" color:cornsilk !important;">4 Years</span>
                        </span>
                    </div>
                </div>
                <div class="timeline-content" data-aos="slide-left">
                    <h5 class="title"> KALYANI GOVERNMENT ENGINEERING COLLEGE</h5>
                    <p class="description">
                        <b>Bachelor of Technology in Computer Science</b><br>
                        <i> Kalyani, West Bengal</i> <br>
                        CGPA: 8.55/10 (Upto 6th Semester)</i>
                    </p>
                </div>
            </div>
            <!-- end experience section-->

            <!-- start experience section-->
            <div class="timeline ">
                <div class="icon"></div>
                <div class="date-content">
                    <div class="date-outer" data-aos="zoom-in">
                        <span class="date" style="z-index:1000;  color:cornsilk !important;">
                            <span class="month">2015 - 2017</span>
                            <span class="year" style=" color:cornsilk !important;">2 Years</span>
                        </span>
                    </div>
                </div>
                <div class="timeline-content" data-aos="slide-right">
                    <h5 class="title">KENDRIYA VIDYALAYA NO.2 ISHAPORE</h5>
                    <p class="description">
                        <b>Central Board of Secondary Education</b><br>
                        <i>Ishapore, West Bengal<br>
                            All India Senior School Certificate Examination<br></i> Score: 90.8%</i>
                    </p>
                </div>
            </div>
            <!-- end experience section-->

            <!-- start experience section-->
            <div class="timeline">
                <div class="icon"></div>
                <div class="date-content">
                    <div class="date-outer" data-aos="zoom-in">
                        <span class="date" style="z-index:1000; color:cornsilk !important;">
                            <span class="month">Upto</span>
                            <span class="year" style=" color:cornsilk !important;">2015</span>
                        </span>
                    </div>
                </div>
                <div class="timeline-content" data-aos="slide-left">
                    <h5 class="title">KENDRIYA VIDYALAYA NO.2 ISHAPORE</h5>
                    <p class="description">
                        <b>Central Board of Secondary Education</b><br>
                        <i>Ishapore, West Bengal<br>
                            All India Secondary School Examination</i> <br>CGPA: 10/10
                    </p>

                </div>


            </div>




        </div>

        <div id="skil" style="height: 40px;"></div>
    </div>





    <!--Skills-->
    <div class="skill"  id="skill"
        style="color: rgb(233, 228, 221); min-width: 300px; padding:8%; padding-top:30px; line-height: 150%;">


        <h1 class="section-heading" data-aos = "zoom-in" style="text-align : center; margin-top: 10px;"><span
                style="/*border: 2px solid blanchedalmond;*/ padding: 8px 25px; border-radius: 6px;">
                My Skills</span></h1>
        <br>

        <br>

        <div class="row">
            <div class="col-lg-6" data-aos = "flip-left">

                <table style=" border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/dsa.jpg" height="50px" width="50px" style="border-radius: 10px;"></p>
                        </td>
                        <td>
                            <h4 style="/*font-family: 'Courier New', Courier, monospace; font-weight: 600;*/">Data
                                Structures &amp; Algorithms</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">
                                I am proficient in Data Structures and Algorithms. I regularly participate in contests
                                in different
                                competetive coding websites. Till now I have solved more than 1000 problems in platforms
                                like codechef,
                                codeforces and leetcode.
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <!--*****************************************************************************************************************************************-->

            <div class="col-lg-6" data-aos = "flip-right">

                <table style="border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/cpp.png" height="50px" width="50px"></p>
                        </td>
                        <td>
                            <h4>C++</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">

                                I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive
                                Coding and
                                different fields
                                of Computer Science. I am proficient in Data Structures, Algorithms and also familiar
                                with CS
                                core subjects, Machine
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>


            </div>

            <!--*****************************************************************************************************************************************-->

            <div class="col-lg-6" data-aos = "flip-left">

                <table style="border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/py.jpg" height="50px" width="50px" style="border-radius:10px;"></p>
                        </td>
                        <td>
                            <h4>Python</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">

                                I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive
                                Coding and
                                different fields
                                of Computer Science. I am proficient in Data Structures, Algorithms and also familiar
                                with CS
                                core subjects, Machine
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>

            </div>

            <!--*****************************************************************************************************************************************-->

            <div class="col-lg-6" data-aos = "flip-right">

                <table style="border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/ml.jpg" height="50px" width="50px" style="border-radius: 10px;"></p>
                        </td>
                        <td>

                            <h4>Machine Learning</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">

                                I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive
                                Coding and
                                different fields
                                of Computer Science. I am proficient in Data Structures, Algorithms and also familiar
                                with CS
                                core subjects, Machine
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>


            </div>

            <!--*****************************************************************************************************************************************-->

            <div class="col-lg-6" data-aos = "flip-left">

                <table style="border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/dbms.png" height="50px" width="50px"></p>
                        </td>
                        <td>
                            <h4>Database Management System</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">

                                I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive
                                Coding and
                                different fields
                                of Computer Science. I am proficient in Data Structures, Algorithms and also familiar
                                with CS
                                core subjects, Machine
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>


            </div>

            <!--*****************************************************************************************************************************************-->

            <div class="col-lg-6" data-aos = "flip-right">

                <table style="border-spacing: 20px; border-collapse: separate;">
                    <tr>
                        <td style="vertical-align: top;">
                            <p><img src="images/front.png" height="50px" width="50px"></p>
                        </td>
                        <td>
                            <h4>HTML, CSS</h4>
                            <p style="color: rgba(255, 255, 255, 0.5);">

                                I am Diptayan Biswas, a 4th year CSE student. I have a great inerest in Competetive
                                Coding and
                                different fields
                                of Computer Science. I am proficient in Data Structures, Algorithms and also familiar
                                with CS
                                core subjects, Machine
                                <br>

                            </p>
                        </td>
                    </tr>
                </table>


            </div>

        </div>


    </div>


    <!-------------------------------------------------------------Experience---------------------------------------------------------->

    <div class="experience" id="exp" style="background-color:#343a40; color:rgb(233, 228, 221); overflow-x:hidden;">
        <br>
        <br>
        <br>
        <h1 class=" section-heading" data-aos = "zoom-in" style="text-align : center; margin-top: 10px;">
            My Experience</h1>

        <div class="gfg"
            style="padding: 8%; padding-top: 100px; padding-bottom : 0px; color:rgba(233, 228, 221, 0.884); font-size: 25px;">
            <h2 class="exp" data-aos="zoom-up" style="font-size: 40px; text-align: center;">
                Internship Experience
                <br>
                <br>
            </h2>

            <div class="row gap-2" >

                <div class="text-center col-lg-4" data-aos = "flip-up">
                    <img src="images/gfg.png" alt="" style="padding : 20px;">

                </div>

                <div class="col-lg-7" data-aos = "flip-down">
                    <h4 style="font-size: 30px; color: rgba(233, 228, 221, 0.705);"> GeeksForGeeks </h4>
                    <p style="color: rgba(233, 228, 221, 0.582);">
                    <ul style="color: rgba(233, 228, 221, 0.582);">
                        <li>Technical content writer intern at GeeksForGeeks.</li>
                        <li>Created problem statements on Data Structures and Algorithms, provided proper explanation
                            for them along
                            with the respective code in any programming language.
                            <a href="https://auth.geeksforgeeks.org/user/diptayanbiswas/articles"
                                style="text-decoration: none; color : rgb(173, 188, 230);" target="_blank">My
                                articles.</a>

                        </li>

                    </ul>
                    </p>
                </div>
            </div>


        </div>

        <div class="volunteer"
            style="padding: 8%; padding-top: 100px; color:rgba(233, 228, 221, 0.884); font-size: 25px;">
            <h2 class="exp" data-aos="zoom-down" style="font-size: 40px; text-align: center;">
                Volunteer Experience
                <br>
                <br>
            </h2>


            <div class="row gap-2">

                <div class="text-center col-lg-4" data-aos = "flip-up">
                    <img src="images/keygen.jpg" alt="" style="padding : 20px;">

                </div>

                <div class="col-lg-7" data-aos = "flip-down">
                    <h4 style="font-size: 30px; color: rgba(233, 228, 221, 0.705);"> KeyGEnCoders </h4>
                    <p style="color: rgba(233, 228, 221, 0.582);">
                    <ul style="color: rgba(233, 228, 221, 0.582);">
                        <li>Active member of KeyGEnCoders (Codechef Campus Chapter and coding club of the college)</li>
                        <li>Problem setter at <a href="https://www.codechef.com/IGNO2019/"
                                style="text-decoration: none; color : rgb(173, 188, 230);" target="_blank">Ignition
                                3.0</a>, university level coding competition, organized by
                            KeyGEnCoders.
                        </li>
                        <li>Volunteered for taking classes and teaching Data Structures, Algorithms to juniors.</li>
                    </ul>
                    </p>
                </div>


            </div>






            
        </div>




    </div>


    <!-- -------------------------------------------------Competitive Coding---------------------------------------------------------- -->


    <div class="cp" id="cp" style="color:rgb(233, 228, 221); overflow-x: hidden;">

        <br>
        <br>
        <br>
        <div class = "mx-auto text-center" >
            <h1 class="section-heading" data-aos = "zoom-in" style="text-align : center; margin-top: 10px;"><span style="padding: 8px 25px; border-radius: 6px;">
            Competitive Coding &nbsp</span></h1>
        </div>

        <div class="row gap-5 mx-auto text-center" style="padding: 8%; padding-top: 80px;">

            <div class="col-lg-3 mx-auto text-center" data-aos = "fade-right" id="cp1"
                style="background-color:#343a40; padding :10px; border-radius: 10px; box-shadow: 8px 8px #343a4079; ">


                <img src="codeforces_logo.png" height="100px"
                    style="margin-bottom: 7px; margin-top:3px; max-width: 100%;">

                <p style="text-align: center; height:60px">
                    <span style="color:rgb(0, 0, 255); font-weight: 500; font-size: 25px; max-width: 100%;">
                        kakarotto_sama
                        (Expert)</span><br>
                </p>


                <div class="atgraph"  style="position: relative;">
                    <img src="cfgraph.png" width:60% style="border-radius:6px; max-width: 100%;">

                    <div class="overlayat">
                        <div class="textat" style="max-height: 80%; width : 80%; ">
                            <span style="color:rgb(0, 0, 255); font-weight: 600; font-size: 40px;">
                                1759<br>Expert</span>
                        </div>
                    </div>
                </div>


                <br>

                <div class="progress-bar1">
                    <span style="width: 98%; vertical-align: top !important;">Ranked top 98 Percentile in India</span>
                </div>

                <br>

                <a href="https://codeforces.com/profile/kakarotto_sama" target=_blank><button type="button"
                        class="btn btn-dark" style="color: blanchedalmond; background-color:#212529; "> Visit
                        Profile</button></a>
            </div>

            <div class="col-lg-3 mx-auto text-center" data-aos = "fade-up" id="cp1"
                style="background-color:#343a40; padding :10px; border-radius: 10px; box-shadow: 8px 8px #343a4079;">
                <img src="cclogo.png" height="80px" style="margin-top: 5px; max-width: 100%;">
                <br>
                <p style="text-align: center; height:60px;">
                    <span class="rating" style="display: inline-block; 
                    font-size: 20px; 
                    background: #FF7F00;
                    padding: 0 3px; 
                    line-height: 1.3; 
                    color: white;
                    margin-right: 2px;">6★</span> <span
                        style="color:#FF7F00; font-weight: 500; font-size: 25px;">diptayan</span><br>

                </p>


                <div class="atgraph" style="position: relative;">
                    <img src="ccgraph.PNG" width:60%
                        style="border-radius:6px !important; max-width: 100%; min-width: 60% !important';">

                    <div class="overlayat">
                        <div class="textat" style="width :100%;">
                            <span style="color: black;">2210</span><br>
                            <div class="rating-star" style="font-size: 19px; width : 100%;">
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                                <span style="background-color:#FF7F00;  padding: 3px 1px 3px 5px;">★ </span>
                            </div>
                        </div>
                    </div>
                </div>


                <br>

                <div class="progress-bar1">
                    <span style="width: 99%; vertical-align: top !important;">Ranked top 99 Percentile in India</span>
                </div>


                <br>
                <a href="https://www.codechef.com/users/diptayan" target=_blank><button type="button"
                        class="btn btn-dark" style="color: blanchedalmond; background-color:#212529; ">Visit
                        Profile</button></a>

            </div>

            <div class="col-lg-3 mx-auto text-center" data-aos = "fade-left" id="cp1"
                style="background-color:#343a40; padding :10px; border-radius: 10px; box-shadow: 8px 8px #343a4079;">
                <img src="atcoderlogo.png" height="80px" style="margin-top: 5px; max-width:100% !important;">
                <br>
                <p style="text-align: center; height:60px;">
                    <span style="color:cyan; font-weight: 500; font-size: 25px; max-width: 100%;"> diptayan
                        (4-kyu)</span><br>

                </p>


                <div class="atgraph" style="position: relative;">
                    <img src="atcodergraph.PNG" width:60% style="border-radius:6px; max-width: 100%;">

                    <div class="overlayat">
                        <div class="textat">1308<br>4-kyu</div>
                    </div>
                </div>





                <br>

                <div class="progress-bar1">
                    <span style="width: 97%; vertical-align: top !important;">Ranked top 97 Percentile in India</span>
                </div>

                <br>



                <a href="https://atcoder.jp/users/diptayan" target=_blank><button type="button" class="btn btn-dark"
                        style="color: blanchedalmond; background-color:#212529; ">Visit Profile</button></a>
            </div>

        </div>

        <div class="row  mx-auto" style="padding: 8%; padding-top: 0;">

            <div class="col-lg-6" style="font-size: 18px" data-aos="zoom-in-right">
                <h2>Google Kickstart</h2>
                <br>
                <h5 style="color: rgba(255, 255, 255, 0.747);">About Kick Start</h5>
                <p style="color: rgba(255, 255, 255, 0.5);">
                    Kick Start is a global online coding competition, consisting of three-hour rounds of a variety of
                    algorithmic challenges
                    organised by google.
                </p>
                <h5 style="color: rgba(255, 255, 255, 0.747);">My Performance</h5>
                <p style="color: rgba(255, 255, 255, 0.5);">
                    I participated in all the rounds of Google Kick start in 2020. Some of my decent ranks are :<br>
                <ul style="color: rgba(255, 255, 255, 0.5);">
                    <li>
                        Global rank of 571 out of 11000+ participants in Google Kickstart Round E 2020.
                    </li>
                    <li>
                        Global rank of 384 out of 8000+ participants in Google Kickstart Round G 2020.
                    </li>
                    <li>
                        Global rank of 377 out of 5000+ participants in Google Kickstart Round H 2020.
                    </li>
                </ul>



                </p>
            </div>

            <div class="col-lg-6 text-center mx-auto" data-aos="zoom-out-left">
                <table style="height: 100%;">
                    <tr>
                        <td>
                            <img src="images/kickstart.PNG" alt="" style="width: 100%;">
                        </td>
                    </tr>
                </table>

            </div>

        </div>



    </div>


    <!------------------------------------------------------------------My works----------------------------------------------------------------->
    
    <div class="project mx-auto  text-center" id="pro" style=" background-color:#343a40; color:rgba(255, 255, 255, 0.747);">
        <br>
        <br>
        <br>
        <h1 class="section-heading" data-aos = "zoom-in" style="text-align: center;">
            My Works

        </h1>
        <br>
        <br>
        <br>

        <div class="row mx-auto" style="width: 90%; ">
            <div class="col-lg-6" style="padding-bottom: 10px; padding-top: 20px;  ">
                
                <div class = "col-lg-12 effect8" data-aos="flip-right" style = "background-color: #212529; height: 100%; padding : 30px; border-radius: 10px; overflow: hidden;">
                    <a class = "zoom1" href="https://github.com/diptayan2k/Code_Debugger" target=_blank>
                        <div class="atgraph" style="position: relative;">
                            <img src="images/codebug.PNG"
                                style=" max-width: 100%; padding-left: auto; padding-right: auto; border-radius: 6px;">
                            
                            <!--
                            <div class="overlayat">
                                <div class="textat" style="width : 100%; color: black; font-weight: 900;">CODE - DEBUGGER
                                </div>
                            </div>
                            -->
                        </div>
                    </a>


                    <br>
                    <br>
                    <h5>Code Debugger</h5>
                    <span style = "color:rgba(255, 255, 255, 0.5); text-align: left;">
                        <p style = "color:rgba(255, 255, 255, 0.5); ;">
                        <ul>
                        <li>A python GUI based application made using TkInter that takes two source codes, executes them against a common input and compares their stdout output.</li>
                        <li>Currently the supported languages are CPP, Python3 and Java.</li>
                        </ul>
                    </p>
                    </span>
                </div>

            </div>

            <div class="col-lg-6 text-center" style="padding-bottom: 10px; padding-top: 20px;">

                <div class = "col-lg-12 effect8" data-aos="flip-left" style = "background-color: #212529; height: 100%;  padding : 30px; border-radius: 6px; overflow: hidden;">
                    <a class = "zoom1" href="https://github.com/diptayan2k/SortingAlgorithmVisualizer" target=_blank>
                        <div class="atgraph" style="position: relative;">

                            <img src="images/sorting.PNG"
                                style=" max-width: 100%; padding-left: auto; padding-right: auto; border-radius: 10px;">

                            <!--
                            <div class="overlayat">
                                <div class="textat" style="width : 80%; font-size: 30px; color: black; font-weight: 900;">
                                    SORTING ALGORITHM<br> VISUALIZER</div>
                            </div>
                            -->
                        </div>
                    </a>


                    <br>
                    <br>
                
                    <h5>Sorting Algorithm Visualizer</h5>
                        <span style = "color:rgba(255, 255, 255, 0.5); text-align: left;">
                            <p style = "color:rgba(255, 255, 255, 0.5); ;">
                            <ul>
                            <li>A python GUI based application made using Tkinter that can be used to visualize different
                            sorting algorithms</li>
                            <li>The algorithms include Bubble Sort, Merge Sort, Selection Sort, Insertion Sort and Quick sort.</li>
                            </ul>
                        </p>
                        </span>
                </div>
            </div>

            <div class="col-lg-6 text-center" style="padding-bottom: 10px; padding-top: 20px; ">

                <div class = "col-lg-12 effect8" data-aos="flip-left" style = "background-color: #212529; height: 100%;  padding : 30px; border-radius: 10px; overflow: hidden;">
                    <a class = "zoom1" href="https://github.com/diptayan2k/Breast_Cancer_Classification" target=_blank>
                        <div class="atgraph" style="position: relative;">
        
                            <img src="images/ml.svg"
                                style=" height:200px; max-width: 100%; padding-left: auto; padding-right: auto;">

                            <!--
                            <div class="overlayat">
                                <div class="textat" style="width : 80%; font-size: 30px; color: black; font-weight: 900;">
                                    CANCER CLASSIFICATION</div>
                            </div>
                            -->

                        </div>
                    </a>

                    <br>
                    <br>
                
                    <h5>Cancer Classification</h5>
                        <span style = "color:rgba(255, 255, 255, 0.5); text-align: left;">
                            <p style = "color:rgba(255, 255, 255, 0.5); ;">
                            <ul>
                            <li>A simple machine learning model to classify whether a cancer is benign or malignant.</li>
                            <li>To achieve this, Random Forest Algorithm has been used.</li>
                            </ul>
                        </p>
                        </span>

                 </div>
            </div>


            <div class="col-lg-6 text-center" style="padding-bottom: 10px; padding-top: 20px; ">

                <div class = "col-lg-12 effect8" data-aos="flip-right" style = "background-color: #212529; height: 100%;  padding : 30px; display: table; overflow: hidden; border-radius: 10px;">
                    <div style="display: table-cell; vertical-align: middle;">
                        <div>
                          <a id = "git" href = "https://github.com/diptayan2k" target =_blank style = "font-size: 300%; color:rgb(173, 188, 230);">View More on Github</a>
                          
                        </div>
                      </div>
                    
                </div>
            </div>
        
        </div>

        <br>
        <br>

    
    </div>

    <!---------------------------------------------------------------------------------Contact Me-------------------------------------------------------->

    <div class = "contact" id = "cnt" style = "color :rgba(255, 255, 255, 0.747); overflow-x: hidden;">
        
        
        <br>
        <br>
        <br>
        
        
        <div class = "mx-auto text-center">
            <h1 class="section-heading" data-aos = "zoom-in" style="text-align : center; margin-top: 10px;"><span style="padding: 8px 25px; border-radius: 6px;">
            CONTACT ME</span></h1>
        </div>
        <br>
        <br>
        <br>

        
        <div class = "row" style = "overflow : hidden;">
            
            <div class = "mx-auto text-center col-lg-4" data-aos="fade-right" style = "display: table; height: 600px;;; overflow: hidden;">
                
                
                
                <div style = "display: table-cell; vertical-align: middle;">

                    <div>
                        <i class='fas fa-map-marker-alt' style='font-size:30px ;color:rgb(255, 255, 255)'> Address</i><br><br>
                        <p> 6/A Middle Road, Kalianibash, Barrackpore <br> Post Office : Nona Chandan Pukur<br> Kolkata 700122</p>
                        <br>
                        <i class="fas fa-mobile-alt" style="font-size:30px;color:white"> Phone</i><br><br>
                        <p>+91 7044321498</p>
                        <br>
                        <i class="fas fa-envelope" style="font-size:30px;color:white"> Email</i><br><br>
                        <p>diptayan2k@gmail.com</p>
                        <br>
                        <i class="fab fa-linkedin-square" style="font-size:30px; aria-hidden="true"></i>
                        <i class="fas" style="font-size:30px;color:white"> Linkedin</i><br><br>
                        www.linkedin.com/in/diptayan-biswas-6814b1137
                    </div>
                </div>
                

            </div>

            <div class="wrapper col-lg-8 style = "max-width: 100%;">
                <div class="inner" data-aos= "fade-up" style = "width  = 80%;">
                    <form action="" method = "POST">
                        
                        <h4 style = "text-align: center;">CONTACT FORM</h4>
                        <br>

                        <label class="form-group">
                            <input type="text" name = "name" class="form-control"  required>
                            <span id = "name">Your Name</span>
                            <span class="border"></span>
                        </label>
                        <label class="form-group">
                            <input type="email" name = "email" class="form-control"  required style = "outline: none !important;">
                            <span id = "mail" for="">Your Mail</span>
                            <span class="border"></span>
                        </label>
                        <label class="form-group" >
                            <textarea name="message" id="" class="form-control" required></textarea>
                            <span class = "message" for="">Your Message</span>
                            <span class="border"></span>
                        </label>

                        
                        <div class = "row text-center style = "width: 100%;">

                            <div class="col-6" id="wrapper" style="padding: 5px">

                                <button type="submit" value="Submit" class = "lol" style = "max-width: 100%;">Submit</button>
                            </div>
                            <div class="col-6" id="wrapper" style="padding: 5px">
                                <button type="reset" value="Reset" class = "lol" style = "max-width: 100%;">Reset </button>
                            </div>

                                
                            </div>
                    
                    </form>
                </div>
            </div>

        </div>

        </div>

    </div>




    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <?php
        }
    ?>

</body>

</html>