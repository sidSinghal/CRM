


<?php

/**
 * Created by IntelliJ IDEA.
 * User: sneha
 * Date: 3/31/2017
 * Time: 5:39 AM
 */
include('db.php');

ob_start();
session_start();

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}




$uid=$_SESSION['uid'];
$name=$_SESSION['name'];
//$typeid=$_SESSION['typeid'];
$email=$_SESSION['email'];




if (isset($_POST['verify'])) {
    $code = sanitizeInput($_POST['code']);

    $gencode  = $_SESSION['gencode'];
    echo $code;
    echo $gencode;
    if ($code==$gencode)
    {
        echo "<script>alert('The code matches the code sent to you on your ID'.$code.$gencode);</script>";
// window.location.href='passwordreset.php';
//        redirect('admin/ahm/panel');
        header('Location: passwordreset.php');
    } else {
        echo "<script>alert('The code does not match the code sent to you on your ID'.$code.$gencode);window.location.href='verifycode.php?error=1';</script>";
//        window.location.href='verifycode.php';
        //header('Location: verifycode.php?error=1');
    }
}
else{
    $digits = 6;
    $gencode = rand(pow(10, $digits-1), pow(10, $digits)-1);
//    echo $gencode;
//
    $uid=$_SESSION['uid'];
    $name=$_SESSION['name'];
//$typeid=$_SESSION['typeid'];
    $email=$_SESSION['email'];
//    echo $email;


    define('SENDER', 'neu-csye6225-spring2017-team-2@mailinator.com');

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
    define('RECIPIENT', $email);

// Replace smtp_username with your Amazon SES SMTP user name.
    define('USERNAME','AKIAIH67KMZ4CUVZFQJQ');

// Replace smtp_password with your Amazon SES SMTP password.
    define('PASSWORD','AhV3IJHbfXBWWRuqOt1aBal/gvvTXVos9DxXQfhWtE4P');

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
    define('HOST', 'email-smtp.us-east-1.amazonaws.com');

// The port you will connect to on the Amazon SES SMTP endpoint.
    define('PORT', '587');


// Other message information
    define('SUBJECT','CRM Password Reset Code');
    define('BODY','The code for resetting your password is as follows:'.$gencode);

//require_once 'vendor/pear/mail';
    require_once '../src/vendor/pear/mail/Mail.php';
//require ("class.phpmailer.php");



    $headers = array (
        'From' => SENDER,
        'To' => RECIPIENT,
        'Subject' => SUBJECT);

    $smtpParams = array (
        'host' => HOST,
        'port' => PORT,
        'auth' => true,
        'username' => USERNAME,
        'password' => PASSWORD
    );




// Create an SMTP client.
    $mail = Mail::factory('smtp', $smtpParams);


// Send the email.
    $result = $mail->send(RECIPIENT, $headers, BODY);

    if (PEAR::isError($result)) {

//        echo ("Email not sent. " .$result->getMessage() ."\n");
        echo "<script>alert('Email not sent. " .$result->getMessage() ."\n');</script>";
    } else {
//        echo ("Email sent!"."\n");
        $_SESSION['gencode'] = $gencode;
        echo "<script>alert('Email Sent!');</script>";
//        redirect('admin/ahm/panel');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRM - Login</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>

    <link type="text/css" rel="stylesheet" href="css/materialadmin.css"/>

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>

    <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.min.css"/>


    <!-- END STYLESHEETS -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>


<body class="menubar-hoverable header-fixed ">

<!-- BEGIN LOGIN SECTION -->
<section class="section-account">
    <div class="img-backdrop" style="background-image: url('img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <br/>
                    <h2 style="padding-left: 270px;">TEST CRM</h2><br/><br/><br/>
                    <span class="text-lg text-primary" style="color : #2B323A; padding-left: 233px;"></span>
                    <br/><br/>
                    <form class="form floating-label" action="verifycode.php" accept-charset="utf-8" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" id="code" name="code" required>
                            <label for="code">Please enter the code sent to the given email ID to reset your password</label>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-right">
                                <input type="submit" class="btn btn-primary btn-raised" name="verify" id="verify"
                                       style="background-color : #2B323A; border-color : #2B323A;" Value="verify"/><br/>

                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
<!-- END LOGIN SECTION -->


<!-- BEGIN JAVASCRIPT -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="js/Demo.js"></script>


<!-- END JAVASCRIPT -->


</body>
</html>